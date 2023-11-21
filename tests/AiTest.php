<?php
namespace Marxolity\OpenAi\Tests;
use Orchestra\Testbench\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Http;
use Marxolity\OpenAi\OpenAIServiceProvider;
use Marxolity\OpenAi\Facades\OpenAi;
use Mockery\MockInterface;
use Arr;
use Str;

class AiTest extends \Orchestra\Testbench\TestCase
{
    use WithFaker;

    public const REQUEST_MSG = "What is Laravel?";
    public const RESPONSE_MSG = "Laravel is a free, open-source PHP web application framework used for developing web applications following the model-view-controller (MVC) architectural patter";

    protected function getPackageProviders($app)
    {
        return [OpenAIServiceProvider::class];
    }

    protected function configLoad()
    {
        $this->app['config']->set('open-ai.api_key', 'api-key');
    }

    public function response()
    {
        return [
            "id" => "chatcmpl-8MZn4EY6F82H2pLHB4Jp6P2UuGg4v",
            "object" => "chat.completion.test",
            "created" => 1700391486,
            "model" => "gpt-3.5-turbo-0613",
            "choices" => [
                [
                    "index" => 0,
                    "message" => [
                        "content" => static::RESPONSE_MSG,
                    ],
                    "finish_reason" => "stop"
                ]
            ],
            "usage" => [
                "prompt_tokens" => 11,
                "completion_tokens" => 197,
                "total_tokens" => 208
            ],
        ];
    }

    public function testAiResponseArray()
    {
        $this->configLoad();

        Http::fake([
            '*' => Http::response( $this->response() ),
        ]);

        $response = OpenAi::query(static::REQUEST_MSG)
            ->send()
            ->toArray();

        $this->assertTrue(!empty( Arr::get($response, 'id') ));
    }

    public function testAiResponseJson()
    {
        $this->configLoad();

        Http::fake([
            '*' => Http::response( $this->response() ),
        ]);

        $response = OpenAi::query(static::REQUEST_MSG)
            ->send()
            ->toJson();

        $this->assertTrue( Str::contains($response, static::RESPONSE_MSG) );
    }

    public function testAiResponseXml()
    {
        $this->configLoad();

        Http::fake([
            '*' => Http::response( $this->response() ),
        ]);

        $response = OpenAi::query(static::REQUEST_MSG)
            ->send()
            ->toXml();

        $this->assertTrue( Str::contains($response, static::RESPONSE_MSG) );
    }

    public function testAiSend()
    {
        $this->configLoad();

        Http::fake([
            '*' => Http::response( $this->response() ),
        ]);
        
        try {
            OpenAi::query(static::REQUEST_MSG)
                ->send();
        } catch (Exception $e) {
            $this->fail();
        }

        $this->assertTrue(TRUE);
    }
}
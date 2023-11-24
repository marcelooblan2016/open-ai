<?php

namespace Marxolity\OpenAi\Services\Ai;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Client\Response;

class Base
{
    /** @var ?array<mixed> */
    public ?array $responseRaw;
    public ?string $responseMessage;
    protected string $apiKey = '';
    protected string $model = '';
    /** @var array<string> */
    protected array $allowedModels = [
        'gpt-3.5-turbo', 'gpt-3.5-turbo-1106',
        'gpt-4', 'gpt-4-vision-preview'
    ];
    /** @var string */
    protected string $contentQuery;
    /** @var string */
    protected string $endPoint = 'https://api.openai.com/v1/chat/completions';

    public function __construct() {
        $this->apiKey = config('open-ai.api_key');
        $this->model = config('open-ai.default_model');
    }

    public function sendRequest(): Response
    {
        return Http::withToken($this->apiKey)->acceptJson()->post($this->endPoint, [
            "model" => $this->model,
            "messages" => [["role" => "user", "content" => $this->contentQuery]],
            "temperature" => 0.7
        ]);
    }
}
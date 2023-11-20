<?php

namespace Marxolity\OpenAi\Services\Ai;
use Illuminate\Support\Facades\Http;

class Base
{
    // Response
    public $responseRaw;
    public $responseMessage;
    // Api
    protected $apiKey;
    // Models
    protected $model;
    protected $allowedModels = ['gpt-3.5-turbo', 'gpt-3.5-turbo-1106'];
    // Content
    protected $contentQuery;
    // End points
    protected $endPoint = 'https://api.openai.com/v1/chat/completions';

    public function __construct() {
        $this->apiKey = config('ai.open_ai.api_key');
        $this->model = config('ai.open_ai.default_model');
    }

    public function sendRequest()
    {
        return Http::withToken($this->apiKey)->acceptJson()->post($this->endPoint, [
            "model" => $this->model,
            "messages" => [["role" => "user", "content" => $this->contentQuery]],
            "temperature" => 0.7
        ]);
    }
}
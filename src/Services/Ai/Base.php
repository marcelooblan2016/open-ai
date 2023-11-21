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
    protected $allowedModels = [
        // GPT 3
        'gpt-3.5-turbo', 'gpt-3.5-turbo-1106',
        // GPT 4 (Tier 1 & Up)
        'gpt-4', 'gpt-4-vision-preview'
    ];
    // Content
    protected $contentQuery;
    // End points
    protected $endPoint = 'https://api.openai.com/v1/chat/completions';

    public function __construct() {
        $this->apiKey = config('open-ai.api_key');
        $this->model = config('open-ai.default_model');
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
<?php

namespace Marxolity\OpenAi\Services\Ai;
use Illuminate\Support\Facades\Http;

class OpenAi implements AiInterface
{
    protected $apiKey;
    protected $model;
    protected $allowedModels = [
        'gpt-3.5-turbo',
    ];

    protected $endPoint = 'https://api.openai.com/v1/chat/completions';

    public function __construct() {
        $this->apiKey = config('ai.open_ai.api_key');
        $this->model = config('ai.open_ai.default_model');
    }

    public function test() {
    	dd("TEST BOOM");
    }
}
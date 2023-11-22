<?php

namespace Marxolity\OpenAi\Traits;
use Marxolity\OpenAi\Traits\XmlParser;
use Marxolity\OpenAi\Exceptions\OpenAiException;

trait Validation
{
    public function validatePreRequisites(): void
    {
        $this->validateApiKey();
        $this->validateQuery();
    }
    /**
     * Check if apiKey exists
     * void
     **/
    private function validateQuery(): void
    {
        if (empty($this->contentQuery)) throw new OpenAiException("query must be provided.");
    }
    /**
     * Check if apiKey exists
     * void
     **/
    private function validateApiKey(): void
    {
        if (empty($this->apiKey)) throw new OpenAiException("Api Key must be provided.");
    }
    /**
     * Check if model selected is allowed
     * void
     **/
    private function validateModel(): void
    {
        if (!in_array($this->model, $this->allowedModels)) {
            $allowedModels = implode(',', $this->allowedModels);

            throw new OpenAiException("Selected model ({$this->model}) not allowed. Valid models [{$allowedModels}]");
        }
    }
}
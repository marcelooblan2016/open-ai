<?php

namespace Marxolity\OpenAi\Services\Ai;
use Marxolity\OpenAi\Traits\Response;
use Marxolity\OpenAi\Traits\Validation;
use Marxolity\OpenAi\Traits\Interfaces\ResponseInterface;
use Marxolity\OpenAi\Traits\Interfaces\ValidationInterface;
use Arr;

class OpenAi extends Base implements AiInterface, ResponseInterface, ValidationInterface
{
    use Validation, Response;
    /**
     * send the request build to openai endpoint
     * @return string (XML or JSON)
     **/
    public function send(): self
    {
        $this->validatePreRequisites();

        $response = $this->sendRequest();

        $jsonData = $response->json();
        $this->responseRaw = $jsonData;
        // Parse Message
        $responseMessage = Arr::get($this->responseRaw, 'choices.0.message.content');
        // Error Message
        if (empty($responseMessage)) $responseMessage = Arr::get($this->responseRaw, 'error.message');
        // Set response message
        $this->responseMessage = $responseMessage;

        return $this;
    }
    /**
     * Set Current Model
     * @param string $model
     * @return self
     **/
    public function setModel(string $model): self
    {
        $this->model = $model;

        return $this;
    }
    /**
     * Set Query to send
     * @param string $query
     * @return self
     **/
    public function query(string $query): self
    {
        $this->contentQuery = $query;

        return $this;
    }
    /**
     * @return string Current model
     **/
    public function getModel(): string
    {
        return $this->model;
    }
}
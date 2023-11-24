<?php

namespace Marxolity\OpenAi\Traits\Interfaces;

interface ResponseInterface
{
    public function toJson(): string;
    /**
     * @return string|false Return XML string or false.
     **/
    public function toXml();
    /**
     * $this->responseRaw
     * @return array<mixed>
     **/
    public function toArray(): array;
}
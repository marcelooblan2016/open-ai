<?php

namespace Marxolity\OpenAi\Traits\Interfaces;

interface ResponseInterface
{
    public function toJson(): string;
    public function toXml(): string;
    public function toArray(): array;
}
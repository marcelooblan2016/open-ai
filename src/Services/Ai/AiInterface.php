<?php

namespace Marxolity\OpenAi\Services\Ai;

interface AiInterface
{
    public function validatePreRequisites(): void;
    public function setModel(string $model): self;
    public function getModel(): string;
    public function query(string $query): self;
    public function send(): self;
}
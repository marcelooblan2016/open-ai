<?php

namespace Marxolity\OpenAi\Facades;

use Illuminate\Support\Facades\Facade;
use Marxolity\OpenAi\Services\Ai\AiInterface;

class OpenAi extends Facade
{
    protected static function getFacadeAccessor()
    {
        return AiInterface::class;
    }
}
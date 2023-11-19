<?php

namespace Marxolity\OpenAi\Traits;
use Marxolity\OpenAi\Traits\XmlParser;

trait Response
{
    use XmlParser;
    /**
     * $this->responseRaw
     * @return string
     **/
    public function toJson(): string
    {
        return collect($this->responseRaw)->toJson();
    }
    /**
     * $this->responseRaw
     * @return string
     **/
    public function toXml(): string
    {
        return $this->arrayToXml($this->responseRaw);
    }
    /**
     * $this->responseRaw
     * @return array
     **/
    public function toArray(): array
    {
        return $this->responseRaw ?? [];
    }
}
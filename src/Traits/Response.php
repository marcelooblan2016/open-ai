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
     * @return string|false Return XML string or false.
     **/
    public function toXml()
    {
        return $this->arrayToXml($this->responseRaw);
    }
    /**
     * $this->responseRaw
     * @return array<mixed>
     **/
    public function toArray(): array
    {
        return $this->responseRaw ?? [];
    }
}
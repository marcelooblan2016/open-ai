<?php

namespace Marxolity\OpenAi\Traits;

trait XmlParser
{
    public function arrayToXml($array, $xml = null) {
        if ($xml === null) $xml = new \SimpleXMLElement('<root/>');
        
        collect($array)
        ->each( function ($value, $key) use (&$xml) {
            if (is_array($value)) {
                if (!is_numeric($key)) {
                    $child = $xml->addChild($key);
                    $this->arrayToXml($value, $child);
                } 
                else $this->arrayToXml($value, $xml);
            } else {
                if (is_numeric($key)) $xml->addChild('item', htmlspecialchars($value));
                else $xml->addChild($key, htmlspecialchars($value));
            }
        });

        return $xml->asXML();
    }
}
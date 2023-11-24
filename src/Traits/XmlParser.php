<?php

namespace Marxolity\OpenAi\Traits;
use \SimpleXMLElement;

trait XmlParser
{
    /**
     * @param ?array<string> $array,?SimpleXMLElement
     * @return string|false Return XML string or false.
     **/
    public function arrayToXml(?array $array, ?SimpleXMLElement $xml = null)
    {
        if ($xml === null) $xml = new SimpleXMLElement('<root/>');
        
        collect($array)
        ->each( function ($value, $key) use (&$xml) {
            /** @phpstan-ignore-next-line */
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
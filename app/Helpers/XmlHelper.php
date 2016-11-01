<?php

namespace App\Helpers;

class XmlHelper
{
    /**
     * Create xml file with users info
     *
     * @param array $users Users from db
     * @return string Xml string with info
     */
    public static function createXml(array $users)
    {
        $xmlUserInfo = new \SimpleXMLElement("<?xml version=\"1.0\"?><root></root>");
        self::arrayToXml($users, $xmlUserInfo);

        $dom = new \DOMDocument('1.0');
        $dom->preserveWhiteSpace = false;
        $dom->formatOutput = true;
        $dom->loadXML($xmlUserInfo->asXML());

        return $dom->saveXML();
    }

    /**
     * Helper function, which converts array to XML
     *
     * @param array $array Array which need to convert
     * @param \SimpleXMLElement $xmlUserInfo Instance of SimpleXMLElement class
     * @return \SimpleXMLElement Instance of SimpleXMLElement class
     */
    private static function arrayToXml(array $array, &$xmlUserInfo)
    {
        foreach ($array as $key => $value) {
            if (is_array($value)) {
                if (!is_numeric($key)) {
                    $subnode = $xmlUserInfo->addChild("$key");
                    self::arrayToXml($value, $subnode);
                } else {
                    $subnode = $xmlUserInfo->addChild("user$key");
                    self::arrayToXml($value, $subnode);
                }
            } else {
                $xmlUserInfo->addChild("$key", htmlspecialchars("$value"));
            }
        }
    }
}


<?php
namespace AliyunMNS\Model;

use AliyunMNS\Constants;
use AliyunMNS\Exception\MnsException;
use XMLWriter;

class WebSocketAttributes
{
    public $importanceLevel;

    public function __construct($importanceLevel)
    {
        $this->importanceLevel = $importanceLevel;
    }

    public function setImportanceLevel($importanceLevel)
    {
        $this->importanceLevel = $importanceLevel;
    }

    public function getImportanceLevel()
    {
        return $this->importanceLevel;
    }

    public function writeXML(XMLWriter $xmlWriter)
    {
        $jsonArray = [Constants::IMPORTANCE_LEVEL => $this->importanceLevel];
        $xmlWriter->writeElement(Constants::WEBSOCKET, json_encode($jsonArray));
    }
}

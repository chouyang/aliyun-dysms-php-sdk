<?php
namespace AliyunMNS\Model;

use AliyunMNS\Constants;
use AliyunMNS\Traits\MessagePropertiesForSend;
use XMLWriter;

// this class is used for BatchSend
class SendMessageRequestItem
{
    use MessagePropertiesForSend;

    public function __construct($messageBody, $delaySeconds = null, $priority = null)
    {
        $this->messageBody = $messageBody;
        $this->delaySeconds = $delaySeconds;
        $this->priority = $priority;
    }

    public function writeXML(XMLWriter $xmlWriter, $base64)
    {
        $xmlWriter->startELement('Message');
        $this->writeMessagePropertiesForSendXML($xmlWriter, $base64);
        $xmlWriter->endElement();
    }
}

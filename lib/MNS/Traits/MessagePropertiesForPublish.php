<?php
namespace AliyunMNS\Traits;

use AliyunMNS\Constants;
use AliyunMNS\Model\MessageAttributes;
use XMLWriter;

trait MessagePropertiesForPublish
{
    public $messageBody;
    public $messageAttributes;

    public function getMessageBody()
    {
        return $this->messageBody;
    }

    public function setMessageBody($messageBody)
    {
        $this->messageBody = $messageBody;
    }

    public function getMessageAttributes()
    {
        return $this->messageAttributes;
    }

    public function setMessageAttributes($messageAttributes)
    {
        $this->messageAttributes = $messageAttributes;
    }

    public function writeMessagePropertiesForPublishXML(XMLWriter $xmlWriter)
    {
        if ($this->messageBody != null) {
            $xmlWriter->writeElement(Constants::MESSAGE_BODY, $this->messageBody);
        }
        if ($this->messageAttributes !== null) {
            $this->messageAttributes->writeXML($xmlWriter);
        }
    }
}

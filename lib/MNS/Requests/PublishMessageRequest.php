<?php
namespace AliyunMNS\Requests;

use AliyunMNS\Constants;
use AliyunMNS\Requests\BaseRequest;
use AliyunMNS\Traits\MessagePropertiesForPublish;
use XMLWriter;

class PublishMessageRequest extends BaseRequest
{
    use MessagePropertiesForPublish;

    private $topicName;

    public function __construct($messageBody, $messageAttributes = null)
    {
        parent::__construct('post', null);

        $this->topicName = null;
        $this->messageBody = $messageBody;
        $this->messageAttributes = $messageAttributes;
    }

    public function setTopicName($topicName)
    {
        $this->topicName = $topicName;
        $this->resourcePath = 'topics/' . $topicName . '/messages';
    }

    public function getTopicName()
    {
        return $this->topicName;
    }

    public function generateBody()
    {
        $xmlWriter = new XMLWriter;
        $xmlWriter->openMemory();
        $xmlWriter->startDocument("1.0", "UTF-8");
        $xmlWriter->startElementNS(null, "Message", Constants::MNS_XML_NAMESPACE);
        $this->writeMessagePropertiesForPublishXML($xmlWriter);
        $xmlWriter->endElement();
        $xmlWriter->endDocument();
        return $xmlWriter->outputMemory();
    }

    public function generateQueryString()
    {
        return null;
    }
}

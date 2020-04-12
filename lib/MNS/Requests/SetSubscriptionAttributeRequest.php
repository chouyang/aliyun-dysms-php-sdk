<?php
namespace AliyunMNS\Requests;

use AliyunMNS\Constants;
use AliyunMNS\Requests\BaseRequest;
use AliyunMNS\Model\UpdateSubscriptionAttributes;
use XMLWriter;

class SetSubscriptionAttributeRequest extends BaseRequest
{

    public function __construct(UpdateSubscriptionAttributes $attributes = null)
    {
        parent::__construct('put', 'topics/' . $attributes->getTopicName() . '/subscriptions/' . $attributes->getSubscriptionName() . '?metaoverride=true');

        if ($attributes == null) {
            $attributes = new UpdateSubscriptionAttributes();
        }

        $this->attributes = $attributes;
    }

    public function getSubscriptionAttributes()
    {
        return $this->attributes;
    }

    public function generateBody()
    {
        $xmlWriter = new XMLWriter;
        $xmlWriter->openMemory();
        $xmlWriter->startDocument("1.0", "UTF-8");
        $xmlWriter->startElementNS(null, "Subscription", Constants::MNS_XML_NAMESPACE);
        $this->attributes->writeXML($xmlWriter);
        $xmlWriter->endElement();
        $xmlWriter->endDocument();
        return $xmlWriter->outputMemory();
    }

    public function generateQueryString()
    {
        return null;
    }
}

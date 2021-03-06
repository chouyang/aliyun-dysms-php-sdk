<?php
namespace AliyunMNS\Model;

use AliyunMNS\Constants;
use XMLWriter;

class UpdateSubscriptionAttributes
{
    private $subscriptionName;

    private $strategy;

    # may change in AliyunMNS\Topic
    private $topicName;

    public function __construct(
        $subscriptionName = null,
        $strategy = null)
    {
        $this->subscriptionName = $subscriptionName;

        $this->strategy = $strategy;
    }

    public function getStrategy()
    {
        return $this->strategy;
    }

    public function setStrategy($strategy)
    {
        $this->strategy = $strategy;
    }

    public function getTopicName()
    {
        return $this->topicName;
    }

    public function setTopicName($topicName)
    {
        $this->topicName = $topicName;
    }

    public function getSubscriptionName()
    {
        return $this->subscriptionName;
    }

    public function writeXML(XMLWriter $xmlWriter)
    {
        if ($this->strategy != null) {
            $xmlWriter->writeElement(Constants::STRATEGY, $this->strategy);
        }
    }
}

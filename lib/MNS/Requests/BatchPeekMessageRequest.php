<?php
namespace AliyunMNS\Requests;

use AliyunMNS\Constants;
use AliyunMNS\Requests\BaseRequest;

class BatchPeekMessageRequest extends BaseRequest
{
    private $queueName;
    private $numOfMessages;
    private $waitSeconds;

    public function __construct($queueName, $numOfMessages)
    {
        parent::__construct('get', 'queues/' . $queueName . '/messages');

        $this->queueName = $queueName;
        $this->numOfMessages = $numOfMessages;
    }

    public function getQueueName()
    {
        return $this->queueName;
    }

    public function getNumOfMessages()
    {
        return $this->numOfMessages;
    }

    public function generateBody()
    {
        return null;
    }

    public function generateQueryString()
    {
        return http_build_query(["numOfMessages" => $this->numOfMessages, "peekonly" => "true"]);
    }
}

<?php

/**
 * Created by PhpStorm.
 * User: Ludwig
 * Date: 23.11.2016
 * Time: 16:11
 */
class Chat
{
    private $chatPartner;
    private $recipient;
    private $messages;

    public function __construct($chatPartner, $recipient, $messages)
    {
        $this->chatPartner = $chatPartner;
        $this->recipient = $recipient;
        $this->messages = $messages;
    }

    /**
     * @return mixed
     */
    public function getChatPartner()
    {
        return $this->chatPartner;
    }

    /**
     * @param mixed $chatPartner
     */
    public function setChatPartner($chatPartner)
    {
        $this->chatPartner = $chatPartner;
    }

    /**
     * @return mixed
     */
    public function getRecipient()
    {
        return $this->recipient;
    }

    /**
     * @param mixed $recipient
     */
    public function setRecipient($recipient)
    {
        $this->recipient = $recipient;
    }

    /**
     * @return mixed
     */
    public function getMessages()
    {
        return $this->messages;
    }

    /**
     * @param mixed $messages
     */
    public function setMessages($messages)
    {
        $this->messages = $messages;
    }


}
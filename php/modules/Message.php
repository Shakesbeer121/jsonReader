<?php

/**
 * Created by PhpStorm.
 * User: Ludwig
 * Date: 23.11.2016
 * Time: 16:11
 */
class Message
{
    private $content;
    private $sender;

    /**
     * Message constructor.
     * @param $content
     * @param $sender
     */
    public function __construct($content, $sender)
    {
        $this->content = $content;
        $this->sender = $sender;
    }

    /**
     * @return mixed
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * @param mixed $content
     */
    public function setContent($content)
    {
        $this->content = $content;
    }

    /**
     * @return mixed
     */
    public function getSender()
    {
        return $this->sender;
    }

    /**
     * @param mixed $sender
     */
    public function setSender($sender)
    {
        $this->sender = $sender;
    }


}
<?php
/**
 * Created by PhpStorm.
 * User: 9fdam03
 * Date: 25/01/2018
 * Time: 19:13
 */

class obj_mensaje
{

    private $messageID;
    private $clientID;
    private $topic;
    private $message;
    private $DateTime_created;

    /**
     * obj_mensaje constructor.
     * @param $messageID
     * @param $clientID
     * @param $topic
     * @param $message
     * @param $DateTime_created
     */
    public function __construct($messageID, $clientID, $topic, $message, $DateTime_created)
    {
        $this->messageID = $messageID;
        $this->clientID = $clientID;
        $this->topic = $topic;
        $this->message = $message;
        $this->DateTime_created = $DateTime_created;
    }

    /**
     * @return mixed
     */
    public function getMessageID()
    {
        return $this->messageID;
    }

    /**
     * @param mixed $messageID
     */
    public function setMessageID($messageID)
    {
        $this->messageID = $messageID;
    }

    /**
     * @return mixed
     */
    public function getClientID()
    {
        return $this->clientID;
    }

    /**
     * @param mixed $clientID
     */
    public function setClientID($clientID)
    {
        $this->clientID = $clientID;
    }

    /**
     * @return mixed
     */
    public function getTopic()
    {
        return $this->topic;
    }

    /**
     * @param mixed $topic
     */
    public function setTopic($topic)
    {
        $this->topic = $topic;
    }

    /**
     * @return mixed
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * @param mixed $message
     */
    public function setMessage($message)
    {
        $this->message = $message;
    }

    /**
     * @return mixed
     */
    public function getDateTimeCreated()
    {
        return $this->DateTime_created;
    }

    /**
     * @param mixed $DateTime_created
     */
    public function setDateTimeCreated($DateTime_created)
    {
        $this->DateTime_created = $DateTime_created;
    }

}
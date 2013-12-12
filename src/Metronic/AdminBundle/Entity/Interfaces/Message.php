<?php

namespace Metronic\AdminBundle\Interfaces;

interface Message extends Route {

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId();

    /**
     * Set subject
     *
     * @param string $subject
     * @return Message
     */
    public function setSubject($subject);

    /**
     * Get subject
     *
     * @return string 
     */
    public function getSubject();

    /**
     * Set message
     *
     * @param string $message
     * @return Message
     */
    public function setMessage($message);

    /**
     * Get message
     *
     * @return string 
     */
    public function getMessage();

    /**
     * Set sender
     *
     * @param string $sender
     * @return Message
     */
    public function setSender($sender);

    /**
     * Get sender
     *
     * @return string 
     */
    public function getSender();

    /**
     * Set sendedAt
     *
     * @param \DateTime $sendedAt
     * @return Message
     */
    public function setSendedAt($sendedAt);

    /**
     * Get sendedAt
     *
     * @return \DateTime 
     */
    public function getSendedAt();

    /**
     * Get user avatar url
     *
     * @return string 
     */
    public function getUserAvatar();
}

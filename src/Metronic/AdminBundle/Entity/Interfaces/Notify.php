<?php

namespace Metronic\AdminBundle\Entity\Interfaces;

interface Notify  {

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId();

    /**
     * Set notifyAt
     *
     * @param \DateTime $notifyAt
     * @return Notify
     */
    public function setNotifyAt($notifyAt);

    /**
     * Get notifyAt
     *
     * @return \DateTime 
     */
    public function getNotifyAt();

    /**
     * Set type
     *
     * @param string $type
     * @return Notify
     */
    public function setType($type);

    /**
     * Get type
     *
     * @return string 
     */
    public function getType();

    /**
     * Set message
     *
     * @param string $message
     * @return Notify
     */
    public function setMessage($message);

    /**
     * Get message
     *
     * @return string 
     */
    public function getMessage();

    /**
     * Set severity
     *
     * @param string $severity
     * @return Notify
     */
    public function setSeverity($severity);

    /**
     * Get severity
     *
     * @return string 
     */
    public function getSeverity();
}

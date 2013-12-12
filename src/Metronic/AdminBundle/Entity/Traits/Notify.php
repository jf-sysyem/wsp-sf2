<?php

namespace Metronic\AdminBundle\Entity\Traits;

trait Notify {

    /**
     * @var string
     *
     * @ORM\Column(name="severity", type="string", length=8)
     */
    private $severity;

    /**
     * @var string
     *
     * @ORM\Column(name="type", type="string", length=8)
     */
    private $type;

    /**
     * @var string
     *
     * @ORM\Column(name="message", type="string", length=255)
     */
    private $message;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="notify_at", type="datetime")
     */
    private $notifyAt;

    /**
     * Set severity
     *
     * @param string $severity
     * @return Notify
     */
    public function setSeverity($severity) {
        $this->severity = $severity;

        return $this;
    }

    /**
     * Get severity
     *
     * @return string 
     */
    public function getSeverity() {
        return $this->severity;
    }

    /**
     * Set type
     *
     * @param string $type
     * @return Notify
     */
    public function setType($type) {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return string 
     */
    public function getType() {
        return $this->type;
    }

    /**
     * Set message
     *
     * @param string $message
     * @return Notify
     */
    public function setMessage($message) {
        $this->message = $message;

        return $this;
    }

    /**
     * Get message
     *
     * @return string 
     */
    public function getMessage() {
        return $this->message;
    }

    /**
     * Set notifyAt
     *
     * @param \DateTime $notifyAt
     * @return Notify
     */
    public function setNotifyAt($notifyAt) {
        $this->notifyAt = $notifyAt;

        return $this;
    }

    /**
     * Get notifyAt
     *
     * @return \DateTime 
     */
    public function getNotifyAt() {
        return $this->notifyAt;
    }

}
<?php

namespace Metronic\AdminBundle\Entity\Traits;

trait Todotask {

    /**
     * @var string
     *
     * @ORM\Column(name="task", type="string", length=255)
     */
    private $task;

    /**
     * @var string
     *
     * @ORM\Column(name="severity", type="string", length=8)
     */
    private $severity;

    /**
     * @var integer
     *
     * @ORM\Column(name="percent", type="integer")
     */
    private $percent;

    /**
     * @var boolean
     *
     * @ORM\Column(name="striped", type="boolean")
     */
    private $striped;

    /**
     * Set task
     *
     * @param string $task
     * @return Todotask
     */
    public function setTask($task) {
        $this->task = $task;

        return $this;
    }

    /**
     * Get task
     *
     * @return string 
     */
    public function getTask() {
        return $this->task;
    }

    /**
     * Set severity
     *
     * @param string $severity
     * @return Todotask
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
     * Set percent
     *
     * @param integer $percent
     * @return Todotask
     */
    public function setPercent($percent) {
        $this->percent = $percent;

        return $this;
    }

    /**
     * Get percent
     *
     * @return integer 
     */
    public function getPercent() {
        return $this->percent;
    }

    /**
     * Set striped
     *
     * @param boolean $striped
     * @return Todotask
     */
    public function setStriped($striped) {
        $this->striped = $striped;

        return $this;
    }

    /**
     * Get striped
     *
     * @return boolean 
     */
    public function getStriped() {
        return $this->striped;
    }

}

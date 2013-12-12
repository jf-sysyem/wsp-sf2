<?php

namespace Metronic\AdminBundle\Entity\Traits;

interface Todo {

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId();

    /**
     * Set task
     *
     * @param string $task
     * @return Todotask
     */
    public function setTask($task);

    /**
     * Get task
     *
     * @return string 
     */
    public function getTask();

    /**
     * Set severity
     *
     * @param string $severity
     * @return Todotask
     */
    public function setSeverity($severity);

    /**
     * Get severity
     *
     * @return string 
     */
    public function getSeverity();

    /**
     * Set percent
     *
     * @param integer $percent
     * @return Todotask
     */
    public function setPercent($percent);

    /**
     * Get percent
     *
     * @return integer 
     */
    public function getPercent();

    /**
     * Set striped
     *
     * @param boolean $striped
     * @return Todotask
     */
    public function setStriped($striped);

    /**
     * Get striped
     *
     * @return boolean 
     */
    public function isStriped();

}

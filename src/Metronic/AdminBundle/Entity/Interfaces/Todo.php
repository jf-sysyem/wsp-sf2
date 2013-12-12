<?php

namespace Metronic\AdminBundle\Entity\Traits;

interface Todo extends Route {

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
     * @return Todo
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
     * @return Todo
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
     * @return Todo
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
     * @return Todo
     */
    public function setStriped($striped);

    /**
     * Get striped
     *
     * @return boolean 
     */
    public function isStriped();

}

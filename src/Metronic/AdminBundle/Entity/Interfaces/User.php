<?php

namespace Metronic\AdminBundle\Interfaces;

interface User {

    /**
     * Get user avatar
     *
     * @return string
     */
    public function getAvatar();

    /**
     * Get user name
     *
     * @return string
     */
    public function getName();

}

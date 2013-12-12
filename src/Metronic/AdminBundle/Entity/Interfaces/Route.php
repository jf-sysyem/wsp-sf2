<?php

namespace Metronic\AdminBundle\Interfaces;

interface Route {

    /**
     * Get route for open content
     *
     * @return string|boolean 
     */
    public function getRoute();

    /**
     * Get params for route generatoe
     *
     * @return array
     */
    public function getRouteParams();

}

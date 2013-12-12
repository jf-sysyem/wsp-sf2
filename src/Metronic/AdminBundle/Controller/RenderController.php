<?php

namespace Metronic\AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

/**
 * @Route("/__metronic_admin_render")
 */
class RenderController extends Controller {

    /**
     * @Route("/__header")
     * @Template("MetronicAdminBundle::layout/header.html.twig")
     */
    public function headerAction() {
        return $this->container->getParameter('header');
    }
    
    /**
     * @Route("/__headerLogin")
     * @Template("MetronicAdminBundle::layout/headerEmpty.html.twig")
     */
    public function headerEmptyAction() {
        return $this->container->getParameter('header');
    }
    
}

<?php

namespace JF\CoreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

/**
 * @Route("/__dispatcher")
 */
class DispatcherController extends Controller {

    /**
     * @Route("/", name="index")
     */
    public function indexAction() {
        return $this->redirect($this->generateUrl($this->container->getParameter('default_home_route')));
    }

    /**
     * @Route("/debug", name="debug")
     * @Template()
     */
    public function debugAction() {
        ob_start();
        \Ephp\UtilityBundle\Utility\Debug::pr($this->getUser()->getCliente()->getLicenzeAttive(), true);
        $licenze = ob_get_contents();
        ob_end_clean();
        
        ob_start();
        \Ephp\UtilityBundle\Utility\Debug::pr($this->getUser()->getCliente()->getVars(), true);
        $variabili = ob_get_contents();
        ob_end_clean();
        
        ob_start();
        \Ephp\UtilityBundle\Utility\Debug::pr($this->getUser()->getCliente()->getDati(), true);
        $configurazione = ob_get_contents();
        ob_end_clean();
        
        ob_start();
        \Ephp\UtilityBundle\Utility\Debug::pr($this->container->getParameter('jf.menu'), true);
        $menu = ob_get_contents();
        ob_end_clean();

        return array(
            'variabili' => $variabili,
            'licenze' => $licenze,
            'configurazione' => $configurazione,
            'menu' => $menu,
        );
    }

}

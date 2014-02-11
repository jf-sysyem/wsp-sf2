<?php

namespace WSP\ACLBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Ephp\UtilityBundle\Controller\Traits\BaseController;

/**
 * @Route("/__dispatcher")
 */
class DispatcherController extends Controller {

    use BaseController;
    
    /**
     * @Route("/wsp", name="wsp")
     */
    public function indexAction() {
        $user = $this->getUser();
        if(!$user) {
            return $this->redirect($this->generateUrl('home'));
        }
        /* @var $user \JF\ACLBundle\Entity\Gestore */
        if(!$user->getCliente() || $user->getCliente()->getNome() == '') {
            return $this->redirect($this->generateUrl('negozio_step_1'));
        }
        $negozio = $this->findOneBy('WSPACLBundle:Negozio', array('cliente' => $this->getUser()->getCliente()->getId()));
        /* @var $negozio \WSP\ACLBundle\Entity\Negozio */
        if(!$negozio->getEmailNegozio()) {
            return $this->redirect($this->generateUrl('negozio_step_2'));
        }
        if(!$user->getFirstname()) {
            return $this->redirect($this->generateUrl('negozio_step_3'));
        }
        if($user->getCliente()->getPartitaIva() == '') {
            return $this->redirect($this->generateUrl('negozio_step_4'));
        }
        return $this->redirect($this->generateUrl('negozio'));
        
    }


}

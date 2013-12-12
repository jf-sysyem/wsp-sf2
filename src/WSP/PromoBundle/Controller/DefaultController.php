<?php

namespace WSP\PromoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use WSP\PromoBundle\Entity\Contatto;


class DefaultController extends Controller {

    use \Ephp\UtilityBundle\Controller\Traits\BaseController;

    /**
     * @Route("/", name="promo_index")
     * @Template()
     */
    public function indexAction() {
        return array();
    }

    /**
     * @Route("/promo/request", name="promo_request", options={"expose": true})
     * @Template()
     */
    public function requestAction() {
        $email = $this->getParam('contact');
        $out = array();
        $contatto = $this->findOneBy('WSPPromoBundle:Contatto', array('email' => $email));
        if(!$contatto) {
            $out['msg'] = 'new';
            $contatto = new Contatto();
            $contatto->setEmail($email);
            $this->persist($contatto);
        } else {
            if($contatto->getContattato()) {
                $out['msg'] = 'contact';
            } else {
                $out['msg'] = 'already';
            }
        }
        $out['contatto'] = $contatto;
        return $out;
    }

}

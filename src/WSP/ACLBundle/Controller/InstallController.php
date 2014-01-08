<?php

namespace WSP\ACLBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Ephp\UtilityBundle\Controller\Traits\BaseController;
use JF\CoreBundle\Controller\Traits\InstallController as BaseInstall;

/**
 * @Route("/__install")
 */
class InstallController extends Controller {

    use BaseController,
        BaseInstall;

    /**
     * @Route("-wsp-acl", name="install_wsp_acl"), defaults={"_format": "json"})
     */
    public function indexAction() {
        $package = 'wsp.acl';
        $g_utenze = 'negozio';
        $g_admin = 'wsp';
        $status = 200;
        $message = 'Ok';
        $licenze = array();
        try {
            $this->getEm()->beginTransaction();
            $this->installPackage($package, 'WP ACL', 'WSPACLBundle:Install:package_negozio.txt.twig');
            $this->installGruppo($package, $g_utenze, 'Gestione negozio', 'WSPACLBundle:Install:negozio.txt.twig');
            $this->installGruppo($package, $g_admin, 'Amministratore negozi', 'WSPACLBundle:Install:admin.txt.twig');
            
            $licenze[] = $this->newLicenza(
                    $package, $g_utenze, 'free', 1, 'Gestione negozio',         //Anagrafica licenza 
                    'WSPACLBundle:Install:negozio_free.txt.twig',               //TWIG descrizione
                    null,                                                       //Durata
                    array('R_NEGOZIANTE'),                                      //Ruoli abilitati
                    array(''),                                                  //Widget abilitati
                    array(                                                      //Parametri di configurazione
                        'on' => true,                                           //  Abilitazione del package
                        ),                                          
                    0, null,                                                    //Prezzo-Prezzo scontato
                    true, true);                                                //Autoinstall-Market
            
            $licenze[] = $this->newLicenza(
                    $package, $g_admin, 'wsp', 1, 'Amministratore',             //Anagrafica licenza 
                    'WSPACLBundle:Install:admin_wsp.txt.twig',                  //TWIG descrizione
                    null,                                                       //Durata
                    array('R_WSP'),                                             //Ruoli abilitati
                    array(''),                                                  //Widget abilitati
                    array(                                                      //Parametri di configurazione
                        'on' => true,                                           //  Abilitazione del package
                        ),                                          
                    0, null,                                                    //Prezzo-Prezzo scontato
                    false, false);                                              //Autoinstall-Market
            
            $this->getEm()->commit();
        } catch (\Exception $e) {
            $this->getEm()->rollback();
            $status = 500;
            $message = $e->getMessage();
        }
        
        return array(
            'package' => $package,
            'status' => $status,
            'message' => $message,
            'licenze' => $licenze,
        );
        
    }

}

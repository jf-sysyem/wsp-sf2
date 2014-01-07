<?php

namespace WSP\ACLBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Ephp\UtilityBundle\Controller\Traits\BaseController;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use WSP\ACLBundle\Entity\Negozio;
use JF\ACLBundle\Entity\Gestore;
use JF\ACLBundle\Entity\Cliente;
use WSP\ACLBundle\Form\NegozioType;
use WSP\ACLBundle\Form\NegozioStep1Type;
use WSP\ACLBundle\Form\NegozioStep2Type;
use WSP\ACLBundle\Form\GestoreType;
use WSP\ACLBundle\Form\ClienteType;

/**
 * Negozio controller.
 *
 * @Route("/negozio")
 */
class NegozioController extends Controller {

    use BaseController;

    /**
     * Lists all Negozio entities.
     *
     * @Route("/", name="negozio", options={"ACL": {"in_role": "R_NEGOZIANTE"}})
     * @Method("GET")
     * @Template()
     */
    public function indexAction() {
        $negozio = $this->findOneBy('WSPACLBundle:Negozio', array('cliente' => $this->getUser()->getCliente()->getId()));

        return array(
            'negozio' => $negozio,
        );
    }

    /**
     * Displays a form to create a new Negozio entity.
     *
     * @Route("/step-1", name="negozio_step_1")
     * @Method("GET")
     * @Template("WSPACLBundle:Negozio:form.html.twig")
     */
    public function step1Action() {
        $user = $this->getUser();
        /* @var $user \JF\ACLBundle\Entity\Gestore */
        
        // Se l'utente non ha ancora associato l'entità del cliente, allora la creo
        if(!$user->getCliente()) {
            $cliente = new \JF\ACLBundle\Entity\Cliente();
            $cliente->setEmptyData(25)->setReferente($user);
            $this->persist($cliente);
            
            // Controllo che abbia il ruolo di negoziante per l'attivazione automatica dei servizi per i negozianti
            if(!$user->hasRole('R_NEGOZIANTE')) {
                $roles = $user->getRoles();
                $roles[] = 'R_NEGOZIANTE';
                $user->setRoles($roles);
            }
            $user->setCliente($cliente);
            $this->persist($user);
        }
        
        $entity = new Negozio();
        $form = $this->createCreateFormStep1($entity);

        return array(
            'entity' => $entity,
            'form' => $form->createView(),
            'step' => 1,
        );
    }

    /**
     * Creates a new Negozio entity.
     *
     * @Route("/step-1", name="negozio_save_step_1")
     * @Method("POST")
     * @Template("WSPACLBundle:Negozio:form.html.twig")
     */
    public function saveStep1Action(Request $request) {
        $entity = new Negozio();
        $form = $this->createCreateFormStep1($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $entity->setCliente($this->getUser()->getCliente());
            
            //TODO: controlli di duplicazione negozio 
            
            $this->persist($entity);
            
            //Aggiorno la prima parte dei dati cliente
            $cliente = $this->getUser()->getCliente();
            /* @var $cliente \JF\ACLBundle\Entity\Cliente */
            $cliente->setNome($entity->getNome());
            $cliente->setIndirizzo($entity->getIndirizzo());
            $cliente->setCitta($entity->getLocalita());
            $cliente->setCap($entity->getCap());
            
            $this->persist($cliente);
            
            return $this->redirect($this->generateUrl('negozio_step_2'));
        }

        return array(
            'entity' => $entity,
            'form' => $form->createView(),
            'step' => 1,
        );
    }

    /**
     * Creates a form to create a Negozio entity.
     *
     * @param Negozio $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateFormStep1(Negozio $entity) {
        $form = $this->createForm(new NegozioStep1Type(), $entity, array(
            'action' => $this->generateUrl('negozio_save_step_1'),
            'method' => 'POST',
            'attr' => array(
                'class' => 'step-form',
            ),
        ));

        $form->add('submit', 'button', array('label' => 'negozio.form.continua', 'translation_domain' => 'WSPACL', 'attr' => array('class' => 'btn green button-next')));

        return $form;
    }

    /**
     * Displays a form to create a new Negozio entity.
     *
     * @Route("/step-2", name="negozio_step_2")
     * @Method("GET")
     * @Template("WSPACLBundle:Negozio:form.html.twig")
     */
    public function step2Action() {
        $user = $this->getUser();
        /* @var $user \JF\ACLBundle\Entity\Gestore */
        
        // Recupero il negozio
        $entity = $this->findOneBy('WSPACLBundle:Negozio', array('cliente' => $this->getUser()->getCliente()->getId()));
        /* @var $entity Negozio */
        
        $entity->setEmailNegozio($user->getEmail());
        
        $form = $this->createCreateFormStep2($entity);

        return array(
            'entity' => $entity,
            'form' => $form->createView(),
            'step' => 2,
        );
    }

    /**
     * Creates a new Negozio entity.
     *
     * @Route("/step-2", name="negozio_save_step_2")
     * @Method("POST")
     * @Template("WSPACLBundle:Negozio:form.html.twig")
     */
    public function saveStep2Action(Request $request) {
        // Recupero il negozio
        $entity = $this->findOneBy('WSPACLBundle:Negozio', array('cliente' => $this->getUser()->getCliente()->getId()));
        /* @var $entity Negozio */
        
        $form = $this->createCreateFormStep2($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            //TODO: controlli di duplicazione negozio 
            
            $this->persist($entity);
            
            //Aggiorno la prima parte dei dati utente
            $user = $this->getUser()->getCliente();
            /* @var $user \JF\ACLBundle\Entity\Gestore */
            $user->setTelefono($entity->getTelefono());
            $this->persist($user);
            
            //Aggiorno la seconda parte dei dati cliente
            $cliente = $this->getUser()->getCliente();
            /* @var $cliente \JF\ACLBundle\Entity\Cliente */
            $cliente->setTelefono($entity->getTelefono());
            $cliente->setCellulare($entity->getCellulare());
            $cliente->setFax($entity->getFax());
            $cliente->setEmail($entity->getEmailNegozio());
            $cliente->setSito($entity->getSito());
            $this->persist($cliente);
            
            return $this->redirect($this->generateUrl('negozio_step_3'));
        }

        return array(
            'entity' => $entity,
            'form' => $form->createView(),
            'step' => 2,
        );
    }

    /**
     * Creates a form to create a Negozio entity.
     *
     * @param Negozio $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateFormStep2(Negozio $entity) {
        $form = $this->createForm(new NegozioStep2Type(), $entity, array(
            'action' => $this->generateUrl('negozio_save_step_2'),
            'method' => 'POST',
            'attr' => array(
                'class' => 'step-form',
            ),
        ));

        $form->add('submit', 'button', array('label' => 'negozio.form.continua', 'translation_domain' => 'WSPACL', 'attr' => array('class' => 'btn green button-next')));

        return $form;
    }

    

    /**
     * Displays a form to create a new Negozio entity.
     *
     * @Route("/step-3", name="negozio_step_3")
     * @Method("GET")
     * @Template("WSPACLBundle:Negozio:form.html.twig")
     */
    public function step3Action() {
        $entity = $this->getUser();
        /* @var $entity \JF\ACLBundle\Entity\Gestore */
        
        $form = $this->createCreateFormStep3($entity);

        return array(
            'entity' => $entity,
            'form' => $form->createView(),
            'step' => 3,
        );
    }

    /**
     * Creates a new Negozio entity.
     *
     * @Route("/step-3", name="negozio_save_step_3")
     * @Method("POST")
     * @Template("WSPACLBundle:Negozio:form.html.twig")
     */
    public function saveStep3Action(Request $request) {
        // Recupero il negozio
        $entity = $this->getUser();
        /* @var $entity Gestore */
        
        $form = $this->createCreateFormStep3($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            //TODO: controlli di duplicazione negozio 
            
            $this->persist($entity);
            
            return $this->redirect($this->generateUrl('negozio_step_4'));
        }

        return array(
            'entity' => $entity,
            'form' => $form->createView(),
            'step' => 3,
        );
    }

    /**
     * Creates a form to create a Negozio entity.
     *
     * @param Negozio $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateFormStep3(Gestore $entity) {
        $form = $this->createForm(new GestoreType(), $entity, array(
            'action' => $this->generateUrl('negozio_save_step_3'),
            'method' => 'POST',
            'attr' => array(
                'class' => 'step-form',
            ),
        ));

        $form->add('submit', 'button', array('label' => 'negozio.form.continua', 'translation_domain' => 'WSPACL', 'attr' => array('class' => 'btn green button-next')));

        return $form;
    }

    /**
     * Displays a form to create a new Negozio entity.
     *
     * @Route("/step-4", name="negozio_step_4")
     * @Method("GET")
     * @Template("WSPACLBundle:Negozio:form.html.twig")
     */
    public function step4Action() {
        $user = $this->getUser();
        /* @var $user Gestore */
        $entity = $user->getCliente();
        /* @var $entity Cliente */
        
        $form = $this->createCreateFormStep4($entity);

        return array(
            'entity' => $entity,
            'form' => $form->createView(),
            'step' => 4,
        );
    }

    /**
     * Creates a new Negozio entity.
     *
     * @Route("/step-4", name="negozio_save_step_4")
     * @Method("POST")
     * @Template("WSPACLBundle:Negozio:form.html.twig")
     */
    public function saveStep4Action(Request $request) {
        // Recupero il negozio
        $user = $this->getUser();
        /* @var $user Gestore */
        $entity = $user->getCliente();
        /* @var $entity Cliente */
        
        $form = $this->createCreateFormStep4($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            //TODO: controlli di duplicazione negozio 
            
            $this->persist($entity);
            
            return $this->redirect($this->generateUrl('negozio'));
        }

        return array(
            'entity' => $entity,
            'form' => $form->createView(),
            'step' => 4,
        );
    }

    /**
     * Creates a form to create a Negozio entity.
     *
     * @param Negozio $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateFormStep4(Cliente $entity) {
        $form = $this->createForm(new ClienteType(), $entity, array(
            'action' => $this->generateUrl('negozio_save_step_4'),
            'method' => 'POST',
            'attr' => array(
                'class' => 'step-form',
            ),
        ));

        $form->add('submit', 'button', array('label' => 'negozio.form.concludi', 'translation_domain' => 'WSPACL', 'attr' => array('class' => 'btn green button-next')));

        return $form;
    }

    
    
    
    /**
     * Displays a form to edit an existing Negozio entity.
     *
     * @Route("/{id}/edit", name="negozio_edit")
     * @Method("GET")
     * @ParamConverter("id", class="WSPACLBundle:Negozio")
     * @Template()
     */
    public function editAction(Negozio $entity) {
        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Negozio entity.');
        }

        $editForm = $this->createEditForm($entity);

        return array(
            'entity' => $entity,
            'edit_form' => $editForm->createView(),
        );
    }

    /**
     * Creates a form to edit a Negozio entity.
     *
     * @param Negozio $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createEditForm(Negozio $entity) {
        $form = $this->createForm(new NegozioType(), $entity, array(
            'action' => $this->generateUrl('negozio_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update', 'attr' => array('class' => 'btn')));

        return $form;
    }

    /**
     * Edits an existing Negozio entity.
     *
     * @Route("/{id}", name="negozio_update")
     * @Method("PUT")
     * @ParamConverter("id", class="WSPACLBundle:Negozio")
     * @Template("WSPACLBundle:Negozio:edit.html.twig")
     */
    public function updateAction(Negozio $entity) {
        $request = $this->getRequest();
        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Negozio entity.');
        }
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $this->persist($entity);

            return $this->redirect($this->generateUrl('negozio'));
        }

        return array(
            'entity' => $entity,
            'edit_form' => $editForm->createView(),
        );
    }

}

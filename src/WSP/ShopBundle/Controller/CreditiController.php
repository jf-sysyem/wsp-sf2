<?php

namespace WSP\ShopBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Ephp\UtilityBundle\Controller\Traits\BaseController;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use WSP\ShopBundle\Entity\Crediti;
use WSP\ShopBundle\Form\CreditiType;

/**
 * Crediti controller.
 *
 * @Route("/crediti")
 */
class CreditiController extends Controller {

    use BaseController;

    /**
     * Lists all Crediti entities.
     *
     * @Route("/", name="crediti")
     * @Method("GET")
     * @Template()
     */
    public function indexAction() {
        $entities = $this->findAll('WSPShopBundle:Crediti');

        return array(
            'entities' => $entities,
        );
    }

    /**
     * Creates a new Crediti entity.
     *
     * @Route("/", name="crediti_create")
     * @Method("POST")
     * @Template("WSPShopBundle:Crediti:new.html.twig")
     */
    public function createAction(Request $request) {
        $entity = new Crediti();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $this->persist($entity);

            return $this->redirect($this->generateUrl('crediti'));
        }

        $entities = $this->findAll('WSPShopBundle:Crediti');

        return array(
            'entities' => $entities,
            'entity' => $entity,
            'form' => $form->createView(),
        );
    }

    /**
     * Creates a form to create a Crediti entity.
     *
     * @param Crediti $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Crediti $entity) {
        $form = $this->createForm(new CreditiType(), $entity, array(
            'action' => $this->generateUrl('crediti_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Aggiungi', 'attr' => array('class' => 'btn red btn-xs')));
        $form->add('button', 'button', array('label' => 'Torna indietro', 'attr' => array('class' => 'btn yellow btn-xs', 'onclick' => "window.location='".$this->generateUrl('crediti')."';")));

        return $form;
    }

    /**
     * Displays a form to create a new Crediti entity.
     *
     * @Route("/new", name="crediti_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction() {
        $entity = new Crediti();
        $entity->setVisibile(true);
        $form = $this->createCreateForm($entity);
        $entities = $this->findAll('WSPShopBundle:Crediti');

        return array(
            'entities' => $entities,
            'entity' => $entity,
            'form' => $form->createView(),
        );
    }

    /**
     * Displays a form to edit an existing Crediti entity.
     *
     * @Route("/{id}/edit", name="crediti_edit")
     * @Method("GET")
     * @ParamConverter("id", class="WSPShopBundle:Crediti")
     * @Template()
     */
    public function editAction(Crediti $entity) {
        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Crediti entity.');
        }

        $editForm = $this->createEditForm($entity);

        $entities = $this->findAll('WSPShopBundle:Crediti');

        return array(
            'entities' => $entities,
            'entity' => $entity,
            'edit_form' => $editForm->createView(),
        );
    }

    /**
     * Creates a form to edit a Crediti entity.
     *
     * @param Crediti $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createEditForm(Crediti $entity) {
        $form = $this->createForm(new CreditiType(), $entity, array(
            'action' => $this->generateUrl('crediti_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Aggiorna', 'attr' => array('class' => 'btn red btn-xs')));
        $form->add('button', 'button', array('label' => 'Torna indietro', 'attr' => array('class' => 'btn yellow btn-xs', 'onclick' => "window.location='".$this->generateUrl('crediti')."';")));

        return $form;
    }

    /**
     * Edits an existing Crediti entity.
     *
     * @Route("/{id}", name="crediti_update")
     * @Method("PUT")
     * @ParamConverter("id", class="WSPShopBundle:Crediti")
     * @Template("WSPShopBundle:Crediti:edit.html.twig")
     */
    public function updateAction(Crediti $entity) {
        $request = $this->getRequest();
        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Crediti entity.');
        }
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $this->persist($entity);

            return $this->redirect($this->generateUrl('crediti'));
        }

        $entities = $this->findAll('WSPShopBundle:Crediti');

        return array(
            'entities' => $entities,
            'entity' => $entity,
            'edit_form' => $editForm->createView(),
        );
    }

    /**
     * Deletes a Crediti entity.
     *
     * @Route("/{id}", name="crediti_delete")
     */
    public function deleteAction($id) {
        $em = $this->getDoctrine()->getManager();
        $entity = $em->getRepository('WSPShopBundle:Crediti')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Crediti entity.');
        }

        $entity->setVisibile(!$entity->getVisibile());

        $em->persist($entity);
        $em->flush();

        return $this->redirect($this->generateUrl('crediti'));
    }
}

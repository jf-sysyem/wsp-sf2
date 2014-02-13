<?php

namespace WSP\ShopBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Ephp\UtilityBundle\Controller\Traits\BaseController;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use WSP\ShopBundle\Entity\Pubblicazione;
use WSP\ShopBundle\Form\PubblicazioneType;

/**
 * Pubblicazione controller.
 *
 * @Route("/pubblicazione")
 */
class PubblicazioneController extends Controller {

    use BaseController;

    /**
     * Lists all Pubblicazione entities.
     *
     * @Route("/", name="pubblicazione")
     * @Method("GET")
     * @Template()
     */
    public function indexAction() {
        $entities = $this->findAll('WSPShopBundle:Pubblicazione');

        return array(
            'entities' => $entities,
        );
    }

    /**
     * Creates a new Pubblicazione entity.
     *
     * @Route("/", name="pubblicazione_create")
     * @Method("POST")
     * @Template("WSPShopBundle:Pubblicazione:new.html.twig")
     */
    public function createAction(Request $request) {
        $entity = new Pubblicazione();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $this->persist($entity);

            return $this->redirect($this->generateUrl('pubblicazione'));
        }
        $entities = $this->findAll('WSPShopBundle:Pubblicazione');

        return array(
            'entities' => $entities,
            'entity' => $entity,
            'form' => $form->createView(),
        );
    }

    /**
     * Creates a form to create a Pubblicazione entity.
     *
     * @param Pubblicazione $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Pubblicazione $entity) {
        $form = $this->createForm(new PubblicazioneType(), $entity, array(
            'action' => $this->generateUrl('pubblicazione_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Aggiungi', 'attr' => array('class' => 'btn red btn-xs')));
        $form->add('button', 'button', array('label' => 'Torna indietro', 'attr' => array('class' => 'btn yellow btn-xs', 'onclick' => "window.location='" . $this->generateUrl('pubblicazione') . "';")));

        return $form;
    }

    /**
     * Displays a form to create a new Pubblicazione entity.
     *
     * @Route("/new", name="pubblicazione_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction() {
        $entity = new Pubblicazione();
        $entity->setVisibile(true);
        $form = $this->createCreateForm($entity);
        $entities = $this->findAll('WSPShopBundle:Pubblicazione');

        return array(
            'entities' => $entities,
            'entity' => $entity,
            'form' => $form->createView(),
        );
    }

    /**
     * Displays a form to edit an existing Pubblicazione entity.
     *
     * @Route("/{id}/edit", name="pubblicazione_edit")
     * @Method("GET")
     * @ParamConverter("id", class="WSPShopBundle:Pubblicazione")
     * @Template()
     */
    public function editAction(Pubblicazione $entity) {
        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Pubblicazione entity.');
        }

        $editForm = $this->createEditForm($entity);
        $entities = $this->findAll('WSPShopBundle:Pubblicazione');

        return array(
            'entities' => $entities,
            'entity' => $entity,
            'edit_form' => $editForm->createView(),
        );
    }

    /**
     * Creates a form to edit a Pubblicazione entity.
     *
     * @param Pubblicazione $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createEditForm(Pubblicazione $entity) {
        $form = $this->createForm(new PubblicazioneType(), $entity, array(
            'action' => $this->generateUrl('pubblicazione_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Aggiorna', 'attr' => array('class' => 'btn red btn-xs')));
        $form->add('button', 'button', array('label' => 'Torna indietro', 'attr' => array('class' => 'btn yellow btn-xs', 'onclick' => "window.location='" . $this->generateUrl('pubblicazione') . "';")));

        return $form;
    }

    /**
     * Edits an existing Pubblicazione entity.
     *
     * @Route("/{id}", name="pubblicazione_update")
     * @Method("PUT")
     * @ParamConverter("id", class="WSPShopBundle:Pubblicazione")
     * @Template("WSPShopBundle:Pubblicazione:edit.html.twig")
     */
    public function updateAction(Pubblicazione $entity) {
        $request = $this->getRequest();
        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Pubblicazione entity.');
        }
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);
        $entities = $this->findAll('WSPShopBundle:Pubblicazione');

        if ($editForm->isValid()) {
            $this->persist($entity);

            return $this->redirect($this->generateUrl('pubblicazione'));
        }

        return array(
            'edit_form' => $editForm->createView(),
            'entity' => $entity,
            'edit_form' => $editForm->createView(),
        );
    }

    /**
     * Deletes a Pubblicazione entity.
     *
     * @Route("/{id}", name="pubblicazione_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id) {
        $em = $this->getDoctrine()->getManager();
        $entity = $em->getRepository('WSPShopBundle:Pubblicazione')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Pubblicazione entity.');
        }

        $entity->setVisibile(!$entity->getVisibile());

        $em->persist($entity);
        $em->flush();

        return $this->redirect($this->generateUrl('pubblicazione'));
    }

}

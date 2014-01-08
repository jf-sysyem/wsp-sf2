<?php

namespace WSP\PromoBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Ephp\UtilityBundle\Controller\Traits\BaseController;
use Ephp\UtilityBundle\Controller\Traits\PaginatorController;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use WSP\PromoBundle\Entity\Contatto;

/**
 * Contatto controller.
 *
 * @Route("/contatti")
 */
class ContattoController extends Controller {

    use BaseController,
        PaginatorController;

    /**
     * Lists all Contatto entities.
     *
     * @Route("/", name="contatti")
     * @Method("GET")
     * @Template()
     */
    public function indexAction() {
        $pagination = $this->createPagination($this->getRepository('WSPPromoBundle:Contatto')->nuovi(), 20);

        return array(
            'pagination' => $pagination,
        );
    }

    /**
     * Finds and displays a Contatto entity.
     *
     * @Route("/{id}", name="contatti_show")
     * @Method("GET")
     * #ParamConverter("id", class="WSPPromoBundle:Contatto")
     * @Template()
     */
    public function showAction($id) {
        $entity = $this->find('WSPPromoBundle:Contatto', $id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Contatto entity.');
        }

        return array(
            'entity' => $entity,
        );
    }

    /**
     * Deletes a Contatto entity.
     *
     * @Route("/{id}", name="contatti_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id) {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('WSPPromoBundle:Contatto')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Contatto entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('contatti'));
    }

}

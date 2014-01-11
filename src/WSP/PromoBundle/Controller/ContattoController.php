<?php

namespace WSP\PromoBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Ephp\UtilityBundle\Controller\Traits\BaseController;
use Ephp\UtilityBundle\Controller\Traits\PaginatorController;
use Ephp\ACLBundle\Controller\Traits\NotifyController;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use WSP\PromoBundle\Entity\Contatto;
use WSP\PromoBundle\Entity\Messaggio;
use WSP\PromoBundle\Form\MessaggioType;

/**
 * Contatto controller.
 *
 * @Route("/contatti")
 */
class ContattoController extends Controller {

    use BaseController,
        PaginatorController,
        NotifyController;

    /**
     * Lists all Contatto entities.
     *
     * @Route("/", name="contatti", options={"ACL": {"in_role": "R_WSP"}})
     * @Method("GET")
     * @Template()
     */
    public function indexAction() {
        $pagination = $this->createPagination($this->getRepository('WSPPromoBundle:Contatto')->createQueryBuilder('c')->orderBy('c.createdAt', 'DESC'), 10, 'pconctact');
        $entity = new Messaggio();
        $form = $this->createCreateFormMessaggio($entity);
        $messaggi = $this->createPagination($this->getRepository('WSPPromoBundle:Messaggio')->createQueryBuilder('m')->orderBy('m.createdAt', 'DESC'), 10, 'pmail');

        return array(
            'pagination' => $pagination,
            'entity' => $entity,
            'form' => $form->createView(),
            'messaggi' => $messaggi,
        );
    }

    /**
     * Finds and displays a Contatto entity.
     *
     * @Route("-{id}", name="contatti_show", options={"ACL": {"in_role": "R_WSP"}})
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
     * @Route("-note/{id}", name="contatti_note", options={"expose": true, "ACL": {"in_role": "R_WSP"}})
     */
    public function noteAction($id) {
        $entity = $this->find('WSPPromoBundle:Contatto', $id);
        switch ($this->getParam('f')) {
            case 'note':
                $entity->setNote($this->getParam('v'));
                break;
            default:
                break;
        }
        $this->persist($entity);
        return $this->jsonResponse(array('code' => 200));
    }

    /**
     * Deletes a Contatto entity.
     *
     * @Route("-scrivi-email", name="contatti_email", defaults={"format": "json"}, options={"expose": true, "ACL": {"in_role": "R_WSP"}})
     */
    public function scriviEmailAction() {

        $entity = new Messaggio();
        $form = $this->createCreateFormMessaggio($entity);
        $form->handleRequest($this->getRequest());

        if ($form->isValid()) {
            $entities = $this->findAll('WSPPromoBundle:Contatto');
            foreach ($entities as $contatto) {
                /* @var $contatto Contatto */
                $message = \Swift_Message::newInstance()
                        ->setSubject($entity->getSubject())
                        ->setFrom('marketing@wsprice.it')
                        ->setTo(trim($contatto->getEmail()))
                        ->setBody($this->renderView("WSPPromoBundle:Contatto:email.txt.twig", array('subject' => $entity->getSubject(), 'testo' => $entity->getBody())))
                        ->addPart($this->renderView("WSPPromoBundle:Contatto:email.html.twig", array('subject' => $entity->getSubject(), 'testo' => $entity->getBody())), 'text/html');
                $message->getHeaders()->addTextHeader('X-Mailer', 'PHP v' . phpversion());
                $this->get('mailer')->send($message);
                $entity->addDestinatari($contatto);
            }
            $this->persist($entity);
        }

        return $this->redirect($this->generateUrl('contatti'));
    }

    /**
     * Deletes a Contatto entity.
     *
     * @Route("-reinvia-email/{id}", name="reinvia_email", defaults={"format": "json"}, options={"expose": true, "ACL": {"in_role": "R_WSP"}})
     */
    public function reinviaEmailAction($id) {
        $entity = $this->find('WSPPromoBundle:Messaggio', $id);
        $_ids = $this->executeSql("select c.id from promo_contatti c where c.id not in (select d.contatto_id from promo_destinatari d where d.messaggio_id = :id)", array('id' => $id));
        $ids = array();
        foreach ($_ids as $_id) {
            $ids[] = $_id['id'];
        }
        $entities = $this->findBy('WSPPromoBundle:Contatto', array('id' => $ids));
        foreach ($entities as $contatto) {
            /* @var $contatto Contatto */
            $message = \Swift_Message::newInstance()
                    ->setSubject($entity->getSubject())
                    ->setFrom('marketing@wsprice.it')
                    ->setTo(trim($contatto->getEmail()))
                    ->setBody($this->renderView("WSPPromoBundle:Contatto:email.txt.twig", array('subject' => $entity->getSubject(), 'testo' => $entity->getBody())))
                    ->addPart($this->renderView("WSPPromoBundle:Contatto:email.html.twig", array('subject' => $entity->getSubject(), 'testo' => $entity->getBody())), 'text/html');
            $message->getHeaders()->addTextHeader('X-Mailer', 'PHP v' . phpversion());
            $this->get('mailer')->send($message);
            $entity->addDestinatari($contatto);
        }
        $this->persist($entity);

        return $this->redirect($this->generateUrl('contatti'));
    }

    /**
     * Deletes a Contatto entity.
     *
     * @Route("/{id}", name="contatti_delete", options={"ACL": {"in_role": "R_WSP"}})
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

    /**
     * Creates a form to create a Messaggio entity.
     *
     * @param Messaggio $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateFormMessaggio(Messaggio $entity) {
        $form = $this->createForm(new MessaggioType(), $entity, array(
            'action' => $this->generateUrl('contatti_email'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Invia', 'attr' => array('class' => 'btn red')));

        return $form;
    }

}

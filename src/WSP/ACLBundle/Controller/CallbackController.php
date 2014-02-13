<?php

namespace WSP\ACLBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use WSP\ACLBundle\Entity\Negozio;
use JF\DragDropBundle\Entity\File;

/**
 * @Route("/callback/negozio")
 */
class CallbackController extends Controller {

    use \Ephp\UtilityBundle\Controller\Traits\BaseController;

    /**
     * Displays a form to edit an existing Categoria entity.
     *
     * @Route("/{id}/logo", name="callback_negozio_logo", defaults={"_format": "html"})
     * @Method("POST")
     */
    public function logoAction($id) {
        $entity = $this->find('WSPACLBundle:Negozio', $id);
        /* @var $entity Negozio */
        if (!$entity) {
            return $this->jsonResponse(array('status' => 500, 'error' => 'Entity Negozio not found'));
        }

        try {
            $this->getEm()->beginTransaction();

            $json = json_decode($this->getRequest()->getContent());
            $file = $json->files[0];

            $logo = new File();
            $logo->setDescrizione('Logo di ' . $entity->getNome());
            $logo->setNome($file->name);
            $logo->setPath($file->path);
            $logo->setSize($file->size);
            $logo->setTitolo($entity->getNome());
            $logo->setType($file->type);
            $logo->setUser($entity->getCliente()->getReferente());
            $urls = array();
            foreach ($file as $k => $v) {
                if (strpos($k, 'url') !== false) {
                    $urls[$k] = $v;
                } elseif (strpos($k, 'Url') !== false) {
                    $k = str_replace('Url', '', $k);
                    $urls[$k] = $v;
                }
            }
            $logo->setUrls($urls);
            $this->persist($logo);

            $oldLogo = $entity->getLogo();
            // TODO chiamata DELETE per cancellazione
            
            $entity->setLogo($logo);
            $this->persist($entity);
            $this->getEm()->commit();
        } catch (\Exception $ex) {
            $this->getEm()->rollback();
            throw $ex;
            return $this->jsonResponse(array('status' => 500, 'error' => $ex->getMessage()));
        }
        return $this->jsonResponse(array('status' => 200));
    }

}

<?php

namespace Hours\VideoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

/**
 * @Route("/__hours_video_render")
 * @Template()
 */
class RenderController extends Controller {

    /**
     * @Route("/__social")
     * @Template("HoursVideoBundle::layout/social.html.twig")
     */
    public function socialAction() {
        return $this->container->getParameter('hv.social');
    }

    /**
     * @Route("/__youtube")
     * @Template("HoursVideoBundle::layout/youtube.html.twig")
     */
    public function youtubeAction() {
        return $this->container->getParameter('hv.youtube');
    }

    /**
     * @Route("/__subscribe", name="hv_subscribe")
     * @Template("HoursVideoBundle::layout/subscribe.html.twig")
     */
    public function subscribeAction() {
        return $this->container->getParameter('hv.subscribe');
    }

}

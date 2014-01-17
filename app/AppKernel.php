<?php

use Symfony\Component\HttpKernel\Kernel;
use Symfony\Component\Config\Loader\LoaderInterface;

class AppKernel extends Kernel {

    public function registerBundles() {
        $bundles = array(
            new Symfony\Bundle\FrameworkBundle\FrameworkBundle(),
            new Symfony\Bundle\SecurityBundle\SecurityBundle(),
            new Symfony\Bundle\TwigBundle\TwigBundle(),
            new Symfony\Bundle\MonologBundle\MonologBundle(),
            new Symfony\Bundle\SwiftmailerBundle\SwiftmailerBundle(),
            new Symfony\Bundle\AsseticBundle\AsseticBundle(),
            new Doctrine\Bundle\DoctrineBundle\DoctrineBundle(),
            new Sensio\Bundle\FrameworkExtraBundle\SensioFrameworkExtraBundle(),
            
            new FOS\JsRoutingBundle\FOSJsRoutingBundle(),
            new FOS\UserBundle\FOSUserBundle(),
            new Knp\Bundle\MenuBundle\KnpMenuBundle(),
            new Knp\Bundle\PaginatorBundle\KnpPaginatorBundle(),
            new Stof\DoctrineExtensionsBundle\StofDoctrineExtensionsBundle(),
            new PunkAve\FileUploaderBundle\PunkAveFileUploaderBundle(),
            new Liuggio\ExcelBundle\LiuggioExcelBundle(),
            new Bazinga\Bundle\JsTranslationBundle\BazingaJsTranslationBundle(),
            new HWI\Bundle\OAuthBundle\HWIOAuthBundle(),
            
            new Ephp\UtilityBundle\EphpUtilityBundle(),
            new Ephp\DragDropBundle\EphpDragDropBundle(),
            new Ephp\ACLBundle\EphpACLBundle(),
            new Ephp\NodeBundle\EphpNodeBundle(),
            new Ephp\StatsBundle\EphpStatsBundle(),
            new Ephp\GeoBundle\EphpGeoBundle(),
            
            new JF\GeneratorBundle\JFGeneratorBundle(),
            new JF\CoreBundle\JFCoreBundle(),
            new JF\ACLBundle\JFACLBundle(),
            new JF\DragDropBundle\JFDragDropBundle(),
            
            new Metronic\AdminBundle\MetronicAdminBundle(),
            new Hours\VideoBundle\HoursVideoBundle(),
            
            new WSP\ACLBundle\WSPACLBundle(),
            new WSP\AdminBundle\WSPAdminBundle(),
            new WSP\PromoBundle\WSPPromoBundle(),
        );

        if (in_array($this->getEnvironment(), array('dev', 'test'))) {
            $bundles[] = new Symfony\Bundle\WebProfilerBundle\WebProfilerBundle();
            $bundles[] = new Sensio\Bundle\DistributionBundle\SensioDistributionBundle();
            $bundles[] = new Sensio\Bundle\GeneratorBundle\SensioGeneratorBundle();
        }

        return $bundles;
    }

    public function registerContainerConfiguration(LoaderInterface $loader) {
        $loader->load(__DIR__ . '/config/config_' . $this->getEnvironment() . '.yml');
    }

}

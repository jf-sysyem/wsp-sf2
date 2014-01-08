<?php

namespace WSP\PromoBundle\DependencyInjection;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use Symfony\Component\DependencyInjection\Loader;
use JF\CoreBundle\DependencyInjection\Interfaces\IExtension;
use JF\CoreBundle\DependencyInjection\Traits\CoreExtension;

/**
 * This is the class that loads and manages your bundle configuration
 *
 * To learn more see {@link http://symfony.com/doc/current/cookbook/bundles/extension.html}
 */
class WSPPromoExtension extends Extension implements IExtension {

    use CoreExtension;

    /**
     * {@inheritDoc}
     */
    public function load(array $configs, ContainerBuilder $container) {
        $configuration = new Configuration();
        $config = $this->processConfiguration($configuration, $configs);

        $this->configure($container);

        $loader = new Loader\XmlFileLoader($container, new FileLocator(__DIR__ . '/../Resources/config'));
        $loader->load('services.xml');
    }

    public function setInstall(ContainerBuilder $container) {
        $install = $container->getParameter('jf.install');

        $this->newInstall($install, '\WSP\PromoBundle\Controller\InstallController', 'indexAction');

        $container->setParameter('jf.install', $install);
    }

    public function setMenu(ContainerBuilder $container) {
        $menu = $container->getParameter('jf.menu');

        $menu['wsp']['submenu'][] = array(
            'label' => 'Contatti',
            'route' => 'contatti',
            'order' => 999,
        );


        $container->setParameter('jf.menu', $menu);
    }

    public function setPackage(ContainerBuilder $container) {
        $package = $container->getParameter('jf.package');

        $this->newPackage($package, 'jf.acl', 'ACL', 0, true);

        $container->setParameter('jf.package', $package);
    }

    public function setRoles(ContainerBuilder $container) {
        $roles = $container->getParameter('jf.roles');

        $this->newRole($roles, 'R_ADMIN', 'ADM', 'Amministratore');

        $container->setParameter('jf.roles', $roles);
    }

    public function setWidgets(ContainerBuilder $container) {
        $widgets = $container->getParameter('jf.widgets');

        $this->newWidget($widgets, 'jf.acl.locked', 'ACLock', array('R_SUPER'), 'JFACLBundle:Widgets:lock');
        $this->newWidget($widgets, 'jf.acl.utenti', 'Utenti', array('R_SUPER'), 'JFACLBundle:Widgets:utenti');
        $this->newWidget($widgets, 'jf.acl.licenze', 'Licenze', array('R_SUPER'), 'JFACLBundle:Widgets:licenze');

        $container->setParameter('jf.widgets', $widgets);
    }

}

<?php

namespace WSP\ACLBundle\DependencyInjection;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\Config\FileLocator;
use JF\ACLBundle\DependencyInjection\JFACLExtension;
use Symfony\Component\DependencyInjection\Loader;

/**
 * This is the class that loads and manages your bundle configuration
 *
 * To learn more see {@link http://symfony.com/doc/current/cookbook/bundles/extension.html}
 */
class WSPACLExtension extends JFACLExtension {

    /**
     * {@inheritDoc}
     */
    public function load(array $configs, ContainerBuilder $container) {
        parent::load($configs, $container);

        $configuration = new Configuration();
        $config = $this->processConfiguration($configuration, $configs);

        $loader = new Loader\XmlFileLoader($container, new FileLocator(__DIR__ . '/../Resources/config'));
        $loader->load('services.xml');
    }

    public function setMenu(ContainerBuilder $container) {
        parent::setMenu($container);
        $menu = $container->getParameter('jf.menu');

        $menu['utility']['submenu'][] = array(
            'label' => 'Categorie',
            'route' => 'categoria',
            'show' => array(
                'in_role' => 'R_EPH'
            ),
            'order' => 10,
        );

        $container->setParameter('jf.menu', $menu);
    }

}

<?php

/**
 * Marc Manusch
 */

namespace PaulMiniBasketFix;

use Shopware\Bundle\AttributeBundle\Service\CrudService;
use Shopware\Components\Model\ModelManager;
use Shopware\Components\Plugin;
use Shopware\Components\Plugin\Context\InstallContext;
use Symfony\Component\DependencyInjection\ContainerBuilder;


class PaulMiniBasketFix extends Plugin
{
    /**
     * @param ContainerBuilder $container
     */
    public function build(ContainerBuilder $container)
    {
        $container->setParameter('paul_mini_basket_fix.plugin_dir', $this->getPath());
        parent::build($container);
    }
}
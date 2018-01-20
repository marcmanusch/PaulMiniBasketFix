<?php

namespace PaulMiniBasketFix\Subscriber;

use Enlight\Event\SubscriberInterface;
use Shopware\Components\Theme\LessDefinition;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Class CompileLess
 * @package PaulMiniBasketFix\Subscriber
 */
class CompileLess implements SubscriberInterface
{

    /** @var ContainerInterface */
    private $container;

    /**
     * CompileLess constructor.
     * @param ContainerInterface $container
     */
    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
    }

    /**
     * @inheritdoc
     */
    public static function getSubscribedEvents()
    {
        return [
            'Theme_Compiler_Collect_Plugin_Less' => 'onCollectLess'
        ];
    }

    /**
     * Adds the plugin less
     * @param \Enlight_Event_EventArgs $args
     * @return LessDefinition
     * @throws \Symfony\Component\DependencyInjection\Exception\InvalidArgumentException
     */
    public function onCollectLess(\Enlight_Event_EventArgs $args)
    {
        $pluginDir = $this->container->getParameter('paul_mini_basket_fix.plugin_dir');

        return new LessDefinition(
            [],
            [$pluginDir . '/Resources/Views/frontend/_public/src/less/all.less'],
            $pluginDir
        );
    }
}
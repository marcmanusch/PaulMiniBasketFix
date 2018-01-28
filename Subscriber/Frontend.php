<?php

namespace PaulMiniBasketFix\Subscriber;

use Enlight\Event\SubscriberInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;


class Frontend implements SubscriberInterface
{

    /** @var  ContainerInterface */
    private $container;

    /**
     * Frontend contructor.
     * @param ContainerInterface $container
     **/
    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
    }

    /**
     * @return array
     */
    public static function getSubscribedEvents()
    {
        return [
            'Enlight_Controller_Action_PostDispatchSecure_Frontend' => 'onFrontendPostDispatch',
        ];
    }

    /**
     * @param \Enlight_Event_EventArgs $args
     */
    public function onFrontendPostDispatch(\Enlight_Event_EventArgs $args)
    {
        
        $config = $this->container->get('shopware.plugin.config_reader')->getByPluginName('PaulMiniBasketFix', $shop);
        
        // get plugin settings
        $paulShowShipping = $config['paulShowShipping'];

        /** @var $controller \Enlight_Controller_Action */
        $controller = $args->getSubject();
        $view = $controller->View();
        $view->addTemplateDir($this->container->getParameter('paul_mini_basket_fix.plugin_dir') . '/Resources/Views');
        
        // aggign to frontend
        $view->assign('paulShowShipping', $paulShowShipping);

    }
}

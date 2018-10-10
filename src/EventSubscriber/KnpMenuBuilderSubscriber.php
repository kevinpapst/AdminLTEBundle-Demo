<?php

/*
 * This file is part of the AdminLTE-Bundle demo.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App\EventSubscriber;

use KevinPapst\AdminLTEBundle\Event\KnpMenuEvent;
use KevinPapst\AdminLTEBundle\Event\ThemeEvents;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\Security\Core\Authorization\AuthorizationCheckerInterface;

/**
 * Class KnpMenuBuilderSubscriber configures the main navigation utilizing the KnpMenuBundle.
 */
class KnpMenuBuilderSubscriber implements EventSubscriberInterface
{
    /**
     * @var AuthorizationCheckerInterface
     */
    private $security;

    /**
     * @param AuthorizationCheckerInterface $security
     */
    public function __construct(AuthorizationCheckerInterface $security)
    {
        $this->security = $security;
    }

    /**
     * @return array
     */
    public static function getSubscribedEvents(): array
    {
        return [
            ThemeEvents::THEME_SIDEBAR_SETUP_KNP_MENU => ['onSetupNavbar', 100],
        ];
    }

    /**
     * Generate the main menu.
     *
     * @param KnpMenuEvent $event
     */
    public function onSetupNavbar(KnpMenuEvent $event)
    {
        $menu = $event->getMenu();

        $menu->addChild(
            'menu-label', ['label' => 'Main Navigation', 'childOptions' => $event->getChildOptions()]
        )->setAttribute('class', 'header');

        $menu->addChild(
            'homepage', ['route' => 'homepage', 'label' => 'menu.homepage', 'childOptions' => $event->getChildOptions()]
        )->setLabelAttribute('icon', 'fas fa-tachometer-alt');

        $menu->addChild(
            'forms', ['route' => 'forms', 'label' => 'menu.form', 'childOptions' => $event->getChildOptions()]
        )->setLabelAttribute('icon', 'fab fa-wpforms');

        $menu->addChild(
            'context', ['route' => 'context', 'label' => 'AdminLTE context', 'childOptions' => $event->getChildOptions()]
        )->setLabelAttribute('icon', 'fas fa-code');

        $menu->addChild(
            'demo', ['label' => 'Demo', 'childOptions' => $event->getChildOptions(), 'options' => ['branch_class' => 'treeview']]
        )->setLabelAttribute('icon', 'far fa-arrow-alt-circle-right');

        $menu->getChild('demo')->addChild(
            'sub-demo', ['route' => 'forms2', 'label' => 'Forms Demo 2', 'childOptions' => $event->getChildOptions()]
        )->setLabelAttribute('icon', 'far fa-arrow-alt-circle-down');
        $menu->getChild('demo')->getChild('sub-demo')->addChild(
            'sub-demo3', ['route' => 'forms2', 'label' => 'Forms Demo 2', 'childOptions' => $event->getChildOptions()]
        )->setLabelAttribute('icon', 'far fa-arrow-alt-circle-left');

        $menu->getChild('demo')->addChild(
            'sub-demo2', ['route' => 'forms3', 'label' => 'Form Sidebar Demo', 'childOptions' => $event->getChildOptions()]
        )->setLabelAttribute('icon', 'far fa-arrow-alt-circle-up');

        if ($this->security->isGranted('IS_AUTHENTICATED_REMEMBERED')) {
            $menu->addChild(
                'logout', ['route' => 'fos_user_security_logout', 'label' => 'menu.logout', 'childOptions' => $event->getChildOptions()]
            )->setLabelAttribute('icon', 'fas fa-sign-out-alt');
        } else {
            $menu->addChild(
                'login', ['route' => 'fos_user_security_login', 'label' => 'menu.login', 'childOptions' => $event->getChildOptions()]
            )->setLabelAttribute('icon', 'fas fa-sign-in-alt');
        }
    }
}

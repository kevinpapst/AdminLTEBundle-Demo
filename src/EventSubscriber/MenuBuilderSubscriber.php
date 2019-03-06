<?php

/*
 * This file is part of the AdminLTE-Bundle demo.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App\EventSubscriber;

use KevinPapst\AdminLTEBundle\Event\SidebarMenuEvent;
use KevinPapst\AdminLTEBundle\Event\ThemeEvents;
use KevinPapst\AdminLTEBundle\Model\MenuItemModel;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\Security\Core\Authorization\AuthorizationCheckerInterface;

/**
 * Class MenuBuilder configures the main navigation.
 */
class MenuBuilderSubscriber implements EventSubscriberInterface
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
            ThemeEvents::THEME_SIDEBAR_SETUP_MENU => ['onSetupNavbar', 100],
            ThemeEvents::THEME_BREADCRUMB => ['onSetupNavbar', 100],
        ];
    }

    /**
     * Generate the main menu.
     *
     * @param SidebarMenuEvent $event
     */
    public function onSetupNavbar(SidebarMenuEvent $event)
    {
        $event->addItem(
            new MenuItemModel('homepage', 'menu.homepage', 'homepage', [], 'fas fa-tachometer-alt')
        );

        $event->addItem(
            new MenuItemModel('forms', 'menu.form', 'forms', [], 'fab fa-wpforms')
        );

        $event->addItem(
            new MenuItemModel('context', 'AdminLTE context', 'context', [], 'fas fa-code')
        );

        $demo = new MenuItemModel('demo', 'Demo', null, [], 'far fa-arrow-alt-circle-right');
        $demo->addChild(
            new MenuItemModel('sub-demo', 'Form - Horizontal', 'forms2', [], 'far fa-arrow-alt-circle-down')
        )->addChild(
            new MenuItemModel('sub-demo2', 'Form - Sidebar', 'forms3', [], 'far fa-arrow-alt-circle-up')
        );
        $event->addItem($demo);

        if ($this->security->isGranted('IS_AUTHENTICATED_REMEMBERED')) {
            $event->addItem(
                new MenuItemModel('logout', 'menu.logout', 'fos_user_security_logout', [], 'fas fa-sign-out-alt')
            );
        } else {
            $event->addItem(
                new MenuItemModel('login', 'menu.login', 'fos_user_security_login', [], 'fas fa-sign-in-alt')
            );
        }

        $this->activateByRoute(
            $event->getRequest()->get('_route'),
            $event->getItems()
        );
    }

    /**
     * @param string $route
     * @param MenuItemModel[] $items
     */
    protected function activateByRoute($route, $items)
    {
        foreach ($items as $item) {
            if ($item->hasChildren()) {
                $this->activateByRoute($route, $item->getChildren());
            } elseif ($item->getRoute() == $route) {
                $item->setIsActive(true);
            }
        }
    }
}

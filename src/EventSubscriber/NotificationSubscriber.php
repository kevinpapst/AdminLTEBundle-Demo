<?php

/*
 * This file is part of the AdminLTE-Bundle demo.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App\EventSubscriber;

use KevinPapst\AdminLTEBundle\Event\NotificationListEvent;
use KevinPapst\AdminLTEBundle\Helper\Constants;
use KevinPapst\AdminLTEBundle\Model\NotificationModel;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\Security\Core\Authorization\AuthorizationCheckerInterface;

/**
 * Class NotificationSubscriber adds notification messages to the top bar.
 */
class NotificationSubscriber implements EventSubscriberInterface
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
            NotificationListEvent::class => ['onNotifications', 100],
        ];
    }

    /**
     * @param NotificationListEvent $event
     */
    public function onNotifications(NotificationListEvent $event)
    {
        $notification = new NotificationModel();
        $notification
            ->setId(1)
            ->setMessage('A demo message')
            ->setType(Constants::TYPE_SUCCESS)
            ->setIcon('far fa-envelope')
        ;
        $event->addNotification($notification);

        $event->addNotification(new NotificationModel('Another message', Constants::TYPE_ERROR));
        $event->addNotification(new NotificationModel('Message 3', Constants::TYPE_INFO));
        $event->addNotification(new NotificationModel('Message 4', Constants::TYPE_WARNING));
        $event->addNotification(new NotificationModel('Message 5', Constants::TYPE_INFO, 'far fa-flag'));
        $event->addNotification(new NotificationModel('Message 6', Constants::TYPE_SUCCESS));

        if (!$this->security->isGranted('IS_AUTHENTICATED_REMEMBERED')) {
            return;
        }

        $notification = new NotificationModel('You are logged-in!', Constants::TYPE_SUCCESS, 'fas fa-sign-in-alt');
        $notification->setId(2);
        $event->addNotification($notification);
    }
}

<?php

/*
 * This file is part of the AdminLTE-Bundle demo.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App\EventSubscriber;

use KevinPapst\AdminLTEBundle\Event\MessageListEvent;
use KevinPapst\AdminLTEBundle\Event\ThemeEvents;
use KevinPapst\AdminLTEBundle\Model\MessageModel;
use KevinPapst\AdminLTEBundle\Model\UserModel;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\Security\Core\Security;

/**
 * Class MessageSubscriber adds user messages to the top bar.
 */
class MessageSubscriber implements EventSubscriberInterface
{
    /**
     * @var Security
     */
    protected $security;

    /**
     * @param Security $security
     */
    public function __construct(Security $security)
    {
        $this->security = $security;
    }

    /**
     * @return array
     */
    public static function getSubscribedEvents(): array
    {
        return [
            ThemeEvents::THEME_MESSAGES => ['onMessages', 100],
        ];
    }

    /**
     * @param MessageListEvent $event
     */
    public function onMessages(MessageListEvent $event)
    {
        $user = $this->security->getUser();

        $userModel = new UserModel();
        $userModel->setName($user ? $user->getUsername() : 'anonymous');

        if (!$this->security->isGranted('IS_AUTHENTICATED_REMEMBERED')) {
            $message = new MessageModel($userModel, 'Login to see more', new \DateTime('-2 days'));
            $message->setId(1);
            $event->addMessage($message);
            return;
        }

        $message = new MessageModel($userModel, 'You are awesome 💖', new \DateTime('-2 hours'));
        $message->setId(2);
        $event->addMessage($message);
    }
}

<?php

/*
 * This file is part of the AdminLTE-Bundle demo.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App\EventSubscriber;

use KevinPapst\AdminLTEBundle\Event\TaskListEvent;
use KevinPapst\AdminLTEBundle\Event\ThemeEvents;
use KevinPapst\AdminLTEBundle\Helper\Constants;
use KevinPapst\AdminLTEBundle\Model\TaskModel;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\Security\Core\Security;

/**
 * Class TaskSubscriber adds user task to the top bar.
 */
class TaskSubscriber implements EventSubscriberInterface
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
            TaskListEvent::class => ['onTasks', 100],
        ];
    }

    /**
     * @param TaskListEvent $event
     */
    public function onTasks(TaskListEvent $event)
    {
        $task = new TaskModel();
        $task
            ->setId(1)
            ->setTitle('My task')
            ->setColor(Constants::COLOR_AQUA)
            ->setProgress(80)
        ;
        $event->addTask($task);

        if (!$this->security->isGranted('IS_AUTHENTICATED_REMEMBERED')) {
            return;
        }

        $task = new TaskModel('Another task', 35, Constants::COLOR_RED);
        $task->setId(2);
        $event->addTask($task);
    }
}

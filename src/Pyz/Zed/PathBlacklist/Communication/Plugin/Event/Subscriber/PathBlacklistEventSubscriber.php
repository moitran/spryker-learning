<?php

namespace Pyz\Zed\PathBlacklist\Communication\Plugin\Event\Subscriber;

use Pyz\Zed\PathBlacklist\Communication\Plugin\Event\Listener\PathBlacklistEventListener;
use Pyz\Zed\PathBlacklist\Communication\Plugin\Event\PathBlacklistEvents;
use Spryker\Zed\Event\Dependency\EventCollectionInterface;
use Spryker\Zed\Event\Dependency\Plugin\EventSubscriberInterface;
use Spryker\Zed\Kernel\Communication\AbstractPlugin;

/**
 * Class PathBlacklistEventSubscriber
 * @package Pyz\Zed\PathBlacklist\Communication\Plugin\Event\Subscriber
 */
class PathBlacklistEventSubscriber extends AbstractPlugin implements EventSubscriberInterface
{
    /**
     * @param EventCollectionInterface $eventCollection
     *
     * @return EventCollectionInterface
     */
    public function getSubscribedEvents(EventCollectionInterface $eventCollection)
    {
        $this->addPathBlacklistEventListener($eventCollection);

        return $eventCollection;
    }

    /**
     * @param EventCollectionInterface $eventCollection
     */
    protected function addPathBlacklistEventListener(EventCollectionInterface $eventCollection)
    {
        $eventCollection->addListenerQueued(
            PathBlacklistEvents::ENTITY_PYZ_PATH_BLACKLIST_CREATE,
            new PathBlacklistEventListener()
        );

        $eventCollection->addListenerQueued(
            PathBlacklistEvents::ENTITY_PYZ_PATH_BLACKLIST_UPDATE,
            new PathBlacklistEventListener()
        );

        $eventCollection->addListenerQueued(
            PathBlacklistEvents::ENTITY_PYZ_PATH_BLACKLIST_DELETE,
            new PathBlacklistEventListener()
        );
    }
}

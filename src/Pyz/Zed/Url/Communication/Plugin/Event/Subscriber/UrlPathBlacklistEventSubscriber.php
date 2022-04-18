<?php

namespace Pyz\Zed\Url\Communication\Plugin\Event\Subscriber;

use Pyz\Zed\Url\Communication\Plugin\Event\Listener\UrlPathBlacklistEventListener;
use Pyz\Zed\PathBlacklist\Communication\Plugin\Event\PathBlacklistEvents;
use Spryker\Zed\Event\Dependency\EventCollectionInterface;
use Spryker\Zed\Event\Dependency\Plugin\EventSubscriberInterface;
use Spryker\Zed\Kernel\Communication\AbstractPlugin;

class UrlPathBlacklistEventSubscriber extends AbstractPlugin implements EventSubscriberInterface
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
            new UrlPathBlacklistEventListener()
        );

        $eventCollection->addListenerQueued(
            PathBlacklistEvents::ENTITY_PYZ_PATH_BLACKLIST_UPDATE,
            new UrlPathBlacklistEventListener()
        );

        $eventCollection->addListenerQueued(
            PathBlacklistEvents::ENTITY_PYZ_PATH_BLACKLIST_DELETE,
            new UrlPathBlacklistEventListener()
        );
    }
}

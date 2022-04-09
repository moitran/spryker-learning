<?php

namespace Pyz\Zed\CustomerProductPriceStorage\Communication\Plugin\Event\Subscriber;

use Pyz\Zed\CustomerProductPrice\Communication\Plugin\Event\Listener\CustomerProductPriceImportEventListener;
use Pyz\Zed\CustomerProductPrice\Dependency\CustomerProductPriceEvents;
use Pyz\Zed\CustomerProductPriceStorage\Communication\Plugin\Event\Listener\CustomerProductPriceStorageEventListener;
use Spryker\Zed\Event\Dependency\EventCollectionInterface;
use Spryker\Zed\Event\Dependency\Plugin\EventSubscriberInterface;
use Spryker\Zed\Kernel\Communication\AbstractPlugin;

/**
 * Class CustomerProductPriceStorageEventSubscriber
 * @package Pyz\Zed\CustomerProductPriceStorage\Communication\Plugin\Event\Subscriber
 */
class CustomerProductPriceStorageEventSubscriber extends AbstractPlugin implements EventSubscriberInterface
{
    /**
     * @param EventCollectionInterface $eventCollection
     *
     * @return EventCollectionInterface
     */
    public function getSubscribedEvents(EventCollectionInterface $eventCollection)
    {
        $eventCollection = $this->addCustomerProductPriceStorageEventListener($eventCollection);

        return $eventCollection;
    }

    /**
     * @param EventCollectionInterface $eventCollection
     *
     * @return EventCollectionInterface
     */
    protected function addCustomerProductPriceStorageEventListener(EventCollectionInterface $eventCollection
    ): EventCollectionInterface {
        $eventCollection->addListenerQueued(
            CustomerProductPriceEvents::ENTITY_PYZ_CUSTOMER_PRODUCT_PRICE_CREATE,
            new CustomerProductPriceStorageEventListener(),
        );

        return $eventCollection;
    }
}

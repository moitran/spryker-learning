<?php

namespace Pyz\Zed\CustomerProductPrice\Communication\Plugin\Event\Subscriber;

use Pyz\Zed\CustomerProductPrice\Communication\Plugin\Event\CustomerProductPriceEvents;
use Pyz\Zed\CustomerProductPrice\Communication\Plugin\Event\Listener\CustomerProductPriceImportEventListener;
use Spryker\Zed\Event\Dependency\EventCollectionInterface;
use Spryker\Zed\Event\Dependency\Plugin\EventSubscriberInterface;
use Spryker\Zed\Kernel\Communication\AbstractPlugin;

/**
 * Class CustomerProductPriceImportEventSubscriber
 * @package Pyz\Zed\CustomerProductPrice\Communication\Plugin\Event\Subscriber
 */
class CustomerProductPriceImportEventSubscriber extends AbstractPlugin implements EventSubscriberInterface
{
    /**
     * @param EventCollectionInterface $eventCollection
     *
     * @return EventCollectionInterface
     */
    public function getSubscribedEvents(EventCollectionInterface $eventCollection)
    {
        $eventCollection = $this->addCustomerProductPriceImportEventListener($eventCollection);

        return $eventCollection;
    }

    /**
     * @param EventCollectionInterface $eventCollection
     *
     * @return EventCollectionInterface
     */
    protected function addCustomerProductPriceImportEventListener(EventCollectionInterface $eventCollection
    ): EventCollectionInterface {
        $eventCollection->addListener(
            CustomerProductPriceEvents::CUSTOMER_PRODUCT_PRICE_IMPORT,
            new CustomerProductPriceImportEventListener()
        );

        return $eventCollection;
    }
}

<?php

/**
 * This file is part of the Spryker Commerce OS.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\CustomerProductPriceStorage\Communication\Plugin\Event\Subscriber;

use Pyz\Zed\CustomerProductPrice\Dependency\CustomerProductPriceEvents;
use Pyz\Zed\CustomerProductPriceStorage\Communication\Plugin\Event\Listener\CustomerProductPriceStorageEventListener;
use Spryker\Zed\Event\Dependency\EventCollectionInterface;
use Spryker\Zed\Event\Dependency\Plugin\EventSubscriberInterface;
use Spryker\Zed\Kernel\Communication\AbstractPlugin;

/**
 * Class CustomerProductPriceStorageEventSubscriber
 *
 * @package Pyz\Zed\CustomerProductPriceStorage\Communication\Plugin\Event\Subscriber
 * @method \Pyz\Zed\CustomerProductPriceStorage\Business\CustomerProductPriceStorageFacadeInterface getFacade()
 */
class CustomerProductPriceStorageEventSubscriber extends AbstractPlugin implements EventSubscriberInterface
{
    /**
     * @param \Spryker\Zed\Event\Dependency\EventCollectionInterface $eventCollection
     *
     * @return \Spryker\Zed\Event\Dependency\EventCollectionInterface
     */
    public function getSubscribedEvents(EventCollectionInterface $eventCollection)
    {
        $eventCollection = $this->addCustomerProductPriceStorageEventListener($eventCollection);

        return $eventCollection;
    }

    /**
     * @param \Spryker\Zed\Event\Dependency\EventCollectionInterface $eventCollection
     *
     * @return \Spryker\Zed\Event\Dependency\EventCollectionInterface
     */
    protected function addCustomerProductPriceStorageEventListener(EventCollectionInterface $eventCollection): EventCollectionInterface
    {
        $eventCollection->addListenerQueued(
            CustomerProductPriceEvents::ENTITY_PYZ_CUSTOMER_PRODUCT_PRICE_CREATE,
            new CustomerProductPriceStorageEventListener(),
        );
        $eventCollection->addListenerQueued(
            CustomerProductPriceEvents::ENTITY_PYZ_CUSTOMER_PRODUCT_PRICE_UPDATE,
            new CustomerProductPriceStorageEventListener(),
        );

        return $eventCollection;
    }
}

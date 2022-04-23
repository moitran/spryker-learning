<?php

/**
 * This file is part of the Spryker Commerce OS.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\CustomerProductPrice\Communication\Plugin\Event\Subscriber;

use Pyz\Zed\CustomerProductPrice\Communication\Plugin\Event\CustomerProductPriceEvents;
use Pyz\Zed\CustomerProductPrice\Communication\Plugin\Event\Listener\CustomerProductPriceImportEventListener;
use Spryker\Zed\Event\Dependency\EventCollectionInterface;
use Spryker\Zed\Event\Dependency\Plugin\EventSubscriberInterface;
use Spryker\Zed\Kernel\Communication\AbstractPlugin;

/**
 * Class CustomerProductPriceImportEventSubscriber
 *
 * @package Pyz\Zed\CustomerProductPrice\Communication\Plugin\Event\Subscriber
 * @method \Pyz\Zed\CustomerProductPrice\Persistence\CustomerProductPriceQueryContainerInterface getQueryContainer()
 * @method \Pyz\Zed\CustomerProductPrice\Business\CustomerProductPriceFacadeInterface getFacade()
 */
class CustomerProductPriceImportEventSubscriber extends AbstractPlugin implements EventSubscriberInterface
{
    /**
     * @param \Spryker\Zed\Event\Dependency\EventCollectionInterface $eventCollection
     *
     * @return \Spryker\Zed\Event\Dependency\EventCollectionInterface
     */
    public function getSubscribedEvents(EventCollectionInterface $eventCollection)
    {
        $eventCollection = $this->addCustomerProductPriceImportEventListener($eventCollection);

        return $eventCollection;
    }

    /**
     * @param \Spryker\Zed\Event\Dependency\EventCollectionInterface $eventCollection
     *
     * @return \Spryker\Zed\Event\Dependency\EventCollectionInterface
     */
    protected function addCustomerProductPriceImportEventListener(EventCollectionInterface $eventCollection): EventCollectionInterface
    {
        $eventCollection->addListenerQueued(
            CustomerProductPriceEvents::CUSTOMER_PRODUCT_PRICE_IMPORT,
            new CustomerProductPriceImportEventListener()
        );

        return $eventCollection;
    }
}

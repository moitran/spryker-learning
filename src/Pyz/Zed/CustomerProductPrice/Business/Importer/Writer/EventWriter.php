<?php

namespace Pyz\Zed\CustomerProductPrice\Business\Importer\Writer;

use Generated\Shared\Transfer\CustomerProductPriceCollectionTransfer;
use Pyz\Zed\CustomerProductPrice\Communication\Plugin\Event\CustomerProductPriceEvents;
use Spryker\Zed\Event\Business\EventFacadeInterface;

/**
 * Interface EventWriterInterface
 * @package Pyz\Zed\CustomerProductPrice\Business\Importer\Writer
 */
class EventWriter implements EventWriterInterface
{
    /**
     * @var EventFacadeInterface
     */
    protected $eventFacade;

    /**
     * EventWriter constructor.
     *
     * @param EventFacadeInterface $eventFacade
     */
    public function __construct(EventFacadeInterface $eventFacade)
    {
        $this->eventFacade = $eventFacade;
    }

    /**
     * @param CustomerProductPriceCollectionTransfer $collectionTransfer
     *
     * @return bool
     */
    public function writeCollection(CustomerProductPriceCollectionTransfer $collectionTransfer): bool
    {
        foreach ($collectionTransfer->getCustomerProducts() as $customerProduct) {
            $this->eventFacade->trigger(CustomerProductPriceEvents::CUSTOMER_PRODUCT_PRICE_IMPORT, $customerProduct);
        }

        return true;
    }
}

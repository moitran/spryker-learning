<?php

namespace Pyz\Zed\CustomerProductPrice\Business\Importer\Writer;

use Generated\Shared\Transfer\CustomerProductPriceCollectionTransfer;
use Generated\Shared\Transfer\CustomerProductTransfer;
use Pyz\Zed\CustomerProductPrice\Communication\Plugin\Event\CustomerProductPriceEvents;
use Spryker\Zed\Event\Business\EventFacadeInterface;

/**
 * Interface EventWriterInterface
 * @package Pyz\Zed\CustomerProductPrice\Business\Importer\Writer
 */
class EventWriter implements WriterInterface
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
        foreach ($collectionTransfer->getCustomerProducts() as $customerProductTransfer) {
            $this->writeOne($customerProductTransfer);
        }

        return true;
    }

    /**
     * @param CustomerProductTransfer $customerProductTransfer
     *
     * @return bool
     */
    public function writeOne(CustomerProductTransfer $customerProductTransfer): bool
    {
        $this->eventFacade->trigger(
            CustomerProductPriceEvents::CUSTOMER_PRODUCT_PRICE_IMPORT,
            $customerProductTransfer
        );

        return true;
    }
}

<?php

/**
 * This file is part of the Spryker Commerce OS.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\CustomerProductPrice\Business\Importer\Writer;

use Generated\Shared\Transfer\CustomerProductPriceCollectionTransfer;
use Generated\Shared\Transfer\CustomerProductTransfer;
use Pyz\Zed\CustomerProductPrice\Communication\Plugin\Event\CustomerProductPriceEvents;
use Spryker\Zed\Event\Business\EventFacadeInterface;

/**
 * Interface EventWriterInterface
 *
 * @package Pyz\Zed\CustomerProductPrice\Business\Importer\Writer
 */
class EventWriter implements WriterInterface
{
    /**
     * @var \Spryker\Zed\Event\Business\EventFacadeInterface
     */
    protected $eventFacade;

    /**
     * @param \Spryker\Zed\Event\Business\EventFacadeInterface $eventFacade
     */
    public function __construct(EventFacadeInterface $eventFacade)
    {
        $this->eventFacade = $eventFacade;
    }

    /**
     * @param \Generated\Shared\Transfer\CustomerProductPriceCollectionTransfer $collectionTransfer
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
     * @param \Generated\Shared\Transfer\CustomerProductTransfer $customerProductTransfer
     *
     * @return void
     */
    public function writeOne(CustomerProductTransfer $customerProductTransfer)
    {
        $this->eventFacade->trigger(
            CustomerProductPriceEvents::CUSTOMER_PRODUCT_PRICE_IMPORT,
            $customerProductTransfer
        );
    }
}

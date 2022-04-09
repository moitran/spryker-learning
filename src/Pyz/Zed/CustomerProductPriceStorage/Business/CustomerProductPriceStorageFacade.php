<?php

namespace Pyz\Zed\CustomerProductPriceStorage\Business;

use Generated\Shared\Transfer\EventEntityTransfer;
use Spryker\Zed\Kernel\Business\AbstractFacade;

/**
 * Class CustomerProductPriceStorageFacade
 * @package Pyz\Zed\CustomerProductPriceStorage\Business
 * @method CustomerProductPriceStorageBusinessFactory getFactory()
 */
class CustomerProductPriceStorageFacade extends AbstractFacade implements CustomerProductPriceStorageFacadeInterface
{
    /**
     * @param EventEntityTransfer $transfer
     */
    public function publish(EventEntityTransfer $transfer): void
    {
        $this->getFactory()->createStoragePublisher()->publish($transfer);
    }
}

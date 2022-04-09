<?php

namespace Pyz\Zed\CustomerProductPriceStorage\Business;

use Spryker\Shared\Kernel\Transfer\TransferInterface;
use Spryker\Zed\Kernel\Business\AbstractFacade;

/**
 * Class CustomerProductPriceStorageFacade
 * @package Pyz\Zed\CustomerProductPriceStorage\Business
 * @method CustomerProductPriceStorageBusinessFactory getFactory()
 */
class CustomerProductPriceStorageFacade extends AbstractFacade implements CustomerProductPriceStorageFacadeInterface
{
    /**
     * @param TransferInterface $transfer
     */
    public function publish(TransferInterface $transfer): void
    {
        $this->getFactory()->createStorageWriter()->publish($transfer);
    }
}

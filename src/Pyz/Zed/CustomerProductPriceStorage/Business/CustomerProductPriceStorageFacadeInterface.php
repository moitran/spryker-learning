<?php

namespace Pyz\Zed\CustomerProductPriceStorage\Business;

use Generated\Shared\Transfer\EventEntityTransfer;

/**
 * Class CustomerProductPriceStorageBusinessFactory
 * @package Pyz\Zed\CustomerProductPriceStorage\Business
 */
interface CustomerProductPriceStorageFacadeInterface
{
    /**
     * @param EventEntityTransfer $transfer
     */
    public function publish(EventEntityTransfer $transfer): void;
}

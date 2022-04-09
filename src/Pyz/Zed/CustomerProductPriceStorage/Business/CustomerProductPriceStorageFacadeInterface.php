<?php

namespace Pyz\Zed\CustomerProductPriceStorage\Business;

use Spryker\Shared\Kernel\Transfer\TransferInterface;

/**
 * Class CustomerProductPriceStorageBusinessFactory
 * @package Pyz\Zed\CustomerProductPriceStorage\Business
 */
interface CustomerProductPriceStorageFacadeInterface
{
    /**
     * @param TransferInterface $transfer
     */
    public function publish(TransferInterface $transfer): void;
}

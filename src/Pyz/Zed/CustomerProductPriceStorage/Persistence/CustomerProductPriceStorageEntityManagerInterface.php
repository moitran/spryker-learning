<?php

namespace Pyz\Zed\CustomerProductPriceStorage\Persistence;

use Generated\Shared\Transfer\CustomerProductPriceStorageTransfer;

/**
 * Interface CustomerProductPriceStorageEntityManagerInterface
 * @package Pyz\Zed\CustomerProductPriceStorage\Persistence
 */
interface CustomerProductPriceStorageEntityManagerInterface
{
    /**
     * @param CustomerProductPriceStorageTransfer $customerProductPriceStorageTransfer
     *
     * @return mixed
     */
    public function saveCustomerProductPriceStorage(CustomerProductPriceStorageTransfer $customerProductPriceStorageTransfer);
}

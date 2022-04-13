<?php

namespace Pyz\Zed\CustomerProductPriceStorage\Persistence;

use Generated\Shared\Transfer\CustomerProductTransfer;

/**
 * Interface CustomerProductPriceStorageRepositoryInterface
 * @package Pyz\Zed\CustomerProductPriceStorage\Persistence
 */
interface CustomerProductPriceStorageRepositoryInterface
{
    /**
     * @param int $id
     *
     * @return CustomerProductTransfer
     */
    public function getCustomerProductPriceById(int $id): CustomerProductTransfer;
}

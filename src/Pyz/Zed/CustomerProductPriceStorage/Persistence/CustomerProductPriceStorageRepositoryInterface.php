<?php

namespace Pyz\Zed\CustomerProductPriceStorage\Persistence;

use Orm\Zed\CustomerProductPrice\Persistence\PyzCustomerProductPrice;

/**
 * Interface CustomerProductPriceStorageRepositoryInterface
 * @package Pyz\Zed\CustomerProductPriceStorage\Persistence
 */
interface CustomerProductPriceStorageRepositoryInterface
{
    /**
     * @param int $id
     *
     * @return PyzCustomerProductPrice
     */
    public function getCustomerProductPriceById(int $id): PyzCustomerProductPrice;
}

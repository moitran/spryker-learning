<?php


namespace Pyz\Zed\CustomerProductPrice\Persistence;

use Orm\Zed\CustomerProductPrice\Persistence\PyzCustomerProductPriceQuery;

/**
 * Class CustomerProductPriceQueryContainerInterface
 * @package Pyz\Zed\CustomerProductPrice\Persistence
 */
interface CustomerProductPriceQueryContainerInterface
{
    public function getCustomerProductPriceQuery(): PyzCustomerProductPriceQuery;
}

<?php


namespace Pyz\Zed\CustomerProductPrice\Persistence;

use Orm\Zed\CustomerProductPrice\Persistence\PyzCustomerProductPriceQuery;
use Orm\Zed\CustomerProductPrice\Persistence\PyzCustomerProductQuery;

/**
 * Class CustomerProductPriceQueryContainerInterface
 * @package Pyz\Zed\CustomerProductPrice\Persistence
 */
interface CustomerProductPriceQueryContainerInterface
{
    /**
     * @return PyzCustomerProductPriceQuery
     */
    public function getCustomerProductPriceQuery(): PyzCustomerProductPriceQuery;

    /**
     * @return PyzCustomerProductQuery
     */
    public function getCustomerProductQuery(): PyzCustomerProductQuery;
}

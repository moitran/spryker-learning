<?php

namespace Pyz\Zed\CustomerProductPrice\Persistence;

use Orm\Zed\CustomerProductPrice\Persistence\PyzCustomerProductPriceQuery;
use Spryker\Zed\Kernel\Persistence\AbstractPersistenceFactory;

/**
 * Class CustomerProductPricePersistenceFactory
 * @package Pyz\Zed\CustomerProductPrice\Persistence
 */
class CustomerProductPricePersistenceFactory extends AbstractPersistenceFactory
{
    /**
     * @return PyzCustomerProductPriceQuery
     */
    public function createCustomerProductPriceQuery(): PyzCustomerProductPriceQuery
    {
        return PyzCustomerProductPriceQuery::create();
    }
}

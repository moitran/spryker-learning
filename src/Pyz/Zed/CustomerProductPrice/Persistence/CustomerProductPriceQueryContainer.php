<?php

namespace Pyz\Zed\CustomerProductPrice\Persistence;

use Orm\Zed\CustomerProductPrice\Persistence\PyzCustomerProductPriceQuery;
use Spryker\Zed\Kernel\Persistence\AbstractQueryContainer;

/**
 * Class CustomerProductPriceQueryContainerInterface
 * @package Pyz\Zed\CustomerProductPrice\Persistence
 * @method CustomerProductPricePersistenceFactory getFactory()
 */
class CustomerProductPriceQueryContainer extends AbstractQueryContainer implements CustomerProductPriceQueryContainerInterface
{
    /**
     * @return PyzCustomerProductPriceQuery
     */
    public function getCustomerProductPriceQuery(): PyzCustomerProductPriceQuery
    {
        return $this->getFactory()->createCustomerProductPriceQuery();
    }
}

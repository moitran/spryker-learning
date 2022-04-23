<?php

/**
 * This file is part of the Spryker Commerce OS.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\CustomerProductPrice\Persistence;

use Orm\Zed\CustomerProductPrice\Persistence\PyzCustomerProductPriceQuery;
use Orm\Zed\CustomerProductPrice\Persistence\PyzCustomerProductQuery;
use Spryker\Zed\Kernel\Persistence\AbstractPersistenceFactory;

/**
 * Class CustomerProductPricePersistenceFactory
 *
 * @package Pyz\Zed\CustomerProductPrice\Persistence
 * @method \Pyz\Zed\CustomerProductPrice\Persistence\CustomerProductPriceEntityManagerInterface getEntityManager()
 * @method \Pyz\Zed\CustomerProductPrice\Persistence\CustomerProductPriceQueryContainerInterface getQueryContainer()
 * @method \Pyz\Zed\CustomerProductPrice\Persistence\CustomerProductPriceRepositoryInterface getRepository()
 */
class CustomerProductPricePersistenceFactory extends AbstractPersistenceFactory
{
    /**
     * @return \Orm\Zed\CustomerProductPrice\Persistence\PyzCustomerProductPriceQuery
     */
    public function createCustomerProductPriceQuery(): PyzCustomerProductPriceQuery
    {
        return PyzCustomerProductPriceQuery::create();
    }

    /**
     * @return \Orm\Zed\CustomerProductPrice\Persistence\PyzCustomerProductQuery
     */
    public function createCustomerProductQuery(): PyzCustomerProductQuery
    {
        return PyzCustomerProductQuery::create();
    }
}

<?php

/**
 * This file is part of the Spryker Commerce OS.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\CustomerProductPriceStorage\Persistence;

use Orm\Zed\CustomerProductPriceStorage\Persistence\PyzCustomerProductPriceStorageQuery;
use Pyz\Zed\CustomerProductPriceStorage\CustomerProductPriceStorageDependencyProvider;
use Spryker\Zed\Kernel\Persistence\AbstractPersistenceFactory;

/**
 * Class CustomerProductPriceStoragePersistenceFactory
 *
 * @package Pyz\Zed\CustomerProductPriceStorage\Persistence
 * @method \Pyz\Zed\CustomerProductPriceStorage\Persistence\CustomerProductPriceStorageEntityManagerInterface getEntityManager()
 * @method \Pyz\Zed\CustomerProductPriceStorage\Persistence\CustomerProductPriceStorageRepositoryInterface getRepository()
 */
class CustomerProductPriceStoragePersistenceFactory extends AbstractPersistenceFactory
{
    /**
     * @return \Pyz\Zed\CustomerProductPrice\Persistence\CustomerProductPriceQueryContainer
     */
    public function getCustomerProductPriceQueryContainer()
    {
        return $this->getProvidedDependency(CustomerProductPriceStorageDependencyProvider::CUSTOMER_PRODUCT_PRICE_QUERY_CONTAINER);
    }

    /**
     * @return \Orm\Zed\CustomerProductPriceStorage\Persistence\PyzCustomerProductPriceStorageQuery
     */
    public function createCustomerProductPriceStorageQuery(): PyzCustomerProductPriceStorageQuery
    {
        return PyzCustomerProductPriceStorageQuery::create();
    }
}

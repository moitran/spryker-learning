<?php

/**
 * This file is part of the Spryker Commerce OS.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\CustomerProductPriceSearch\Persistence;

use Pyz\Zed\CustomerProductPrice\Persistence\CustomerProductPriceQueryContainerInterface;
use Pyz\Zed\CustomerProductPriceSearch\CustomerProductPriceSearchDependencyProvider;
use Spryker\Zed\Kernel\Persistence\AbstractPersistenceFactory;
use Spryker\Zed\Product\Persistence\ProductQueryContainerInterface;

/**
 * Class CustomerProductPriceSearchPersistenceFactory
 *
 * @package Pyz\Zed\CustomerProductPriceSearch\Persistence
 * @method \Pyz\Zed\CustomerProductPriceSearch\Persistence\CustomerProductPriceSearchRepositoryInterface getRepository()
 */
class CustomerProductPriceSearchPersistenceFactory extends AbstractPersistenceFactory
{
    /**
     * @return \Spryker\Zed\Product\Persistence\ProductQueryContainerInterface
     */
    public function getProductQueryContainer(): ProductQueryContainerInterface
    {
        return $this->getProvidedDependency(CustomerProductPriceSearchDependencyProvider::QUERY_CONTAINER_PRODUCT);
    }

    /**
     * @return \Pyz\Zed\CustomerProductPrice\Persistence\CustomerProductPriceQueryContainerInterface
     */
    public function getCustomerProductPriceQueryContainer(): CustomerProductPriceQueryContainerInterface
    {
        return $this->getProvidedDependency(CustomerProductPriceSearchDependencyProvider::QUERY_CONTAINER_CUSTOMER_PRODUCT_PRICE);
    }
}

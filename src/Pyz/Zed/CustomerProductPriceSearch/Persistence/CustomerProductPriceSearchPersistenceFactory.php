<?php

namespace Pyz\Zed\CustomerProductPriceSearch\Persistence;

use Pyz\Zed\CustomerProductPrice\Persistence\CustomerProductPriceQueryContainerInterface;
use Pyz\Zed\CustomerProductPriceSearch\CustomerProductPriceSearchDependencyProvider;
use Spryker\Zed\Kernel\Persistence\AbstractPersistenceFactory;
use Spryker\Zed\Product\Persistence\ProductQueryContainerInterface;

/**
 * Class CustomerProductPriceSearchPersistenceFactory
 * @package Pyz\Zed\CustomerProductPriceSearch\Persistence
 */
class CustomerProductPriceSearchPersistenceFactory extends AbstractPersistenceFactory
{
    /**
     * @return ProductQueryContainerInterface
     */
    public function getProductQueryContainer(): ProductQueryContainerInterface
    {
        return $this->getProvidedDependency(CustomerProductPriceSearchDependencyProvider::QUERY_CONTAINER_PRODUCT);
    }

    /**
     * @return CustomerProductPriceQueryContainerInterface
     */
    public function getCustomerProductPriceQueryContainer(): CustomerProductPriceQueryContainerInterface
    {
        return $this->getProvidedDependency(CustomerProductPriceSearchDependencyProvider::QUERY_CONTAINER_CUSTOMER_PRODUCT_PRICE);
    }
}

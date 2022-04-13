<?php

namespace Pyz\Zed\CustomerProductPriceSearch;

use Spryker\Zed\Kernel\AbstractBundleDependencyProvider;
use Spryker\Zed\Kernel\Container;

/**
 * Class CustomerProductPriceSearchDependencyProvider
 * @package Pyz\Zed\CustomerProductPriceSearch
 */
class CustomerProductPriceSearchDependencyProvider extends AbstractBundleDependencyProvider
{
    public const QUERY_CONTAINER_PRODUCT = 'product query container';
    public const QUERY_CONTAINER_CUSTOMER_PRODUCT_PRICE = 'customer product price query container';

    /**
     * @param Container $container
     *
     * @return Container
     */
    public function providePersistenceLayerDependencies(Container $container)
    {
        $container = parent::providePersistenceLayerDependencies($container);

        $this->addProductQueryContainer($container);
        $this->addCustomerProductPriceQueryContainer($container);

        return $container;
    }

    protected function addProductQueryContainer(Container $container)
    {
        $container->set(self::QUERY_CONTAINER_PRODUCT, $container->getLocator()->product()->queryContainer());
    }

    protected function addCustomerProductPriceQueryContainer(Container $container)
    {
        $container->set(
            self::QUERY_CONTAINER_CUSTOMER_PRODUCT_PRICE,
            $container->getLocator()->customerProductPrice()->queryContainer()
        );
    }
}

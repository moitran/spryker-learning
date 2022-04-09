<?php

namespace Pyz\Zed\CustomerProductPriceStorage;

use Spryker\Zed\Kernel\AbstractBundleDependencyProvider;
use Spryker\Zed\Kernel\Container;

/**
 * Class CustomerProductPriceStorageDependencyProvider
 * @package Pyz\Zed\CustomerProductPriceStorage
 */
class CustomerProductPriceStorageDependencyProvider extends AbstractBundleDependencyProvider
{
    public const CUSTOMER_PRODUCT_PRICE_QUERY_CONTAINER = 'customer product price query container';

    /**
     * @param Container $container
     *
     * @return Container
     */
    public function providePersistenceLayerDependencies(Container $container)
    {
        $container = parent::providePersistenceLayerDependencies($container);
        $this->addCustomerProductPriceQueryContainer($container);

        return $container;
    }

    /**
     * @param Container $container
     *
     * @throws \Spryker\Service\Container\Exception\FrozenServiceException
     */
    protected function addCustomerProductPriceQueryContainer(Container $container)
    {
        $container->set(
            static::CUSTOMER_PRODUCT_PRICE_QUERY_CONTAINER,
            $container->getLocator()->customerProductPrice()->queryContainer()
        );
    }
}

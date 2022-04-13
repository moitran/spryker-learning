<?php

namespace Pyz\Client\CustomerProductPriceStorage;

use Spryker\Client\Kernel\AbstractDependencyProvider;
use Spryker\Client\Kernel\Container;

/**
 * Class CustomerProductPriceStorageDependencyProvider
 * @package Spryker\Client\ProductStorage
 */
class CustomerProductPriceStorageDependencyProvider extends AbstractDependencyProvider
{
    public const CLIENT_STORAGE = 'storage client';
    public const CLIENT_CUSTOMER = 'customer client';

    /**
     * @param \Spryker\Client\Kernel\Container $container
     *
     * @return \Spryker\Client\Kernel\Container
     */
    public function provideServiceLayerDependencies(Container $container)
    {
        $container = $this->addStorageClient($container);
        $container = $this->addCustomerClient($container);

        return $container;
    }

    /**
     * @param Container $container
     *
     * @return Container
     * @throws \Spryker\Service\Container\Exception\FrozenServiceException
     */
    protected function addStorageClient(Container $container)
    {
        $container->set(static::CLIENT_STORAGE, $container->getLocator()->storage()->client());

        return $container;
    }

    /**
     * @param Container $container
     *
     * @return Container
     * @throws \Spryker\Service\Container\Exception\FrozenServiceException
     */
    protected function addCustomerClient(Container $container)
    {
        $container->set(static::CLIENT_CUSTOMER, $container->getLocator()->customer()->client());

        return $container;
    }
}

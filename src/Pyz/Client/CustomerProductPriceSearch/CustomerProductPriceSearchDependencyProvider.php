<?php

namespace Pyz\Client\CustomerProductPriceSearch;

use Spryker\Client\Kernel\AbstractDependencyProvider;
use Spryker\Client\Kernel\Container;

/**
 * Class CustomerProductPriceSearchDependencyProvider
 * @package Pyz\Client\CustomerProductPriceSearch
 */
class CustomerProductPriceSearchDependencyProvider extends AbstractDependencyProvider
{
    public const CLIENT_CUSTOMER = 'customer client';

    /**
     * @param Container $container
     *
     * @return Container
     * @throws \Spryker\Service\Container\Exception\FrozenServiceException
     */
    public function provideServiceLayerDependencies(Container $container)
    {
        $this->addCustomerClient($container);

        return $container;
    }

    /**
     * @param Container $container
     *
     * @throws \Spryker\Service\Container\Exception\FrozenServiceException
     */
    protected function addCustomerClient(Container $container)
    {
        $container->set(static::CLIENT_CUSTOMER, $container->getLocator()->customer()->client());
    }
}

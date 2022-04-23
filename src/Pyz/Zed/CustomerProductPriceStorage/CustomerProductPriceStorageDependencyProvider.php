<?php

/**
 * This file is part of the Spryker Commerce OS.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\CustomerProductPriceStorage;

use Spryker\Zed\Kernel\AbstractBundleDependencyProvider;
use Spryker\Zed\Kernel\Container;

/**
 * Class CustomerProductPriceStorageDependencyProvider
 *
 * @package Pyz\Zed\CustomerProductPriceStorage
 */
class CustomerProductPriceStorageDependencyProvider extends AbstractBundleDependencyProvider
{
    public const CUSTOMER_PRODUCT_PRICE_QUERY_CONTAINER = 'customer product price query container';

    /**
     * @param \Spryker\Zed\Kernel\Container $container
     *
     * @return \Spryker\Zed\Kernel\Container
     */
    public function providePersistenceLayerDependencies(Container $container)
    {
        $container = parent::providePersistenceLayerDependencies($container);
        $this->addCustomerProductPriceQueryContainer($container);

        return $container;
    }

    /**
     * @param \Spryker\Zed\Kernel\Container $container
     *
     * @return void
     */
    protected function addCustomerProductPriceQueryContainer(Container $container)
    {
        $container->set(
            static::CUSTOMER_PRODUCT_PRICE_QUERY_CONTAINER,
            $container->getLocator()->customerProductPrice()->queryContainer()
        );
    }
}

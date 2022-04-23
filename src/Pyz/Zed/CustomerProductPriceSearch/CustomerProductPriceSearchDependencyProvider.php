<?php

/**
 * This file is part of the Spryker Commerce OS.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\CustomerProductPriceSearch;

use Spryker\Zed\Kernel\AbstractBundleDependencyProvider;
use Spryker\Zed\Kernel\Container;

/**
 * Class CustomerProductPriceSearchDependencyProvider
 *
 * @package Pyz\Zed\CustomerProductPriceSearch
 */
class CustomerProductPriceSearchDependencyProvider extends AbstractBundleDependencyProvider
{
    public const QUERY_CONTAINER_PRODUCT = 'product query container';
    public const QUERY_CONTAINER_CUSTOMER_PRODUCT_PRICE = 'customer product price query container';

    /**
     * @param \Spryker\Zed\Kernel\Container $container
     *
     * @return \Spryker\Zed\Kernel\Container
     */
    public function providePersistenceLayerDependencies(Container $container)
    {
        $container = parent::providePersistenceLayerDependencies($container);

        $this->addProductQueryContainer($container);
        $this->addCustomerProductPriceQueryContainer($container);

        return $container;
    }

    /**
     * @return void
     */
    protected function addProductQueryContainer(Container $container)
    {
        $container->set(self::QUERY_CONTAINER_PRODUCT, $container->getLocator()->product()->queryContainer());
    }

    /**
     * @return void
     */
    protected function addCustomerProductPriceQueryContainer(Container $container)
    {
        $container->set(
            self::QUERY_CONTAINER_CUSTOMER_PRODUCT_PRICE,
            $container->getLocator()->customerProductPrice()->queryContainer()
        );
    }
}

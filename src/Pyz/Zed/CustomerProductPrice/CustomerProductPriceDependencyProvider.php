<?php

/**
 * This file is part of the Spryker Commerce OS.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\CustomerProductPrice;

use Spryker\Zed\Kernel\AbstractBundleDependencyProvider;
use Spryker\Zed\Kernel\Container;

/**
 * Class CustomerProductPriceDependencyProvider
 *
 * @package Pyz\Zed\CustomerProductPrice
 */
class CustomerProductPriceDependencyProvider extends AbstractBundleDependencyProvider
{
    public const FACADE_EVENT = 'event facade';
    public const FACADE_MONEY = 'money facade';

    /**
     * @param \Spryker\Zed\Kernel\Container $container
     *
     * @return \Spryker\Zed\Kernel\Container
     */
    public function provideBusinessLayerDependencies(Container $container)
    {
        $container = parent::provideBusinessLayerDependencies($container);
        $this->addEventFacade($container);
        $this->addMoneyFacade($container);

        return $container;
    }

    /**
     * @param \Spryker\Zed\Kernel\Container $container
     *
     * @return void
     */
    protected function addEventFacade(Container $container)
    {
        $container->set(self::FACADE_EVENT, $container->getLocator()->event()->facade());
    }

    /**
     * @param \Spryker\Zed\Kernel\Container $container
     *
     * @return void
     */
    protected function addMoneyFacade(Container $container)
    {
        $container->set(self::FACADE_MONEY, $container->getLocator()->money()->facade());
    }
}

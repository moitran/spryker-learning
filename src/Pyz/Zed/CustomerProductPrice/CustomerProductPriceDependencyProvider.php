<?php

namespace Pyz\Zed\CustomerProductPrice;

use Spryker\Zed\Kernel\AbstractBundleDependencyProvider;
use Spryker\Zed\Kernel\Container;

/**
 * Class CustomerProductPriceDependencyProvider
 * @package Pyz\Zed\CustomerProductPrice
 */
class CustomerProductPriceDependencyProvider extends AbstractBundleDependencyProvider
{
    public const FACADE_EVENT = 'event facade';

    /**
     * @param Container $container
     *
     * @return Container
     * @throws \Spryker\Service\Container\Exception\FrozenServiceException
     */
    public function provideBusinessLayerDependencies(Container $container)
    {
        $container = parent::provideBusinessLayerDependencies($container);
        $this->addEventFacade($container);

        return $container;
    }

    /**
     * @param Container $container
     *
     * @throws \Spryker\Service\Container\Exception\FrozenServiceException
     */
    protected function addEventFacade(Container $container)
    {
        $container->set(self::FACADE_EVENT, $container->getLocator()->event()->facade());
    }
}

<?php

namespace Pyz\Zed\PathBlacklist;

use Spryker\Zed\Kernel\AbstractBundleDependencyProvider;
use Spryker\Zed\Kernel\Container;

/**
 * Class PathBlacklistDependencyProvider
 * @package Pyz\Zed\PathBlacklist
 */
class PathBlacklistDependencyProvider extends AbstractBundleDependencyProvider
{
    public const FACADE_EVENT = 'event facade';
    public const QUERY_CONTAINER_URL = 'url query container';

    /**
     * @param Container $container
     *
     * @return Container
     * @throws \Spryker\Service\Container\Exception\FrozenServiceException
     */
    public function provideBusinessLayerDependencies(Container $container)
    {
        $this->addEventFacade($container);

        return $container;
    }

    /**
     * @param Container $container
     *
     * @return Container
     * @throws \Spryker\Service\Container\Exception\FrozenServiceException
     */
    public function providePersistenceLayerDependencies(Container $container)
    {
        $this->addUrlQueryContainer($container);

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

    /**
     * @param Container $container
     *
     * @throws \Spryker\Service\Container\Exception\FrozenServiceException
     */
    protected function addUrlQueryContainer(Container $container)
    {
        $container->set(self::QUERY_CONTAINER_URL, $container->getLocator()->url()->queryContainer());
    }
}

<?php

namespace Pyz\Zed\PathBlacklistGui;

use Orm\Zed\PathBlacklist\Persistence\PyzPathBlacklistQuery;
use Spryker\Zed\Kernel\AbstractBundleDependencyProvider;
use Spryker\Zed\Kernel\Container;

/**
 * Class PathBlacklistGuiDependencyProvider
 * @package Pyz\Zed\PathBlacklistGui
 */
class PathBlacklistGuiDependencyProvider extends AbstractBundleDependencyProvider
{
    public const PROPEL_QUERY_PATH_BLACKLIST = 'propel query path blacklist';
    public const FACADE_PATH_BLACKLIST = 'path blacklist facade';

    /**
     * @param Container $container
     *
     * @return Container
     * @throws \Spryker\Service\Container\Exception\ContainerException
     * @throws \Spryker\Service\Container\Exception\FrozenServiceException
     */
    public function provideCommunicationLayerDependencies(Container $container)
    {
        $this->addPathBlacklistPropelQuery($container);
        $container = $this->addPathBlacklistFacade($container);

        return $container;
    }

    /**
     * @param Container $container
     *
     * @return Container
     * @throws \Spryker\Service\Container\Exception\ContainerException
     * @throws \Spryker\Service\Container\Exception\FrozenServiceException
     */
    protected function addPathBlacklistPropelQuery(Container $container): Container
    {
        $container->set(static::PROPEL_QUERY_PATH_BLACKLIST, $container->factory(function () {
            return PyzPathBlacklistQuery::create();
        }));

        return $container;
    }

    /**
     * @param Container $container
     *
     * @return Container
     * @throws \Spryker\Service\Container\Exception\ContainerException
     * @throws \Spryker\Service\Container\Exception\FrozenServiceException
     */
    protected function addPathBlacklistFacade(Container $container): Container
    {
        $container->set(static::FACADE_PATH_BLACKLIST, $container->getLocator()->pathBlacklist()->facade());

        return $container;
    }
}

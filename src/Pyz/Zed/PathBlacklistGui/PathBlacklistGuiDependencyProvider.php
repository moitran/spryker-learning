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
    public const FACADE_URL = 'url facade';

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
        $this->addPathBlacklistFacade($container);
        $this->addUrlFacade($container);

        return $container;
    }

    /**
     * @param \Spryker\Zed\Kernel\Container $container
     *
     * @return void
     * @throws \Spryker\Service\Container\Exception\ContainerException
     * @throws \Spryker\Service\Container\Exception\FrozenServiceException
     */
    protected function addPathBlacklistPropelQuery(Container $container)
    {
        $container->set(static::PROPEL_QUERY_PATH_BLACKLIST, $container->factory(function () {
            return PyzPathBlacklistQuery::create();
        }));
    }

    /**
     * @param \Spryker\Zed\Kernel\Container $container
     *
     * @return \Spryker\Zed\Kernel\Container
     * @throws \Spryker\Service\Container\Exception\FrozenServiceException
     */
    protected function addPathBlacklistFacade(Container $container)
    {
        $container->set(static::FACADE_PATH_BLACKLIST, $container->getLocator()->pathBlacklist()->facade());
    }

    /**
     * @param \Spryker\Zed\Kernel\Container $container
     *
     * @return \Spryker\Zed\Kernel\Container
     * @throws \Spryker\Service\Container\Exception\FrozenServiceException
     */
    protected function addUrlFacade(Container $container)
    {
        $container->set(static::FACADE_URL, $container->getLocator()->url()->facade());
    }
}

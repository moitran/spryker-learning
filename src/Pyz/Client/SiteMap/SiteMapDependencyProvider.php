<?php

namespace Pyz\Client\SiteMap;

use Spryker\Client\Kernel\AbstractDependencyProvider;
use Spryker\Client\Kernel\Container;

/**
 * Class SiteMapDependencyProvider
 * @package Pyz\Client\SiteMap
 */
class SiteMapDependencyProvider extends AbstractDependencyProvider
{
    public const CLIENT_STORAGE = 'storage client';

    /**
     * @param Container $container
     *
     * @return Container
     * @throws \Spryker\Service\Container\Exception\FrozenServiceException
     */
    public function provideServiceLayerDependencies(Container $container)
    {
        $this->addStorageClient($container);

        return $container;
    }

    /**
     * @param Container $container
     *
     * @throws \Spryker\Service\Container\Exception\FrozenServiceException
     */
    protected function addStorageClient(Container $container)
    {
        $container->set(static::CLIENT_STORAGE, $container->getLocator()->storage()->client());
    }
}

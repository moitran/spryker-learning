<?php

namespace Pyz\Client\PathBlacklist;

use Spryker\Client\Kernel\AbstractDependencyProvider;
use Spryker\Client\Kernel\Container;

/**
 * Class PathBlacklistDependencyProvider
 * @package Pyz\Client\PathBlacklist
 */
class PathBlacklistDependencyProvider extends AbstractDependencyProvider
{
    public const CLIENT_URL_STORAGE = 'url storage client';

    /**
     * @param Container $container
     *
     * @return Container
     * @throws \Spryker\Service\Container\Exception\FrozenServiceException
     */
    public function provideServiceLayerDependencies(Container $container)
    {
        $this->addUrlStorageClient($container);

        return $container;
    }

    /**
     * @param Container $container
     *
     * @throws \Spryker\Service\Container\Exception\FrozenServiceException
     */
    protected function addUrlStorageClient(Container $container)
    {
        $container->set(static::CLIENT_URL_STORAGE, $container->getLocator()->urlStorage()->client());
    }
}

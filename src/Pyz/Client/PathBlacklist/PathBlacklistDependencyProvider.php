<?php

/**
 * This file is part of the Spryker Commerce OS.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Client\PathBlacklist;

use Spryker\Client\Kernel\AbstractDependencyProvider;
use Spryker\Client\Kernel\Container;

/**
 * Class PathBlacklistDependencyProvider
 *
 * @package Pyz\Client\PathBlacklist
 */
class PathBlacklistDependencyProvider extends AbstractDependencyProvider
{
    public const CLIENT_URL_STORAGE = 'url storage client';

    /**
     * @param \Spryker\Client\Kernel\Container $container
     *
     * @return \Spryker\Client\Kernel\Container
     */
    public function provideServiceLayerDependencies(Container $container)
    {
        $this->addUrlStorageClient($container);

        return $container;
    }

    /**
     * @param \Spryker\Client\Kernel\Container $container
     *
     * @return void
     */
    protected function addUrlStorageClient(Container $container)
    {
        $container->set(static::CLIENT_URL_STORAGE, $container->getLocator()->urlStorage()->client());
    }
}

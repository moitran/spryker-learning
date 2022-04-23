<?php

/**
 * This file is part of the Spryker Commerce OS.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Client\SiteMap;

use Spryker\Client\Kernel\AbstractDependencyProvider;
use Spryker\Client\Kernel\Container;

/**
 * Class SiteMapDependencyProvider
 *
 * @package Pyz\Client\SiteMap
 */
class SiteMapDependencyProvider extends AbstractDependencyProvider
{
    public const CLIENT_STORAGE = 'storage client';

    /**
     * @param \Spryker\Client\Kernel\Container $container
     *
     * @return \Spryker\Client\Kernel\Container
     */
    public function provideServiceLayerDependencies(Container $container)
    {
        $this->addStorageClient($container);

        return $container;
    }

    /**
     * @param \Spryker\Client\Kernel\Container $container
     *
     * @return void
     */
    protected function addStorageClient(Container $container)
    {
        $container->set(static::CLIENT_STORAGE, $container->getLocator()->storage()->client());
    }
}

<?php

/**
 * This file is part of the Spryker Commerce OS.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\PathBlacklist;

use Spryker\Zed\Kernel\AbstractBundleDependencyProvider;
use Spryker\Zed\Kernel\Container;

/**
 * Class PathBlacklistDependencyProvider
 *
 * @package Pyz\Zed\PathBlacklist
 */
class PathBlacklistDependencyProvider extends AbstractBundleDependencyProvider
{
    public const FACADE_URL = 'url facade';

    /**
     * @param \Spryker\Zed\Kernel\Container $container
     *
     * @return \Spryker\Zed\Kernel\Container
     */
    public function provideBusinessLayerDependencies(Container $container)
    {
        $this->addUrlFacade($container);

        return $container;
    }

    /**
     * @param \Spryker\Zed\Kernel\Container $container
     *
     * @return void
     */
    protected function addUrlFacade(Container $container)
    {
        $container->set(self::FACADE_URL, $container->getLocator()->url()->facade());
    }
}

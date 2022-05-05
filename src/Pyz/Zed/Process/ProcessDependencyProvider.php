<?php

/**
 * This file is part of the Spryker Commerce OS.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\Process;

use Pyz\Zed\CustomerProductPriceImportMiddleware\Communication\Plugin\Configuration\CustomerProductPriceImportProcessPlugin;
use SprykerMiddleware\Zed\Process\Communication\Plugin\Configuration\DefaultConfigurationProfilePlugin;
use SprykerMiddleware\Zed\Process\ProcessDependencyProvider as SprykerMiddlewareProcessDependencyProvider;

class ProcessDependencyProvider extends SprykerMiddlewareProcessDependencyProvider
{
    /**
     * @return \SprykerMiddleware\Zed\Process\Dependency\Plugin\Configuration\ConfigurationProfilePluginInterface[]
     */
    protected function getConfigurationProfilePluginsStack(): array
    {
        $profileStack = parent::getConfigurationProfilePluginsStack();
        $profileStack[] = new DefaultConfigurationProfilePlugin();

        return $profileStack;
    }

    /**
     * @return \SprykerMiddleware\Zed\Process\Dependency\Plugin\Configuration\ProcessConfigurationPluginInterface[]
     */
    protected function getProcessesPluginsStack(): array
    {
        return [
            new CustomerProductPriceImportProcessPlugin(),
        ];
    }
}

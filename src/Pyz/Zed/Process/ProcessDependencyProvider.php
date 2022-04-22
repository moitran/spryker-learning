<?php

namespace Pyz\Zed\Process;

use Pyz\Zed\CustomerProductPriceImportMiddleware\Communication\Plugin\Configuration\CustomerProductPriceImportConfigurationProfilePlugin;
use SprykerMiddleware\Zed\Process\Communication\Plugin\Configuration\DefaultConfigurationProfilePlugin;
use SprykerMiddleware\Zed\Process\ProcessDependencyProvider as SprykerMiddlewareProcessDependencyProvider;

class ProcessDependencyProvider extends SprykerMiddlewareProcessDependencyProvider
{
    /**
     * @return array|\SprykerMiddleware\Zed\Process\Dependency\Plugin\Configuration\ConfigurationProfilePluginInterface[]
     */
    protected function getConfigurationProfilePluginsStack(): array
    {
        $profileStack = parent::getConfigurationProfilePluginsStack();
        $profileStack[] = new DefaultConfigurationProfilePlugin();
        $profileStack[] = new CustomerProductPriceImportConfigurationProfilePlugin();

        return $profileStack;
    }
}

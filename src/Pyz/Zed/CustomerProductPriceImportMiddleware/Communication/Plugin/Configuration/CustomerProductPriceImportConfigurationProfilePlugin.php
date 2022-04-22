<?php

namespace Pyz\Zed\CustomerProductPriceImportMiddleware\Communication\Plugin\Configuration;

use Spryker\Zed\Kernel\Communication\AbstractPlugin;
use SprykerMiddleware\Zed\Process\Dependency\Plugin\Configuration\ConfigurationProfilePluginInterface;

/**
 * @method \Pyz\Zed\CustomerProductPriceImportMiddleware\Communication\CustomerProductPriceImportMiddlewareCommunicationFactory getFactory()
 */
class CustomerProductPriceImportConfigurationProfilePlugin extends AbstractPlugin implements ConfigurationProfilePluginInterface
{
    /**
     * @return array|\SprykerMiddleware\Zed\Process\Dependency\Plugin\Configuration\ProcessConfigurationPluginInterface[]
     */
    public function getProcessConfigurationPlugins(): array
    {
        return $this->getFactory()->getCustomerProductPriceImportProcessPlugins();
    }

    public function getTranslatorFunctionPlugins(): array
    {
        return [];
    }

    public function getValidatorPlugins(): array
    {
        return [];
    }
}

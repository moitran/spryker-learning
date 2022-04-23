<?php

/**
 * This file is part of the Spryker Commerce OS.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\CustomerProductPriceImportMiddleware\Communication\Plugin\Configuration;

use Spryker\Zed\Kernel\Communication\AbstractPlugin;
use SprykerMiddleware\Zed\Process\Dependency\Plugin\Configuration\ConfigurationProfilePluginInterface;

/**
 * @method \Pyz\Zed\CustomerProductPriceImportMiddleware\Communication\CustomerProductPriceImportMiddlewareCommunicationFactory getFactory()
 * @method \Pyz\Zed\CustomerProductPriceImportMiddleware\Business\CustomerProductPriceImportMiddlewareFacadeInterface getFacade()
 */
class CustomerProductPriceImportConfigurationProfilePlugin extends AbstractPlugin implements ConfigurationProfilePluginInterface
{
    /**
     * @return \SprykerMiddleware\Zed\Process\Dependency\Plugin\Configuration\ProcessConfigurationPluginInterface[]
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

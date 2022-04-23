<?php

/**
 * This file is part of the Spryker Commerce OS.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\CustomerProductPriceImportMiddleware\Communication;

use Pyz\Zed\CustomerProductPriceImportMiddleware\Business\CustomerProductPriceImportMiddlewareBusinessFactory;
use Pyz\Zed\CustomerProductPriceImportMiddleware\Communication\Plugin\Configuration\CustomerProductPriceImportProcessPlugin;
use Pyz\Zed\CustomerProductPriceImportMiddleware\Communication\Plugin\Stream\CustomerProductPriceApiInputStreamPlugin;
use Pyz\Zed\CustomerProductPriceImportMiddleware\Communication\Plugin\Stream\CustomerProductPriceEventOutputStreamPlugin;
use Pyz\Zed\CustomerProductPriceImportMiddleware\CustomerProductPriceImportMiddlewareDependencyProvider as CPPIMiddlewareDependencyProvider;
use Spryker\Zed\Kernel\Communication\AbstractCommunicationFactory;
use SprykerMiddleware\Zed\Process\Business\ProcessFacadeInterface;
use SprykerMiddleware\Zed\Process\Dependency\Plugin\Configuration\ProcessConfigurationPluginInterface;
use SprykerMiddleware\Zed\Process\Dependency\Plugin\Iterator\ProcessIteratorPluginInterface;
use SprykerMiddleware\Zed\Process\Dependency\Plugin\Log\MiddlewareLoggerConfigPluginInterface;
use SprykerMiddleware\Zed\Process\Dependency\Plugin\Stream\InputStreamPluginInterface;
use SprykerMiddleware\Zed\Process\Dependency\Plugin\Stream\OutputStreamPluginInterface;

/**
 * @method \Pyz\Zed\CustomerProductPriceImportMiddleware\Business\CustomerProductPriceImportMiddlewareFacadeInterface getFacade()
 */
class CustomerProductPriceImportMiddlewareCommunicationFactory extends AbstractCommunicationFactory
{
    /**
     * @return \Pyz\Zed\CustomerProductPriceImportMiddleware\Business\CustomerProductPriceImportMiddlewareBusinessFactory
     */
    public function createBusinessFactory(): CustomerProductPriceImportMiddlewareBusinessFactory
    {
        return new CustomerProductPriceImportMiddlewareBusinessFactory();
    }

    /**
     * @return \SprykerMiddleware\Zed\Process\Dependency\Plugin\Stream\OutputStreamPluginInterface
     */
    public function createCustomerProductPriceEventOutputStreamPlugin(): OutputStreamPluginInterface
    {
        return new CustomerProductPriceEventOutputStreamPlugin();
    }

    /**
     * @return \SprykerMiddleware\Zed\Process\Dependency\Plugin\Stream\InputStreamPluginInterface
     */
    public function createCustomerProductPriceApiInputStreamPlugin(): InputStreamPluginInterface
    {
        return new CustomerProductPriceApiInputStreamPlugin();
    }

    /**
     * @return \SprykerMiddleware\Zed\Process\Business\ProcessFacadeInterface
     */
    public function getProcessFacade(): ProcessFacadeInterface
    {
        return $this->getProvidedDependency(CPPIMiddlewareDependencyProvider::FACADE_PROCESS);
    }

    /**
     * @return \SprykerMiddleware\Zed\Process\Dependency\Plugin\Iterator\ProcessIteratorPluginInterface
     */
    public function getNullIteratorPlugin(): ProcessIteratorPluginInterface
    {
        return $this->getProvidedDependency(CPPIMiddlewareDependencyProvider::PLUGIN_NULL_ITERATOR);
    }

    /**
     * @return array
     */
    public function getCustomerProductPriceStagePluginStack(): array
    {
        return $this->getProvidedDependency(CPPIMiddlewareDependencyProvider::STAGE_PLUGIN_STACK_CUSTOMER_PRODUCT_PRICE);
    }

    /**
     * @return \SprykerMiddleware\Zed\Process\Dependency\Plugin\Log\MiddlewareLoggerConfigPluginInterface
     */
    public function getMiddlewareLoggerConfigPlugin(): MiddlewareLoggerConfigPluginInterface
    {
        return $this->getProvidedDependency(CPPIMiddlewareDependencyProvider::CONFIG_PLUGIN_MIDDLEWARE_LOGGER);
    }

    /**
     * @return array
     */
    public function getCustomerProductPriceImportProcessPlugins(): array
    {
        return [
            $this->createCustomerProductPriceImportProcessPlugin(),
        ];
    }

    /**
     * @return \SprykerMiddleware\Zed\Process\Dependency\Plugin\Configuration\ProcessConfigurationPluginInterface
     */
    protected function createCustomerProductPriceImportProcessPlugin(): ProcessConfigurationPluginInterface
    {
        return new CustomerProductPriceImportProcessPlugin();
    }
}

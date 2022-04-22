<?php

namespace Pyz\Zed\CustomerProductPriceImportMiddleware\Communication;

use Pyz\Zed\CustomerProductPriceImportMiddleware\Communication\Plugin\Configuration\CustomerProductPriceImportProcessPlugin;
use Pyz\Zed\CustomerProductPriceImportMiddleware\CustomerProductPriceImportMiddlewareDependencyProvider as CPPIMiddlewareDependencyProvider ;
use Spryker\Zed\Kernel\Communication\AbstractCommunicationFactory;
use SprykerMiddleware\Zed\Process\Dependency\Plugin\Configuration\ProcessConfigurationPluginInterface;
use SprykerMiddleware\Zed\Process\Dependency\Plugin\Iterator\ProcessIteratorPluginInterface;
use SprykerMiddleware\Zed\Process\Dependency\Plugin\Log\MiddlewareLoggerConfigPluginInterface;
use SprykerMiddleware\Zed\Process\Dependency\Plugin\StagePluginInterface;
use SprykerMiddleware\Zed\Process\Dependency\Plugin\Stream\InputStreamPluginInterface;
use SprykerMiddleware\Zed\Process\Dependency\Plugin\Stream\OutputStreamPluginInterface;

/**
 * @method \Pyz\Zed\CustomerProductPriceImportMiddleware\Persistence\CustomerProductPriceImportMiddlewareQueryContainer getQueryContainer()
 * @method \Pyz\Zed\CustomerProductPriceImportMiddleware\Business\CustomerProductPriceImportMiddlewareFacade getFacade()
 * @method \Pyz\Zed\CustomerProductPriceImportMiddleware\CustomerProductPriceImportMiddlewareConfig getConfig()
 */
class CustomerProductPriceImportMiddlewareCommunicationFactory extends AbstractCommunicationFactory
{
    /**
     * @return \SprykerMiddleware\Zed\Process\Dependency\Plugin\Stream\InputStreamPluginInterface
     */
    public function getJsonRowInputStreamPlugin(): InputStreamPluginInterface
    {
        return $this->getProvidedDependency(CPPIMiddlewareDependencyProvider::STREAM_PLUGIN_JSON_INPUT);
    }

    /**
     * @return \SprykerMiddleware\Zed\Process\Dependency\Plugin\Stream\OutputStreamPluginInterface
     */
    public function getJsonRowOutputStreamPlugin(): OutputStreamPluginInterface
    {
        return $this->getProvidedDependency(CPPIMiddlewareDependencyProvider::STREAM_PLUGIN_JSON_OUTPUT);
    }

    /**
     * @return \SprykerMiddleware\Zed\Process\Dependency\Plugin\Iterator\ProcessIteratorPluginInterface
     */
    public function getNullIteratorPlugin(): ProcessIteratorPluginInterface
    {
        return $this->getProvidedDependency(CPPIMiddlewareDependencyProvider::PLUGIN_NULL_ITERATOR);
    }

    /**
     * @return \SprykerMiddleware\Zed\Process\Dependency\Plugin\StagePluginInterface
     */
    public function getStreamReaderStagePlugin(): StagePluginInterface
    {
        return $this->getProvidedDependency(CPPIMiddlewareDependencyProvider::STAGE_PLUGIN_STREAM_READER);
    }

    /**
     * @return \SprykerMiddleware\Zed\Process\Dependency\Plugin\StagePluginInterface
     */
    public function getStreamWriterStagePlugin(): StagePluginInterface
    {
        return $this->getProvidedDependency(CPPIMiddlewareDependencyProvider::STAGE_PLUGIN_STREAM_WRITER);
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
            $this->getCustomerProductPriceImportProcessPlugin()
        ];
    }

    /**
     * @return \SprykerMiddleware\Zed\Process\Dependency\Plugin\Configuration\ProcessConfigurationPluginInterface
     */
    protected function getCustomerProductPriceImportProcessPlugin(): ProcessConfigurationPluginInterface
    {
        return new CustomerProductPriceImportProcessPlugin();
    }
}

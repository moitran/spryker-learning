<?php

namespace Pyz\Zed\CustomerProductPriceImportMiddleware;

use Pyz\Zed\CustomerProductPriceImportMiddleware\Communication\Plugin\Mapper\CustomerProductPriceMapperStagePlugin;
use Pyz\Zed\CustomerProductPriceImportMiddleware\Communication\Plugin\Translator\CustomerProductPriceTranslationStagePlugin;
use Pyz\Zed\CustomerProductPriceImportMiddleware\Communication\Plugin\Validator\CustomerProductPriceValidatorStagePlugin;
use Spryker\Zed\Kernel\AbstractBundleDependencyProvider;
use Spryker\Zed\Kernel\Container;
use SprykerMiddleware\Zed\Process\Communication\Plugin\Iterator\NullIteratorPlugin;
use SprykerMiddleware\Zed\Process\Communication\Plugin\Log\MiddlewareLoggerConfigPlugin;
use SprykerMiddleware\Zed\Process\Communication\Plugin\Stream\JsonInputStreamPlugin;
use SprykerMiddleware\Zed\Process\Communication\Plugin\Stream\JsonOutputStreamPlugin;
use SprykerMiddleware\Zed\Process\Communication\Plugin\StreamReaderStagePlugin;
use SprykerMiddleware\Zed\Process\Communication\Plugin\StreamWriterStagePlugin;

class CustomerProductPriceImportMiddlewareDependencyProvider extends AbstractBundleDependencyProvider
{
    const STREAM_PLUGIN_JSON_INPUT = 'json input stream plugin';
    const STREAM_PLUGIN_JSON_OUTPUT = 'json output stream plugin';
    const PLUGIN_NULL_ITERATOR = 'null iterator plugin';
    const STAGE_PLUGIN_STACK_CUSTOMER_PRODUCT_PRICE = 'customer product price stage plugin stack';
    const CONFIG_PLUGIN_MIDDLEWARE_LOGGER = 'middleware logger config plugin';
    const FACADE_PROCESS = 'process facade';

    public function provideCommunicationLayerDependencies(Container $container)
    {
        $this->addJsonInputStreamPlugin($container);
        $this->addJsonOutputStreamPlugin($container);
        $this->addNullIteratorPlugin($container);
        $this->addCustomerProductPriceStagePluginStack($container);
        $this->addMiddlewareLoggerConfigPlugin($container);
        $this->addProcessFacade($container);

        return $container;
    }

    protected function addJsonInputStreamPlugin(Container $container)
    {
        $container->set(static::STREAM_PLUGIN_JSON_INPUT, function () {
            return new JsonInputStreamPlugin();
        });
    }

    protected function addJsonOutputStreamPlugin(Container $container)
    {
        $container->set(static::STREAM_PLUGIN_JSON_OUTPUT, function () {
            return new JsonOutputStreamPlugin();
        });
    }

    protected function addNullIteratorPlugin(Container $container)
    {
        $container->set(static::PLUGIN_NULL_ITERATOR, function () {
            return new NullIteratorPlugin();
        });
    }

    protected function addCustomerProductPriceStagePluginStack(Container $container)
    {
        $container->set(static::STAGE_PLUGIN_STACK_CUSTOMER_PRODUCT_PRICE, function () {
            return [
                new StreamReaderStagePlugin(),
                new CustomerProductPriceMapperStagePlugin(),
                new CustomerProductPriceTranslationStagePlugin(),
                new CustomerProductPriceValidatorStagePlugin(),
                new StreamWriterStagePlugin(),
            ];
        });
    }

    protected function addMiddlewareLoggerConfigPlugin(Container $container)
    {
        $container->set(static::CONFIG_PLUGIN_MIDDLEWARE_LOGGER, function () {
            return new MiddlewareLoggerConfigPlugin();
        });
    }

    protected function addProcessFacade(Container $container)
    {
        $container->set(static::FACADE_PROCESS, $container->getLocator()->process()->facade());
    }
}

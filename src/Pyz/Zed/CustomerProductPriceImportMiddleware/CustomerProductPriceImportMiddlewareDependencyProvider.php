<?php

namespace Pyz\Zed\CustomerProductPriceImportMiddleware;

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
    const STAGE_PLUGIN_STREAM_READER = 'stream reader stage plugin';
    const STAGE_PLUGIN_STREAM_WRITER = 'stream write stage plugin';
    const CONFIG_PLUGIN_MIDDLEWARE_LOGGER = 'middleware logger config plugin';

    public function provideCommunicationLayerDependencies(Container $container)
    {
        $this->addJsonInputStreamPlugin($container);
        $this->addJsonOutputStreamPlugin($container);
        $this->addNullIteratorPlugin($container);
        $this->addStreamReaderStagePlugin($container);
        $this->addStreamWriterStagePlugin($container);
        $this->addMiddlewareLoggerConfigPlugin($container);

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

    protected function addStreamReaderStagePlugin(Container $container)
    {
        $container->set(static::STAGE_PLUGIN_STREAM_READER, function () {
            return new StreamReaderStagePlugin();
        });
    }

    protected function addStreamWriterStagePlugin(Container $container)
    {
        $container->set(static::STAGE_PLUGIN_STREAM_WRITER, function () {
            return new StreamWriterStagePlugin();
        });
    }

    protected function addMiddlewareLoggerConfigPlugin(Container $container)
    {
        $container->set(static::CONFIG_PLUGIN_MIDDLEWARE_LOGGER, function () {
            return new MiddlewareLoggerConfigPlugin();
        });
    }
}

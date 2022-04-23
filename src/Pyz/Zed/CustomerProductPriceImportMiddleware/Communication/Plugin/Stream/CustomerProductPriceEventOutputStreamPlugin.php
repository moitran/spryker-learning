<?php

namespace Pyz\Zed\CustomerProductPriceImportMiddleware\Communication\Plugin\Stream;

use Spryker\Zed\Kernel\Communication\AbstractPlugin;
use SprykerMiddleware\Shared\Process\Stream\WriteStreamInterface;
use SprykerMiddleware\Zed\Process\Dependency\Plugin\Stream\OutputStreamPluginInterface;

/**
 * @method \Pyz\Zed\CustomerProductPriceImportMiddleware\Communication\CustomerProductPriceImportMiddlewareCommunicationFactory getFactory()
 */
class CustomerProductPriceEventOutputStreamPlugin extends AbstractPlugin implements OutputStreamPluginInterface
{
    const PLUGIN_NAME = 'CustomerProductPriceEventOutputStreamPlugin';

    /**
     * @return string
     */
    public function getName(): string
    {
        return static::PLUGIN_NAME;
    }

    /**
     * @param string $path
     *
     * @return \SprykerMiddleware\Shared\Process\Stream\WriteStreamInterface
     */
    public function getOutputStream(string $path): WriteStreamInterface
    {
        return $this->getFactory()
            ->createBusinessFactory()
            ->createCustomerProductPriceEventWriteStream();
    }
}

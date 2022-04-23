<?php

/**
 * This file is part of the Spryker Commerce OS.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\CustomerProductPriceImportMiddleware\Communication\Plugin\Stream;

use Spryker\Zed\Kernel\Communication\AbstractPlugin;
use SprykerMiddleware\Shared\Process\Stream\ReadStreamInterface;
use SprykerMiddleware\Zed\Process\Dependency\Plugin\Stream\InputStreamPluginInterface;

/**
 * @method \Pyz\Zed\CustomerProductPriceImportMiddleware\Communication\CustomerProductPriceImportMiddlewareCommunicationFactory getFactory()
 * @method \Pyz\Zed\CustomerProductPriceImportMiddleware\Business\CustomerProductPriceImportMiddlewareFacadeInterface getFacade()
 */
class CustomerProductPriceApiInputStreamPlugin extends AbstractPlugin implements InputStreamPluginInterface
{
    public const PLUGIN_NAME = 'CustomerProductPriceApiInputStreamPlugin';

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
     * @return \SprykerMiddleware\Shared\Process\Stream\ReadStreamInterface
     */
    public function getInputStream(string $path): ReadStreamInterface
    {
        return $this->getFactory()
            ->createBusinessFactory()
            ->createCustomerProductPriceApiReadStream($path);
    }
}

<?php

/**
 * This file is part of the Spryker Commerce OS.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\CustomerProductPriceImportMiddleware\Communication;

use Pyz\Zed\CustomerProductPriceImportMiddleware\Business\Stream\CustomerProductPriceApiReadStream;
use Pyz\Zed\CustomerProductPriceImportMiddleware\Business\Stream\CustomerProductPriceEventWriteStream;
use Pyz\Zed\CustomerProductPriceImportMiddleware\Communication\Plugin\Stream\CustomerProductPriceApiInputStreamPlugin;
use Pyz\Zed\CustomerProductPriceImportMiddleware\Communication\Plugin\Stream\CustomerProductPriceEventOutputStreamPlugin;
use Pyz\Zed\CustomerProductPriceImportMiddleware\CustomerProductPriceImportMiddlewareDependencyProvider;
use Spryker\Zed\Event\Business\EventFacadeInterface;
use Spryker\Zed\Kernel\Communication\AbstractCommunicationFactory;
use SprykerMiddleware\Shared\Process\Stream\ReadStreamInterface;
use SprykerMiddleware\Shared\Process\Stream\WriteStreamInterface;
use SprykerMiddleware\Zed\Process\Business\ProcessFacadeInterface;
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
        return $this->getProvidedDependency(CustomerProductPriceImportMiddlewareDependencyProvider::FACADE_PROCESS);
    }

    /**
     * @return \SprykerMiddleware\Zed\Process\Dependency\Plugin\Iterator\ProcessIteratorPluginInterface
     */
    public function getNullIteratorPlugin(): ProcessIteratorPluginInterface
    {
        return $this->getProvidedDependency(CustomerProductPriceImportMiddlewareDependencyProvider::PLUGIN_NULL_ITERATOR);
    }

    /**
     * @return array
     */
    public function getCustomerProductPriceStagePluginStack(): array
    {
        return $this->getProvidedDependency(CustomerProductPriceImportMiddlewareDependencyProvider::STAGE_PLUGIN_STACK_CUSTOMER_PRODUCT_PRICE);
    }

    /**
     * @return \SprykerMiddleware\Zed\Process\Dependency\Plugin\Log\MiddlewareLoggerConfigPluginInterface
     */
    public function getMiddlewareLoggerConfigPlugin(): MiddlewareLoggerConfigPluginInterface
    {
        return $this->getProvidedDependency(CustomerProductPriceImportMiddlewareDependencyProvider::CONFIG_PLUGIN_MIDDLEWARE_LOGGER);
    }

    /**
     * @return \SprykerMiddleware\Shared\Process\Stream\WriteStreamInterface
     */
    public function createCustomerProductPriceEventWriteStream(): WriteStreamInterface
    {
        return new CustomerProductPriceEventWriteStream(
            $this->getEventFacade()
        );
    }

    /**
     * @param string $url
     *
     * @return \SprykerMiddleware\Shared\Process\Stream\ReadStreamInterface
     */
    public function createCustomerProductPriceApiReadStream(string $url): ReadStreamInterface
    {
        return new CustomerProductPriceApiReadStream($url);
    }

    /**
     * @return \Spryker\Zed\Event\Business\EventFacadeInterface
     */
    protected function getEventFacade(): EventFacadeInterface
    {
        return $this->getProvidedDependency(CustomerProductPriceImportMiddlewareDependencyProvider::FACADE_EVENT);
    }
}

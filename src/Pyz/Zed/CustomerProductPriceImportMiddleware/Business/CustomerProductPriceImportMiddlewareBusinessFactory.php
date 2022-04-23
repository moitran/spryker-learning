<?php

namespace Pyz\Zed\CustomerProductPriceImportMiddleware\Business;

use GuzzleHttp\Client;
use Pyz\Zed\CustomerProductPriceImportMiddleware\Business\Mapper\CustomerProductPriceMapper;
use Pyz\Zed\CustomerProductPriceImportMiddleware\Business\Stream\CustomerProductPriceApiReadStream;
use Pyz\Zed\CustomerProductPriceImportMiddleware\Business\Stream\CustomerProductPriceEventWriteStream;
use Pyz\Zed\CustomerProductPriceImportMiddleware\Business\Translator\Dictionary\CustomerProductPriceDictionary;
use Pyz\Zed\CustomerProductPriceImportMiddleware\Business\Validator\CustomerProductPriceValidator;
use Spryker\Zed\Event\Business\EventFacadeInterface;
use Spryker\Zed\Kernel\Business\AbstractBusinessFactory;
use SprykerMiddleware\Shared\Process\Stream\ReadStreamInterface;
use SprykerMiddleware\Shared\Process\Stream\WriteStreamInterface;
use SprykerMiddleware\Zed\Process\Business\Mapper\Map\MapInterface;
use SprykerMiddleware\Zed\Process\Business\Translator\Dictionary\DictionaryInterface;
use SprykerMiddleware\Zed\Process\Business\Validator\ValidationRuleSet\ValidationRuleSetInterface;
use Pyz\Zed\CustomerProductPriceImportMiddleware\CustomerProductPriceImportMiddlewareDependencyProvider as CPPIMiddlewareDependencyProvider;

class CustomerProductPriceImportMiddlewareBusinessFactory extends AbstractBusinessFactory
{
    /**
     * @return \SprykerMiddleware\Zed\Process\Business\Translator\Dictionary\DictionaryInterface
     */
    public function createCustomerProductPriceDictionary(): DictionaryInterface
    {
        return new CustomerProductPriceDictionary();
    }

    /**
     * @return \SprykerMiddleware\Zed\Process\Business\Mapper\Map\MapInterface
     */
    public function createCustomerProductPriceMapper(): MapInterface
    {
        return new CustomerProductPriceMapper();
    }

    /**
     * @return \SprykerMiddleware\Zed\Process\Business\Validator\ValidationRuleSet\ValidationRuleSetInterface
     */
    public function createCustomerProductPriceValidator(): ValidationRuleSetInterface
    {
        return new CustomerProductPriceValidator();
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
        return $this->getProvidedDependency(CPPIMiddlewareDependencyProvider::FACADE_EVENT);
    }
}

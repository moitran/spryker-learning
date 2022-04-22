<?php

namespace Pyz\Zed\CustomerProductPriceImportMiddleware\Business;

use Pyz\Zed\CustomerProductPriceImportMiddleware\Business\Mapper\CustomerProductPriceMapper;
use Pyz\Zed\CustomerProductPriceImportMiddleware\Business\Translator\Dictionary\CustomerProductPriceDictionary;
use Pyz\Zed\CustomerProductPriceImportMiddleware\Business\Validator\CustomerProductPriceValidator;
use Spryker\Zed\Kernel\Business\AbstractBusinessFactory;
use SprykerMiddleware\Zed\Process\Business\Mapper\Map\MapInterface;
use SprykerMiddleware\Zed\Process\Business\Translator\Dictionary\DictionaryInterface;
use SprykerMiddleware\Zed\Process\Business\Validator\ValidationRuleSet\ValidationRuleSetInterface;

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
}

<?php

namespace Pyz\Zed\CustomerProductPriceImportMiddleware\Business\Translator\Dictionary;

use SprykerMiddleware\Zed\Process\Business\Translator\Dictionary\AbstractDictionary;

class CustomerProductPriceDictionary extends AbstractDictionary
{
    /**
     * @return array
     */
    public function getDictionary(): array
    {
        return  [
            'prices.*.value' => 'MoneyDecimalToInteger',
        ];
    }
}

<?php

/**
 * This file is part of the Spryker Commerce OS.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\CustomerProductPriceImportMiddleware\Business\Translator\Dictionary;

use Pyz\Zed\CustomerProductPriceImportMiddleware\Business\Mapper\CustomerProductPriceMapper;
use SprykerMiddleware\Zed\Process\Business\Translator\Dictionary\AbstractDictionary;

class CustomerProductPriceDictionary extends AbstractDictionary
{
    /**
     * @return array
     */
    public function getDictionary(): array
    {
        return [
            CustomerProductPriceMapper::MAP_COL_PRODUCT_NUMBER => 'IntToString',
            sprintf(
                '%s.*.%s',
                CustomerProductPriceMapper::MAP_COL_PRICES,
                CustomerProductPriceMapper::MAP_COL_PRICES_VALUE
            ) => [
                ['IntToFloat'],
                ['MoneyDecimalToInteger'],
            ],
        ];
    }
}

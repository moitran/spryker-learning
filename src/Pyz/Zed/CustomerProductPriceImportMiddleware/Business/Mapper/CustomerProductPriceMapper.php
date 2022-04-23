<?php

/**
 * This file is part of the Spryker Commerce OS.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\CustomerProductPriceImportMiddleware\Business\Mapper;

use SprykerMiddleware\Zed\Process\Business\Mapper\Map\AbstractMap;
use SprykerMiddleware\Zed\Process\Business\Mapper\Map\MapInterface;

class CustomerProductPriceMapper extends AbstractMap
{
    public const JSON_COL_CUSTOMER_NUMBER = 'customer_number';
    public const JSON_COL_PRODUCT_NUMBER = 'item_number';
    public const JSON_COL_PRICES = 'prices';
    public const JSON_COL_PRICES_QUANTITY = 'quantity';
    public const JSON_COL_PRICES_VALUE = 'value';

    public const MAP_COL_CUSTOMER_NUMBER = 'customer_number';
    public const MAP_COL_PRODUCT_NUMBER = 'product_number';
    public const MAP_COL_PRICES = 'prices';
    public const MAP_COL_PRICES_QUANTITY = 'quantity';
    public const MAP_COL_PRICES_VALUE = 'price';

    /**
     * @return string[]
     */
    protected function getMap(): array
    {
        return [
            static::MAP_COL_CUSTOMER_NUMBER => static::JSON_COL_CUSTOMER_NUMBER,
            static::MAP_COL_PRODUCT_NUMBER => static::JSON_COL_PRODUCT_NUMBER,
            static::MAP_COL_PRICES => [
                static::JSON_COL_PRICES,
                'itemMap' => [
                    static::MAP_COL_PRICES_QUANTITY => static::JSON_COL_PRICES_QUANTITY,
                    static::MAP_COL_PRICES_VALUE => static::JSON_COL_PRICES_VALUE,
                ],
            ],
        ];
    }

    /**
     * @return string
     */
    protected function getStrategy(): string
    {
        return MapInterface::MAPPER_STRATEGY_SKIP_UNKNOWN;
    }
}

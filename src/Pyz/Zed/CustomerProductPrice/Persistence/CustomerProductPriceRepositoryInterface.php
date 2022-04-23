<?php

/**
 * This file is part of the Spryker Commerce OS.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\CustomerProductPrice\Persistence;

/**
 * Interface CustomerProductPriceRepositoryInterface
 *
 * @package Pyz\Zed\CustomerProductPrice\Persistence
 */
interface CustomerProductPriceRepositoryInterface
{
    /**
     * @param array $skus
     * @param string $customerNumber
     *
     * @return array
     */
    public function fetchPricesForSkus(array $skus, string $customerNumber): array;
}

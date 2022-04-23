<?php

/**
 * This file is part of the Spryker Commerce OS.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Client\CustomerProductPriceStorage;

use Generated\Shared\Transfer\ProductViewTransfer;

/**
 * Interface CustomerProductPriceStorageClientInterface
 *
 * @package Pyz\Client\CustomerProductPriceStorage
 */
interface CustomerProductPriceStorageClientInterface
{
    /**
     * Specification:
     * - Expand product view transfer apply customer_product_prices
     *
     * @api
     *
     * @param \Generated\Shared\Transfer\ProductViewTransfer $productViewTransfer
     *
     * @return \Generated\Shared\Transfer\ProductViewTransfer
     */
    public function expandProductView(ProductViewTransfer $productViewTransfer): ProductViewTransfer;
}

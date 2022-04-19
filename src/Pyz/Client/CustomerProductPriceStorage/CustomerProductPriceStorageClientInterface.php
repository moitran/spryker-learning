<?php

namespace Pyz\Client\CustomerProductPriceStorage;

use Generated\Shared\Transfer\ProductViewTransfer;

/**
 * Interface CustomerProductPriceStorageClientInterface
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
     * @param ProductViewTransfer $productViewTransfer
     *
     * @return ProductViewTransfer
     */
    public function expandProductView(ProductViewTransfer $productViewTransfer): ProductViewTransfer;
}

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
     * @param ProductViewTransfer $productViewTransfer
     *
     * @return ProductViewTransfer
     */
    public function expandProductView(ProductViewTransfer $productViewTransfer): ProductViewTransfer;
}

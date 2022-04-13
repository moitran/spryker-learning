<?php

namespace Pyz\Client\CustomerProductPriceStorage\Expander;

use Generated\Shared\Transfer\ProductViewTransfer;

/**
 * Interface ProductViewExpanderInterface
 * @package Pyz\Client\CustomerProductPriceStorage\Expander
 */
interface ProductViewExpanderInterface
{
    /**
     * @param ProductViewTransfer $productViewTransfer
     *
     * @return ProductViewTransfer
     */
    public function expandProductViewTransfer(ProductViewTransfer $productViewTransfer) : ProductViewTransfer;
}

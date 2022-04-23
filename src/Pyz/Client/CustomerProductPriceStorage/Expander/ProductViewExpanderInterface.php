<?php

/**
 * This file is part of the Spryker Commerce OS.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Client\CustomerProductPriceStorage\Expander;

use Generated\Shared\Transfer\ProductViewTransfer;

/**
 * Interface ProductViewExpanderInterface
 *
 * @package Pyz\Client\CustomerProductPriceStorage\Expander
 */
interface ProductViewExpanderInterface
{
    /**
     * @param \Generated\Shared\Transfer\ProductViewTransfer $productViewTransfer
     *
     * @return \Generated\Shared\Transfer\ProductViewTransfer
     */
    public function expandProductViewTransfer(ProductViewTransfer $productViewTransfer): ProductViewTransfer;
}

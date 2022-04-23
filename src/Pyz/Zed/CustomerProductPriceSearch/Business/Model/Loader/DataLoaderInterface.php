<?php

/**
 * This file is part of the Spryker Commerce OS.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\CustomerProductPriceSearch\Business\Model\Loader;

use Generated\Shared\Transfer\ProductPageLoadTransfer;

/**
 * Interface DataLoaderInterface
 *
 * @package Pyz\Zed\CustomerProductPriceSearch\Business\Model\Loader
 */
interface DataLoaderInterface
{
    /**
     * @param \Generated\Shared\Transfer\ProductPageLoadTransfer $loadTransfer
     *
     * @return \Generated\Shared\Transfer\ProductPageLoadTransfer
     */
    public function expandProductPageDataTransfer(ProductPageLoadTransfer $loadTransfer): ProductPageLoadTransfer;
}

<?php

namespace Pyz\Zed\CustomerProductPriceSearch\Business\Model\Loader;

use Generated\Shared\Transfer\ProductPageLoadTransfer;

/**
 * Interface DataLoaderInterface
 * @package Pyz\Zed\CustomerProductPriceSearch\Business\Model\Loader
 */
interface DataLoaderInterface
{
    /**
     * @param ProductPageLoadTransfer $loadTransfer
     *
     * @return ProductPageLoadTransfer
     */
    public function expandProductPageDataTransfer(ProductPageLoadTransfer $loadTransfer): ProductPageLoadTransfer;
}

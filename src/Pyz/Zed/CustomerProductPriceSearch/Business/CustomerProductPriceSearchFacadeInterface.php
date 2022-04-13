<?php

namespace Pyz\Zed\CustomerProductPriceSearch\Business;

use Generated\Shared\Transfer\ProductPageLoadTransfer;
use Generated\Shared\Transfer\ProductPageSearchTransfer;

/**
 * Interface CustomerProductPriceSearchFacadeInterface
 * @package Pyz\Zed\CustomerProductPriceSearch\Business
 */
interface CustomerProductPriceSearchFacadeInterface
{
    /**
     * @param ProductPageLoadTransfer $loadTransfer
     *
     * @return ProductPageLoadTransfer
     */
    public function expandProductPageDataTransfer(ProductPageLoadTransfer $loadTransfer): ProductPageLoadTransfer;

    /**
     * @param array $productData
     * @param ProductPageSearchTransfer $productAbstractPageSearchTransfer
     */
    public function expandProductPageData(
        array $productData,
        ProductPageSearchTransfer $productAbstractPageSearchTransfer
    ): void;
}

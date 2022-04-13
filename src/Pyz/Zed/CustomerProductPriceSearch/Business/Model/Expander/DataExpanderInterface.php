<?php

namespace Pyz\Zed\CustomerProductPriceSearch\Business\Model\Expander;

use Generated\Shared\Transfer\ProductPageSearchTransfer;

/**
 * Interface DataExpanderInterface
 * @package Pyz\Zed\CustomerProductPriceSearch\Business\Model\Expander
 */
interface DataExpanderInterface
{
    /**
     * @param array $productData
     * @param ProductPageSearchTransfer $productAbstractPageSearchTransfer
     */
    public function expandProductPageData(
        array $productData,
        ProductPageSearchTransfer $productAbstractPageSearchTransfer
    ): void;
}

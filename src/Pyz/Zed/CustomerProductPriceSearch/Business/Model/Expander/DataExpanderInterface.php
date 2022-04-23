<?php

/**
 * This file is part of the Spryker Commerce OS.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\CustomerProductPriceSearch\Business\Model\Expander;

use Generated\Shared\Transfer\ProductPageSearchTransfer;

/**
 * Interface DataExpanderInterface
 *
 * @package Pyz\Zed\CustomerProductPriceSearch\Business\Model\Expander
 */
interface DataExpanderInterface
{
    /**
     * @param array $productData
     * @param \Generated\Shared\Transfer\ProductPageSearchTransfer $productAbstractPageSearchTransfer
     */
    public function expandProductPageData(
        array $productData,
        ProductPageSearchTransfer $productAbstractPageSearchTransfer
    ): void;
}

<?php

/**
 * This file is part of the Spryker Commerce OS.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\CustomerProductPriceSearch\Business;

use Generated\Shared\Transfer\ProductPageLoadTransfer;
use Generated\Shared\Transfer\ProductPageSearchTransfer;
use Spryker\Zed\Kernel\Business\AbstractFacade;

/**
 * Class CustomerProductPriceSearchFacade
 *
 * @package Pyz\Zed\CustomerProductPriceSearch\Business
 * @method \Pyz\Zed\CustomerProductPriceSearch\Business\CustomerProductPriceSearchBusinessFactory getFactory()
 * @method \Pyz\Zed\CustomerProductPriceSearch\Persistence\CustomerProductPriceSearchRepositoryInterface getRepository()
 */
class CustomerProductPriceSearchFacade extends AbstractFacade implements CustomerProductPriceSearchFacadeInterface
{
    /**
     * @param \Generated\Shared\Transfer\ProductPageLoadTransfer $loadTransfer
     *
     * @return \Generated\Shared\Transfer\ProductPageLoadTransfer
     */
    public function expandProductPageDataTransfer(ProductPageLoadTransfer $loadTransfer): ProductPageLoadTransfer
    {
        return $this->getFactory()->createDataLoader()->expandProductPageDataTransfer($loadTransfer);
    }

    /**
     * @param array $productData
     * @param \Generated\Shared\Transfer\ProductPageSearchTransfer $productAbstractPageSearchTransfer
     *
     * @return void
     */
    public function expandProductPageData(
        array $productData,
        ProductPageSearchTransfer $productAbstractPageSearchTransfer
    ): void {
        $this->getFactory()->createExpander()->expandProductPageData($productData, $productAbstractPageSearchTransfer);
    }
}

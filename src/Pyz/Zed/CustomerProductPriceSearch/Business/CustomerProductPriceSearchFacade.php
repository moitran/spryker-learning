<?php

namespace Pyz\Zed\CustomerProductPriceSearch\Business;

use Generated\Shared\Transfer\ProductPageLoadTransfer;
use Generated\Shared\Transfer\ProductPageSearchTransfer;
use Spryker\Zed\Kernel\Business\AbstractFacade;

/**
 * Class CustomerProductPriceSearchFacade
 * @package Pyz\Zed\CustomerProductPriceSearch\Business
 * @method CustomerProductPriceSearchBusinessFactory getFactory()
 */
class CustomerProductPriceSearchFacade extends AbstractFacade implements CustomerProductPriceSearchFacadeInterface
{
    /**
     * @param ProductPageLoadTransfer $loadTransfer
     *
     * @return ProductPageLoadTransfer
     */
    public function expandProductPageDataTransfer(ProductPageLoadTransfer $loadTransfer): ProductPageLoadTransfer
    {
        return $this->getFactory()->createDataLoader()->expandProductPageDataTransfer($loadTransfer);
    }

    /**
     * @param array $productData
     * @param ProductPageSearchTransfer $productAbstractPageSearchTransfer
     */
    public function expandProductPageData(
        array $productData,
        ProductPageSearchTransfer $productAbstractPageSearchTransfer
    ): void {
        $this->getFactory()->createExpander()->expandProductPageData($productData, $productAbstractPageSearchTransfer);
    }
}

<?php

namespace Pyz\Zed\CustomerProductPriceSearch\Communication\Plugin\ProductPageSearch\Expander;

use Generated\Shared\Transfer\ProductPageSearchTransfer;
use Pyz\Zed\CustomerProductPriceSearch\Business\CustomerProductPriceSearchFacadeInterface;
use Spryker\Zed\Kernel\Communication\AbstractPlugin;
use Spryker\Zed\ProductPageSearchExtension\Dependency\Plugin\ProductPageDataExpanderPluginInterface;

/**
 * Class CustomerProductPriceSearchDataExpanderPlugin
 * @package Pyz\Zed\CustomerProductPriceSearch\Communication\Plugin\ProductPageSearch\Expander
 * @method CustomerProductPriceSearchFacadeInterface getFacade()
 */
class CustomerProductPriceSearchDataExpanderPlugin extends AbstractPlugin implements ProductPageDataExpanderPluginInterface
{
    /**
     * @param array $productData
     * @param ProductPageSearchTransfer $productAbstractPageSearchTransfer
     */
    public function expandProductPageData(
        array $productData,
        ProductPageSearchTransfer $productAbstractPageSearchTransfer
    ) {
        $this->getFacade()->expandProductPageData($productData, $productAbstractPageSearchTransfer);
    }
}

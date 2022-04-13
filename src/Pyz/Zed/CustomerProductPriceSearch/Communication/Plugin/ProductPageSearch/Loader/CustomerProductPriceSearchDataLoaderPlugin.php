<?php

namespace Pyz\Zed\CustomerProductPriceSearch\Communication\Plugin\ProductPageSearch\Loader;

use Generated\Shared\Transfer\ProductPageLoadTransfer;
use Pyz\Zed\CustomerProductPriceSearch\Business\CustomerProductPriceSearchFacadeInterface;
use Spryker\Zed\Kernel\Communication\AbstractPlugin;
use Spryker\Zed\ProductPageSearchExtension\Dependency\Plugin\ProductPageDataLoaderPluginInterface;

/**
 * Class CustomerProductPriceSearchDataLoaderPlugin
 * @package Pyz\Zed\CustomerProductPriceSearch\Communication\Plugin\ProductPageSearch\Loader
 * @method CustomerProductPriceSearchFacadeInterface getFacade()
 */
class CustomerProductPriceSearchDataLoaderPlugin extends AbstractPlugin implements ProductPageDataLoaderPluginInterface
{
    /**
     * @param ProductPageLoadTransfer $loadTransfer
     *
     * @return ProductPageLoadTransfer
     */
    public function expandProductPageDataTransfer(ProductPageLoadTransfer $loadTransfer)
    {
        return $this->getFacade()->expandProductPageDataTransfer($loadTransfer);
    }
}

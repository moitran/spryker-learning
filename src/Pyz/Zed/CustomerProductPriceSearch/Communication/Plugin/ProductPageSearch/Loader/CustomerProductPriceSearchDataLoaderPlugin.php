<?php

/**
 * This file is part of the Spryker Commerce OS.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\CustomerProductPriceSearch\Communication\Plugin\ProductPageSearch\Loader;

use Generated\Shared\Transfer\ProductPageLoadTransfer;
use Spryker\Zed\Kernel\Communication\AbstractPlugin;
use Spryker\Zed\ProductPageSearchExtension\Dependency\Plugin\ProductPageDataLoaderPluginInterface;

/**
 * Class CustomerProductPriceSearchDataLoaderPlugin
 *
 * @package Pyz\Zed\CustomerProductPriceSearch\Communication\Plugin\ProductPageSearch\Loader
 * @method \Pyz\Zed\CustomerProductPriceSearch\Business\CustomerProductPriceSearchFacadeInterface getFacade()
 */
class CustomerProductPriceSearchDataLoaderPlugin extends AbstractPlugin implements ProductPageDataLoaderPluginInterface
{
    /**
     * @param \Generated\Shared\Transfer\ProductPageLoadTransfer $loadTransfer
     *
     * @return \Generated\Shared\Transfer\ProductPageLoadTransfer
     */
    public function expandProductPageDataTransfer(ProductPageLoadTransfer $loadTransfer)
    {
        return $this->getFacade()->expandProductPageDataTransfer($loadTransfer);
    }
}

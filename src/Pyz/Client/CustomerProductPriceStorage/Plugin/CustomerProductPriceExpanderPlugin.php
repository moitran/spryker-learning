<?php

namespace Pyz\Client\CustomerProductPriceStorage\Plugin;

use Generated\Shared\Transfer\ProductViewTransfer;
use Pyz\Client\CustomerProductPriceStorage\CustomerProductPriceStorageClientInterface;
use Spryker\Client\Kernel\AbstractPlugin;
use Spryker\Client\ProductStorageExtension\Dependency\Plugin\ProductViewExpanderPluginInterface;

/**
 * Class CustomerProductPriceExpanderPlugin
 * @package Pyz\Client\CustomerProductPriceStorage\Plugin
 * @method CustomerProductPriceStorageClientInterface getClient()
 */
class CustomerProductPriceExpanderPlugin extends AbstractPlugin implements ProductViewExpanderPluginInterface
{
    /**
     * @param ProductViewTransfer $productViewTransfer
     * @param array $productData
     * @param string $localeName
     *
     * @return ProductViewTransfer
     */
    public function expandProductViewTransfer(ProductViewTransfer $productViewTransfer, array $productData, $localeName)
    {
        return $this->getClient()->expandProductView($productViewTransfer);
    }
}

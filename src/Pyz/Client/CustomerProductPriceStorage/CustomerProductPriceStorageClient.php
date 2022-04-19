<?php

namespace Pyz\Client\CustomerProductPriceStorage;

use Generated\Shared\Transfer\ProductViewTransfer;
use Spryker\Client\Kernel\AbstractClient;

/**
 * Class CustomerProductPriceStorageClient
 * @package Pyz\Client\CustomerProductPriceStorage
 * @method CustomerProductPriceStorageFactory getFactory()
 */
class CustomerProductPriceStorageClient extends AbstractClient implements CustomerProductPriceStorageClientInterface
{
    /**
     * Specification:
     * - Expand product view transfer apply customer_product_prices
     *
     * @api
     *
     * @param ProductViewTransfer $productViewTransfer
     *
     * @return ProductViewTransfer
     * @throws \Spryker\Client\Kernel\Exception\Container\ContainerKeyNotFoundException
     */
    public function expandProductView(ProductViewTransfer $productViewTransfer): ProductViewTransfer
    {
        return $this->getFactory()->createViewExpander()->expandProductViewTransfer($productViewTransfer);
    }
}

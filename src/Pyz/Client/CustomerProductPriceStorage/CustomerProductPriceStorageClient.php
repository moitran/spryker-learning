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

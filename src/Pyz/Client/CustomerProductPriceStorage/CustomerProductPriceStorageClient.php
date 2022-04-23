<?php

/**
 * This file is part of the Spryker Commerce OS.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Client\CustomerProductPriceStorage;

use Generated\Shared\Transfer\ProductViewTransfer;
use Spryker\Client\Kernel\AbstractClient;

/**
 * Class CustomerProductPriceStorageClient
 *
 * @package Pyz\Client\CustomerProductPriceStorage
 * @method \Pyz\Client\CustomerProductPriceStorage\CustomerProductPriceStorageFactory getFactory()
 */
class CustomerProductPriceStorageClient extends AbstractClient implements CustomerProductPriceStorageClientInterface
{
    /**
     * Specification:
     * - Expand product view transfer apply customer_product_prices
     *
     * @api
     *
     * @param \Generated\Shared\Transfer\ProductViewTransfer $productViewTransfer
     *
     * @throws \Spryker\Client\Kernel\Exception\Container\ContainerKeyNotFoundException
     *
     * @return \Generated\Shared\Transfer\ProductViewTransfer
     */
    public function expandProductView(ProductViewTransfer $productViewTransfer): ProductViewTransfer
    {
        return $this->getFactory()->createViewExpander()->expandProductViewTransfer($productViewTransfer);
    }
}

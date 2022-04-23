<?php

/**
 * This file is part of the Spryker Commerce OS.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\CustomerProductPriceSearch\Persistence;

use Generated\Shared\Transfer\CustomerProductPriceCollectionTransfer;

/**
 * Interface CustomerProductPriceSearchRepositoryInterface
 *
 * @package Pyz\Zed\CustomerProductPriceSearch\Persistence
 */
interface CustomerProductPriceSearchRepositoryInterface
{
    /**
     * @param array $abstractIds
     *
     * @return array
     */
    public function findSkusByAbstractIds(array $abstractIds): array;

    /**
     * @param array $skus
     *
     * @return \Generated\Shared\Transfer\CustomerProductPriceCollectionTransfer
     */
    public function findCustomerProductPricesBySkus(array $skus): CustomerProductPriceCollectionTransfer;
}

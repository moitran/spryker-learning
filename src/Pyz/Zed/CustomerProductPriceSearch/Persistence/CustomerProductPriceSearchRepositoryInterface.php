<?php

namespace Pyz\Zed\CustomerProductPriceSearch\Persistence;

use Generated\Shared\Transfer\CustomerProductPriceCollectionTransfer;

/**
 * Interface CustomerProductPriceSearchRepositoryInterface
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
     * @return CustomerProductPriceCollectionTransfer
     */
    public function findCustomerProductPricesBySkus(array $skus): CustomerProductPriceCollectionTransfer;
}

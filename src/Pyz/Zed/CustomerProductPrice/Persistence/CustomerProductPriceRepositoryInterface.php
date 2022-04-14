<?php

namespace Pyz\Zed\CustomerProductPrice\Persistence;

/**
 * Interface CustomerProductPriceRepositoryInterface
 * @package Pyz\Zed\CustomerProductPrice\Persistence
 */
interface CustomerProductPriceRepositoryInterface
{
    /**
     * @param array $skus
     * @param string $customerNumber
     *
     * @return array
     */
    public function fetchPricesForSkus(array $skus, string $customerNumber): array;
}

<?php

namespace Pyz\Zed\CustomerProductPrice\Business;

/**
 * Interface CustomerProductPriceFacadeInterface
 * @package Pyz\Zed\CustomerProductPrice\Business
 */
interface CustomerProductPriceFacadeInterface
{
    public function importFromJsonFile(string $filePath): bool;
}

<?php

namespace Pyz\Zed\CustomerProductPrice\Business;

use Generated\Shared\Transfer\CustomerProductTransfer;

/**
 * Interface CustomerProductPriceFacadeInterface
 * @package Pyz\Zed\CustomerProductPrice\Business
 */
interface CustomerProductPriceFacadeInterface
{
    /**
     * @param string $filePath
     *
     * @return bool
     */
    public function importFromJsonFile(string $filePath): bool;

    /**
     * @param CustomerProductTransfer $customerProductTransfer
     *
     * @return mixed
     */
    public function saveCustomerProductPrice(CustomerProductTransfer $customerProductTransfer);
}

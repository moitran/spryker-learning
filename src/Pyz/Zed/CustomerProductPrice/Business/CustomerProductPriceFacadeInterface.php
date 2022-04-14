<?php

namespace Pyz\Zed\CustomerProductPrice\Business;

use Generated\Shared\Transfer\CalculableObjectTransfer;
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
     */
    public function saveCustomerProductPrice(CustomerProductTransfer $customerProductTransfer);

    /**
     * @param CalculableObjectTransfer $calculableObjectTransfer
     */
    public function recalculate(CalculableObjectTransfer $calculableObjectTransfer);
}

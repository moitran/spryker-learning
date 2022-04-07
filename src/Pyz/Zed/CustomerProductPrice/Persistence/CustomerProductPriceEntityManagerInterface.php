<?php

namespace Pyz\Zed\CustomerProductPrice\Persistence;

use Generated\Shared\Transfer\CustomerProductTransfer;
use Generated\Shared\Transfer\CustomerProductPriceTransfer;

/**
 * Interface CustomerProductPriceEntityManagerInterface
 * @package Pyz\Zed\CustomerProductPrice\Persistence
 */
interface CustomerProductPriceEntityManagerInterface
{
    /**
     * @param CustomerProductTransfer $customerProductTransfer
     *
     * @return CustomerProductTransfer
     */
    public function saveCustomerProduct(CustomerProductTransfer $customerProductTransfer) : CustomerProductTransfer;

    /**
     * @param CustomerProductPriceTransfer $customerProductPriceTransfer
     *
     * @return CustomerProductPriceTransfer
     */
    public function saveCustomerProductPrice(CustomerProductPriceTransfer $customerProductPriceTransfer) : CustomerProductPriceTransfer;
}

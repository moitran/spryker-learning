<?php

namespace Pyz\Zed\CustomerProductPrice\Persistence;

use Generated\Shared\Transfer\CustomerProductTransfer;

/**
 * Interface CustomerProductPriceEntityManagerInterface
 * @package Pyz\Zed\CustomerProductPrice\Persistence
 */
interface CustomerProductPriceEntityManagerInterface
{
    /**
     * @param CustomerProductTransfer $customerProductTransfer
     *
     * @return mixed
     */
    public function saveCustomerProductPrice(CustomerProductTransfer $customerProductTransfer);
}

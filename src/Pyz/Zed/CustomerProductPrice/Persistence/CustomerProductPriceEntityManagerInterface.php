<?php

namespace Pyz\Zed\CustomerProductPrice\Persistence;

use Generated\Shared\Transfer\PyzCustomerProductEntityTransfer;
use Generated\Shared\Transfer\PyzCustomerProductPriceEntityTransfer;

/**
 * Interface CustomerProductPriceEntityManagerInterface
 * @package Pyz\Zed\CustomerProductPrice\Persistence
 */
interface CustomerProductPriceEntityManagerInterface
{
    /**
     * @param PyzCustomerProductEntityTransfer $customerProductEntityTransfer
     *
     * @return PyzCustomerProductEntityTransfer
     */
    public function saveCustomerProduct(PyzCustomerProductEntityTransfer $customerProductEntityTransfer) : PyzCustomerProductEntityTransfer;

    /**
     * @param PyzCustomerProductPriceEntityTransfer $customerProductPriceEntityTransfer
     *
     * @return PyzCustomerProductPriceEntityTransfer
     */
    public function saveCustomerProductPrice(PyzCustomerProductPriceEntityTransfer $customerProductPriceEntityTransfer) : PyzCustomerProductPriceEntityTransfer;
}

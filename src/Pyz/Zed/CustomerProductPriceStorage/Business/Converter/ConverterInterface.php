<?php

namespace Pyz\Zed\CustomerProductPriceStorage\Business\Converter;

use Generated\Shared\Transfer\CustomerProductPriceStorageTransfer;
use Generated\Shared\Transfer\CustomerProductTransfer;

/**
 * Interface ConverterInterface
 * @package Pyz\Zed\CustomerProductPriceStorage\Business\Converter
 */
interface ConverterInterface
{
    /**
     * @param CustomerProductTransfer $customerProductTransfer
     *
     * @return CustomerProductPriceStorageTransfer
     */
    public function convert(CustomerProductTransfer $customerProductTransfer): CustomerProductPriceStorageTransfer;
}

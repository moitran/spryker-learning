<?php

namespace Pyz\Zed\CustomerProductPriceStorage\Business\Parser;

use Generated\Shared\Transfer\CustomerProductPriceStorageTransfer;
use Generated\Shared\Transfer\CustomerProductTransfer;

/**
 * Interface CustomerProductEntityToDtoParserInterface
 * @package Pyz\Zed\CustomerProductPriceStorage\Business\Parser
 */
interface CustomerProductEntityToDtoParserInterface
{
    /**
     * @param CustomerProductTransfer $customerProductTransfer
     *
     * @return CustomerProductPriceStorageTransfer
     */
    public function parse(CustomerProductTransfer $customerProductTransfer): CustomerProductPriceStorageTransfer;
}

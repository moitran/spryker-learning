<?php

namespace Pyz\Zed\CustomerProductPriceStorage\Business\Parser;

use Generated\Shared\Transfer\CustomerProductPriceStorageTransfer;
use Orm\Zed\CustomerProductPrice\Persistence\PyzCustomerProduct;

/**
 * Interface CustomerProductEntityToDtoParserInterface
 * @package Pyz\Zed\CustomerProductPriceStorage\Business\Parser
 */
interface CustomerProductEntityToDtoParserInterface
{
    public function parse(PyzCustomerProduct $customerProduct): CustomerProductPriceStorageTransfer;
}

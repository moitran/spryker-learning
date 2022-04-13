<?php

namespace Pyz\Zed\CustomerProductPriceStorage\Business\Parser;

use Generated\Shared\Transfer\CustomerProductPriceStorageTransfer;
use Generated\Shared\Transfer\CustomerProductPriceStoreTransfer;
use Generated\Shared\Transfer\CustomerProductPriceTransfer;
use Generated\Shared\Transfer\CustomerProductTransfer;

/**
 * Class CustomerProductEntityToDtoParser
 * @package Pyz\Zed\CustomerProductPriceStorage\Business\Parser
 */
class CustomerProductEntityToDtoParser implements CustomerProductEntityToDtoParserInterface
{
    /**
     * @param CustomerProductTransfer $customerProductTransfer
     *
     * @return CustomerProductPriceStorageTransfer
     */
    public function parse(CustomerProductTransfer $customerProductTransfer): CustomerProductPriceStorageTransfer
    {
        $customerProductPriceStoreTransfer = new CustomerProductPriceStoreTransfer();
        $customerProductPriceStoreTransfer->setCustomerProductPrices($customerProductTransfer->getCustomerProductPrices());

        $customerProductPriceStorageTransfer = new CustomerProductPriceStorageTransfer();
        $customerProductPriceStorageTransfer->setReference(sprintf('%s:%s',
                $customerProductTransfer->getProductNumber(),
                $customerProductTransfer->getCustomerNumber(),
            )
        );
        $customerProductPriceStorageTransfer->setData($customerProductPriceStoreTransfer);

        return $customerProductPriceStorageTransfer;
    }
}

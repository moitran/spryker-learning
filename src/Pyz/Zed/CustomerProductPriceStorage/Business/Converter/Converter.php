<?php

namespace Pyz\Zed\CustomerProductPriceStorage\Business\Converter;

use Generated\Shared\Transfer\CustomerProductPriceStorageTransfer;
use Generated\Shared\Transfer\CustomerProductPriceStoreTransfer;
use Generated\Shared\Transfer\CustomerProductTransfer;

/**
 * Class Converter : convert CustomerProductTransfer to CustomerProductPriceStorageTransfer
 * @package Pyz\Zed\CustomerProductPriceStorage\Business\Converter
 */
class Converter implements ConverterInterface
{
    /**
     * @param CustomerProductTransfer $customerProductTransfer
     *
     * @return CustomerProductPriceStorageTransfer
     */
    public function convert(CustomerProductTransfer $customerProductTransfer): CustomerProductPriceStorageTransfer
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

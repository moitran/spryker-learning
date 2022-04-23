<?php

/**
 * This file is part of the Spryker Commerce OS.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\CustomerProductPriceStorage\Business\Converter;

use Generated\Shared\Transfer\CustomerProductPriceStorageTransfer;
use Generated\Shared\Transfer\CustomerProductPriceStoreTransfer;
use Generated\Shared\Transfer\CustomerProductTransfer;

/**
 * Class Converter : convert CustomerProductTransfer to CustomerProductPriceStorageTransfer
 *
 * @package Pyz\Zed\CustomerProductPriceStorage\Business\Converter
 */
class Converter implements ConverterInterface
{
    /**
     * @param \Generated\Shared\Transfer\CustomerProductTransfer $customerProductTransfer
     *
     * @return \Generated\Shared\Transfer\CustomerProductPriceStorageTransfer
     */
    public function convert(CustomerProductTransfer $customerProductTransfer): CustomerProductPriceStorageTransfer
    {
        $customerProductPriceStoreTransfer = new CustomerProductPriceStoreTransfer();
        $customerProductPriceStoreTransfer->setCustomerProductPrices($customerProductTransfer->getCustomerProductPrices());

        $customerProductPriceStorageTransfer = new CustomerProductPriceStorageTransfer();
        $customerProductPriceStorageTransfer->setReference(sprintf(
            '%s:%s',
            $customerProductTransfer->getProductNumber(),
            $customerProductTransfer->getCustomerNumber(),
        ));
        $customerProductPriceStorageTransfer->setData($customerProductPriceStoreTransfer);

        return $customerProductPriceStorageTransfer;
    }
}

<?php

namespace Pyz\Zed\CustomerProductPriceStorage\Business\Parser;

use Generated\Shared\Transfer\CustomerProductPriceStorageTransfer;
use Generated\Shared\Transfer\CustomerProductPriceStoreTransfer;
use Generated\Shared\Transfer\CustomerProductPriceTransfer;
use Orm\Zed\CustomerProductPrice\Persistence\PyzCustomerProduct;

/**
 * Class CustomerProductEntityToDtoParser
 * @package Pyz\Zed\CustomerProductPriceStorage\Business\Parser
 */
class CustomerProductEntityToDtoParser implements CustomerProductEntityToDtoParserInterface
{
    /**
     * Parse PyzCustomerProduct Entity to CustomerProductPriceStorageTransfer
     *
     * @param PyzCustomerProduct $customerProduct
     *
     * @return CustomerProductPriceStorageTransfer
     * @throws \Propel\Runtime\Exception\PropelException
     */
    public function parse(PyzCustomerProduct $customerProduct): CustomerProductPriceStorageTransfer
    {
        $customerProductPriceStoreTransfer = new CustomerProductPriceStoreTransfer();
        foreach ($customerProduct->getPyzCustomerProductPrices() as $customerProductPrice) {
            $customerProductPriceTransfer = new CustomerProductPriceTransfer();
            $customerProductPriceTransfer->setPrice($customerProductPrice->getPrice());
            $customerProductPriceTransfer->setQuantity($customerProductPrice->getQuantity());
            $customerProductPriceStoreTransfer->addCustomerProductPrice($customerProductPriceTransfer);
        }

        $customerProductPriceStorageTransfer = new CustomerProductPriceStorageTransfer();
        $customerProductPriceStorageTransfer->setReference(sprintf('%s:%s',
                $customerProduct->getProductNumber(),
                $customerProduct->getCustomerNumber(),
            )
        );
        $customerProductPriceStorageTransfer->setData($customerProductPriceStoreTransfer);

        return $customerProductPriceStorageTransfer;
    }
}

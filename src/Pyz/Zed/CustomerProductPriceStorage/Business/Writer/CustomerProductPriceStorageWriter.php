<?php

namespace Pyz\Zed\CustomerProductPriceStorage\Business\Writer;

use Spryker\Shared\Kernel\Transfer\TransferInterface;

/**
 * Class CustomerProductPriceStorageWriter
 * @package Pyz\Zed\CustomerProductPriceStorage\Business\Writer
 */
class CustomerProductPriceStorageWriter
{
    public function publish(TransferInterface $transfer)
    {
        dd($transfer);
        // 1. fetch all prices for "pyz_customer_product_price.fk_customer_product" => 33
        // 2. fetch customer_product by "pyz_customer_product_price.fk_customer_product" => 33
        //    to get customer_number & product_number
        // 3. create DTO for all prices
        // 4. using customer_number & product_number to create reference_key
        //      save new record in pyz_customer_product_price_storage table ?? entity manager
    }
}

<?php

namespace Pyz\Zed\CustomerProductPriceStorage\Business;

use Pyz\Zed\CustomerProductPriceStorage\Business\Writer\CustomerProductPriceStorageWriter;

/**
 * Class CustomerProductPriceStorageBusinessFactory
 * @package Pyz\Zed\CustomerProductPriceStorage\Business
 */
class CustomerProductPriceStorageBusinessFactory
{
    /**
     * @return CustomerProductPriceStorageWriter
     */
    public function createStorageWriter()
    {
        return new CustomerProductPriceStorageWriter();
    }
}

<?php

namespace Pyz\Zed\CustomerProductPriceStorage\Persistence;

use Generated\Shared\Transfer\CustomerProductPriceStorageTransfer ;
use Spryker\Zed\Kernel\Persistence\AbstractEntityManager;

/**
 * Class CustomerProductPriceEntityManager
 * @package Pyz\Zed\CustomerProductPriceStorage\Persistence
 */
class CustomerProductPriceStorageEntityManager extends AbstractEntityManager implements CustomerProductPriceStorageEntityManagerInterface
{
    /**
     * @param CustomerProductPriceStorageTransfer $customerProductPriceStorageTransfer
     *
     * @return mixed|void
     */
    public function saveCustomerProductPriceStorage(CustomerProductPriceStorageTransfer $customerProductPriceStorageTransfer)
    {
        // TO DO
    }
}

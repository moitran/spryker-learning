<?php

/**
 * This file is part of the Spryker Commerce OS.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\CustomerProductPriceStorage\Persistence;

use Generated\Shared\Transfer\CustomerProductPriceStorageTransfer;

/**
 * Interface CustomerProductPriceStorageEntityManagerInterface
 *
 * @package Pyz\Zed\CustomerProductPriceStorage\Persistence
 */
interface CustomerProductPriceStorageEntityManagerInterface
{
    /**
     * @param \Generated\Shared\Transfer\CustomerProductPriceStorageTransfer $customerProductPriceStorageTransfer
     *
     * @return mixed
     */
    public function saveCustomerProductPriceStorage(
        CustomerProductPriceStorageTransfer $customerProductPriceStorageTransfer
    );
}

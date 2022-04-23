<?php

/**
 * This file is part of the Spryker Commerce OS.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\CustomerProductPriceStorage\Persistence;

use Generated\Shared\Transfer\CustomerProductTransfer;

/**
 * Interface CustomerProductPriceStorageRepositoryInterface
 *
 * @package Pyz\Zed\CustomerProductPriceStorage\Persistence
 */
interface CustomerProductPriceStorageRepositoryInterface
{
    /**
     * @param int $id
     *
     * @return \Generated\Shared\Transfer\CustomerProductTransfer
     */
    public function getCustomerProductPriceById(int $id): CustomerProductTransfer;
}

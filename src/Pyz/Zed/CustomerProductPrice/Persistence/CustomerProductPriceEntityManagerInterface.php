<?php

/**
 * This file is part of the Spryker Commerce OS.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\CustomerProductPrice\Persistence;

use Generated\Shared\Transfer\CustomerProductTransfer;

/**
 * Interface CustomerProductPriceEntityManagerInterface
 *
 * @package Pyz\Zed\CustomerProductPrice\Persistence
 */
interface CustomerProductPriceEntityManagerInterface
{
    /**
     * @param \Generated\Shared\Transfer\CustomerProductTransfer $customerProductTransfer
     *
     * @return mixed
     */
    public function saveCustomerProductPrice(CustomerProductTransfer $customerProductTransfer);
}

<?php

/**
 * This file is part of the Spryker Commerce OS.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\CustomerProductPrice\Business;

use Generated\Shared\Transfer\CalculableObjectTransfer;
use Generated\Shared\Transfer\CustomerProductTransfer;

/**
 * Interface CustomerProductPriceFacadeInterface
 *
 * @package Pyz\Zed\CustomerProductPrice\Business
 */
interface CustomerProductPriceFacadeInterface
{
    /**
     * @param string $filePath
     *
     * @return bool
     */
    public function importFromJsonFile(string $filePath): bool;

    /**
     * @param \Generated\Shared\Transfer\CustomerProductTransfer $customerProductTransfer
     */
    public function saveCustomerProductPrice(CustomerProductTransfer $customerProductTransfer);

    /**
     * @param \Generated\Shared\Transfer\CalculableObjectTransfer $calculableObjectTransfer
     */
    public function recalculate(CalculableObjectTransfer $calculableObjectTransfer);
}

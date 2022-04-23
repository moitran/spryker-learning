<?php

/**
 * This file is part of the Spryker Commerce OS.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\CustomerProductPriceStorage\Business;

use Generated\Shared\Transfer\EventEntityTransfer;

/**
 * Class CustomerProductPriceStorageBusinessFactory
 *
 * @package Pyz\Zed\CustomerProductPriceStorage\Business
 */
interface CustomerProductPriceStorageFacadeInterface
{
    /**
     * @param \Generated\Shared\Transfer\EventEntityTransfer $transfer
     */
    public function publish(EventEntityTransfer $transfer): void;
}

<?php

/**
 * This file is part of the Spryker Commerce OS.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\CustomerProductPriceStorage\Business\Publisher;

use Generated\Shared\Transfer\EventEntityTransfer;

/**
 * Interface StoragePublisherInterface
 *
 * @package Pyz\Zed\CustomerProductPriceStorage\Business\Publisher
 */
interface StoragePublisherInterface
{
    public function publish(EventEntityTransfer $eventEntityTransfer);
}

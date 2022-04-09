<?php

namespace Pyz\Zed\CustomerProductPriceStorage\Business\Publisher;

use Generated\Shared\Transfer\EventEntityTransfer;

/**
 * Interface StoragePublisherInterface
 * @package Pyz\Zed\CustomerProductPriceStorage\Business\Publisher
 */
interface StoragePublisherInterface
{
    public function publish(EventEntityTransfer $eventEntityTransfer);
}

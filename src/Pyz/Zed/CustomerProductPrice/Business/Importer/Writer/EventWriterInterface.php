<?php

namespace Pyz\Zed\CustomerProductPrice\Business\Importer\Writer;

use Generated\Shared\Transfer\CustomerProductPriceCollectionTransfer;

/**
 * Interface EventWriterInterface
 * @package Pyz\Zed\CustomerProductPrice\Business\Importer\Writer
 */
interface EventWriterInterface
{
    /**
     * @param CustomerProductPriceCollectionTransfer $collectionTransfer
     *
     * @return mixed
     */
    public function writeCollection(CustomerProductPriceCollectionTransfer $collectionTransfer): bool;
}

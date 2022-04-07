<?php

namespace Pyz\Zed\CustomerProductPrice\Business\Importer\Writer;

use Generated\Shared\Transfer\CustomerProductPriceCollectionTransfer;

/**
 * Interface DatabaseWriterInterface
 * @package Pyz\Zed\CustomerProductPrice\Business\Importer\Writer
 */
interface DatabaseWriterInterface
{
    /**
     * @param CustomerProductPriceCollectionTransfer $collectionTransfer
     *
     * @return mixed
     */
    public function writeCollection(CustomerProductPriceCollectionTransfer $collectionTransfer);
}

<?php

namespace Pyz\Zed\CustomerProductPrice\Business\Importer\Writer;

use Generated\Shared\Transfer\CustomerProductPriceCollectionTransfer;
use Generated\Shared\Transfer\CustomerProductTransfer;

/**
 * Interface WriterInterface
 * @package Pyz\Zed\CustomerProductPrice\Business\Importer\Writer
 */
interface WriterInterface
{
    /**
     * @param CustomerProductPriceCollectionTransfer $collectionTransfer
     *
     * @return mixed
     */
    public function writeCollection(CustomerProductPriceCollectionTransfer $collectionTransfer);

    /**
     * @param CustomerProductTransfer $customerProductTransfer
     */
    public function writeOne(CustomerProductTransfer $customerProductTransfer);
}

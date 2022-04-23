<?php

/**
 * This file is part of the Spryker Commerce OS.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\CustomerProductPrice\Business\Importer\Writer;

use Generated\Shared\Transfer\CustomerProductPriceCollectionTransfer;
use Generated\Shared\Transfer\CustomerProductTransfer;

/**
 * Interface WriterInterface
 *
 * @package Pyz\Zed\CustomerProductPrice\Business\Importer\Writer
 */
interface WriterInterface
{
    /**
     * @param \Generated\Shared\Transfer\CustomerProductPriceCollectionTransfer $collectionTransfer
     *
     * @return mixed
     */
    public function writeCollection(CustomerProductPriceCollectionTransfer $collectionTransfer);

    /**
     * @param \Generated\Shared\Transfer\CustomerProductTransfer $customerProductTransfer
     */
    public function writeOne(CustomerProductTransfer $customerProductTransfer);
}

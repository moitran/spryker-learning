<?php

/**
 * This file is part of the Spryker Commerce OS.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Client\CustomerProductPriceStorage\Reader;

use Generated\Shared\Transfer\CustomerProductPriceStoreTransfer;

/**
 * Interface CustomerProductPriceStorageReaderInterface
 *
 * @package Pyz\Client\CustomerProductPriceStorage\Reader
 */
interface CustomerProductPriceStorageReaderInterface
{
    /**
     * @param string $referenceKey
     *
     * @return \Generated\Shared\Transfer\CustomerProductPriceStoreTransfer
     */
    public function getPricesByReferenceKey(string $referenceKey): CustomerProductPriceStoreTransfer;
}

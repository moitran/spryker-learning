<?php

namespace Pyz\Client\CustomerProductPriceStorage\Reader;

use Generated\Shared\Transfer\CustomerProductPriceStoreTransfer;

/**
 * Interface CustomerProductPriceStorageReaderInterface
 * @package Pyz\Client\CustomerProductPriceStorage\Reader
 */
interface CustomerProductPriceStorageReaderInterface
{
    /**
     * @param string $referenceKey
     *
     * @return CustomerProductPriceStoreTransfer
     */
    public function getPricesByReferenceKey(string $referenceKey) : CustomerProductPriceStoreTransfer;
}

<?php

/**
 * This file is part of the Spryker Commerce OS.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Client\CustomerProductPriceStorage\Reader;

use Generated\Shared\Transfer\CustomerProductPriceStoreTransfer;
use Spryker\Client\Storage\StorageClientInterface;

/**
 * Class CustomerProductPriceStorageReader
 *
 * @package Pyz\Client\CustomerProductPriceStorage\Reader
 */
class CustomerProductPriceStorageReader implements CustomerProductPriceStorageReaderInterface
{
    /**
     * @var \Spryker\Client\Storage\StorageClientInterface
     */
    protected $storageClient;

    /**
     * @param \Spryker\Client\Storage\StorageClientInterface $storageClient
     */
    public function __construct(StorageClientInterface $storageClient)
    {
        $this->storageClient = $storageClient;
    }

    /**
     * @param string $referenceKey
     *
     * @return \Generated\Shared\Transfer\CustomerProductPriceStoreTransfer
     */
    public function getPricesByReferenceKey(string $referenceKey): CustomerProductPriceStoreTransfer
    {
        $data = $this->storageClient->get($referenceKey);
        $customerProductPriceStoreTransfer = new CustomerProductPriceStoreTransfer();
        if (!empty($data)) {
            $customerProductPriceStoreTransfer->fromArray($data, true);
        }

        return $customerProductPriceStoreTransfer;
    }
}

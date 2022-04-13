<?php

namespace Pyz\Client\CustomerProductPriceStorage\Reader;

use Generated\Shared\Transfer\CustomerProductPriceStoreTransfer;
use Spryker\Client\Storage\StorageClientInterface;

/**
 * Class CustomerProductPriceStorageReader
 * @package Pyz\Client\CustomerProductPriceStorage\Reader
 */
class CustomerProductPriceStorageReader implements CustomerProductPriceStorageReaderInterface
{
    /**
     * @var StorageClientInterface
     */
    protected $storageClient;

    /**
     * CustomerProductPriceStorageReader constructor.
     *
     * @param StorageClientInterface $storageClient
     */
    public function __construct(StorageClientInterface $storageClient)
    {
        $this->storageClient = $storageClient;
    }

    /**
     * @param string $referenceKey
     *
     * @return CustomerProductPriceStoreTransfer
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

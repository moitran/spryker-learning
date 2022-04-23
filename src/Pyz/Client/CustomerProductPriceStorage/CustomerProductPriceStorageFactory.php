<?php

/**
 * This file is part of the Spryker Commerce OS.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Client\CustomerProductPriceStorage;

use Pyz\Client\CustomerProductPriceStorage\Expander\ProductViewExpander;
use Pyz\Client\CustomerProductPriceStorage\Expander\ProductViewExpanderInterface;
use Pyz\Client\CustomerProductPriceStorage\Reader\CustomerProductPriceStorageReader;
use Pyz\Client\CustomerProductPriceStorage\Reader\CustomerProductPriceStorageReaderInterface;
use Spryker\Client\Customer\CustomerClientInterface;
use Spryker\Client\Kernel\AbstractFactory;
use Spryker\Client\Storage\StorageClientInterface;

/**
 * Class CustomerProductPriceStorageFactory
 *
 * @package Pyz\Client\CustomerProductPriceStorage
 */
class CustomerProductPriceStorageFactory extends AbstractFactory
{
    /**
     * @return \Pyz\Client\CustomerProductPriceStorage\Expander\ProductViewExpanderInterface
     */
    public function createViewExpander(): ProductViewExpanderInterface
    {
        return new ProductViewExpander(
            $this->createCustomerProductPriceStorageReader(),
            $this->getCustomerClient(),
        );
    }

    /**
     * @return \Pyz\Client\CustomerProductPriceStorage\Reader\CustomerProductPriceStorageReaderInterface
     */
    protected function createCustomerProductPriceStorageReader(): CustomerProductPriceStorageReaderInterface
    {
        return new CustomerProductPriceStorageReader(
            $this->getStorageClient()
        );
    }

    /**
     * @return \Spryker\Client\Storage\StorageClientInterface
     */
    protected function getStorageClient(): StorageClientInterface
    {
        return $this->getProvidedDependency(CustomerProductPriceStorageDependencyProvider::CLIENT_STORAGE);
    }

    /**
     * @return \Spryker\Client\Customer\CustomerClientInterface
     */
    protected function getCustomerClient(): CustomerClientInterface
    {
        return $this->getProvidedDependency(CustomerProductPriceStorageDependencyProvider::CLIENT_CUSTOMER);
    }
}

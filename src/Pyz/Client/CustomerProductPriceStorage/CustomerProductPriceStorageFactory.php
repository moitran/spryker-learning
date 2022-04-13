<?php

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
 * @package Pyz\Client\CustomerProductPriceStorage
 */
class CustomerProductPriceStorageFactory extends AbstractFactory
{
    /**
     * @return ProductViewExpanderInterface
     * @throws \Spryker\Client\Kernel\Exception\Container\ContainerKeyNotFoundException
     */
    public function createViewExpander(): ProductViewExpanderInterface
    {
        return new ProductViewExpander(
            $this->createCustomerProductPriceStorageReader(),
            $this->getCustomerClient(),
        );
    }

    /**
     * @return CustomerProductPriceStorageReaderInterface
     * @throws \Spryker\Client\Kernel\Exception\Container\ContainerKeyNotFoundException
     */
    protected function createCustomerProductPriceStorageReader(): CustomerProductPriceStorageReaderInterface
    {
        return new CustomerProductPriceStorageReader(
            $this->getStorageClient()
        );
    }

    /**
     * @return StorageClientInterface
     * @throws \Spryker\Client\Kernel\Exception\Container\ContainerKeyNotFoundException
     */
    protected function getStorageClient(): StorageClientInterface
    {
        return $this->getProvidedDependency(CustomerProductPriceStorageDependencyProvider::CLIENT_STORAGE);
    }

    /**
     * @return CustomerClientInterface
     * @throws \Spryker\Client\Kernel\Exception\Container\ContainerKeyNotFoundException
     */
    protected function getCustomerClient(): CustomerClientInterface
    {
        return $this->getProvidedDependency(CustomerProductPriceStorageDependencyProvider::CLIENT_CUSTOMER);
    }
}

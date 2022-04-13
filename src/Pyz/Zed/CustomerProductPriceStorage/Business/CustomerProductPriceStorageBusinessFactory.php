<?php

namespace Pyz\Zed\CustomerProductPriceStorage\Business;

use Pyz\Zed\CustomerProductPriceStorage\Business\Converter\ConverterInterface;
use Pyz\Zed\CustomerProductPriceStorage\Business\Converter\Converter;
use Pyz\Zed\CustomerProductPriceStorage\Business\Publisher\StoragePublisher;
use Pyz\Zed\CustomerProductPriceStorage\Business\Publisher\StoragePublisherInterface;
use Pyz\Zed\CustomerProductPriceStorage\Persistence\CustomerProductPriceStorageEntityManager;
use Pyz\Zed\CustomerProductPriceStorage\Persistence\CustomerProductPriceStorageRepositoryInterface;
use Spryker\Zed\Kernel\Business\AbstractBusinessFactory;

/**
 * Class CustomerProductPriceStorageBusinessFactory
 * @package Pyz\Zed\CustomerProductPriceStorage\Business
 * @method CustomerProductPriceStorageEntityManager getEntityManager()
 * @method CustomerProductPriceStorageRepositoryInterface getRepository()
 */
class CustomerProductPriceStorageBusinessFactory extends AbstractBusinessFactory
{
    /**
     * @return StoragePublisherInterface
     */
    public function createStoragePublisher(): StoragePublisherInterface
    {
        return new StoragePublisher(
            $this->createCustomerProductPriceStorageRepository(),
            $this->getEntityManager(),
            $this->createConverter()
        );
    }

    /**
     * @return CustomerProductPriceStorageRepositoryInterface
     */
    public function createCustomerProductPriceStorageRepository(): CustomerProductPriceStorageRepositoryInterface
    {
        return $this->getRepository();
    }

    /**
     * @return ConverterInterface
     */
    protected function createConverter(): ConverterInterface
    {
        return new Converter();
    }
}

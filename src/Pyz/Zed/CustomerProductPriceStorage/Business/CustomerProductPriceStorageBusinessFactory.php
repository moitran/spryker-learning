<?php

namespace Pyz\Zed\CustomerProductPriceStorage\Business;

use Pyz\Zed\CustomerProductPriceStorage\Business\Parser\CustomerProductEntityToDtoParser;
use Pyz\Zed\CustomerProductPriceStorage\Business\Parser\CustomerProductEntityToDtoParserInterface;
use Pyz\Zed\CustomerProductPriceStorage\Business\Publisher\StoragePublisher;
use Pyz\Zed\CustomerProductPriceStorage\Business\Publisher\StoragePublisherInterface;
use Pyz\Zed\CustomerProductPriceStorage\Persistence\CustomerProductPriceStorageEntityManager;
use Pyz\Zed\CustomerProductPriceStorage\Persistence\CustomerProductPriceStorageRepository;
use Pyz\Zed\CustomerProductPriceStorage\Persistence\CustomerProductPriceStorageRepositoryInterface;
use Spryker\Zed\Kernel\Business\AbstractBusinessFactory;

/**
 * Class CustomerProductPriceStorageBusinessFactory
 * @package Pyz\Zed\CustomerProductPriceStorage\Business
 * @method CustomerProductPriceStorageEntityManager getEntityManager()
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
            $this->createCustomerProductEntityToDtoParser()
        );
    }

    /**
     * @return CustomerProductPriceStorageRepositoryInterface
     */
    public function createCustomerProductPriceStorageRepository(): CustomerProductPriceStorageRepositoryInterface
    {
        return new CustomerProductPriceStorageRepository();
    }

    /**
     * @return CustomerProductEntityToDtoParserInterface
     */
    protected function createCustomerProductEntityToDtoParser(): CustomerProductEntityToDtoParserInterface
    {
        return new CustomerProductEntityToDtoParser();
    }
}

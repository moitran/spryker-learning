<?php

namespace Pyz\Zed\CustomerProductPriceStorage\Business\Publisher;

use Generated\Shared\Transfer\EventEntityTransfer;
use Pyz\Zed\CustomerProductPriceStorage\Business\Converter\ConverterInterface;
use Pyz\Zed\CustomerProductPriceStorage\Persistence\CustomerProductPriceStorageEntityManager;
use Pyz\Zed\CustomerProductPriceStorage\Persistence\CustomerProductPriceStorageRepositoryInterface;

/**
 * Class StoragePublisher
 * @package Pyz\Zed\CustomerProductPriceStorage\Business\Publisher
 */
class StoragePublisher implements StoragePublisherInterface
{
    /**
     * @var CustomerProductPriceStorageRepositoryInterface
     */
    protected $customerProductPriceStorageRepository;

    /**
     * @var CustomerProductPriceStorageEntityManager
     */
    protected $entityManager;

    /**
     * @var ConverterInterface
     */
    protected $converter;

    /**
     * StoragePublisher constructor.
     *
     * @param CustomerProductPriceStorageRepositoryInterface $customerProductPriceStorageRepository
     * @param CustomerProductPriceStorageEntityManager $entityManager
     * @param ConverterInterface $converter
     */
    public function __construct(
        CustomerProductPriceStorageRepositoryInterface $customerProductPriceStorageRepository,
        CustomerProductPriceStorageEntityManager $entityManager,
        ConverterInterface $converter
    ) {
        $this->customerProductPriceStorageRepository = $customerProductPriceStorageRepository;
        $this->entityManager = $entityManager;
        $this->converter = $converter;
    }

    /**
     * @param EventEntityTransfer $eventEntityTransfer
     *
     * @throws \Propel\Runtime\Exception\PropelException
     * @throws \Spryker\Zed\Propel\Business\Exception\AmbiguousComparisonException
     */
    public function publish(EventEntityTransfer $eventEntityTransfer)
    {
        $customerProductTransfer = $this->customerProductPriceStorageRepository
            ->getCustomerProductPriceById($eventEntityTransfer->getId());

        if (empty($customerProductTransfer->getProductNumber())) {
            return;
        }

        $customerProductPriceStorageTransfer = $this->converter->convert($customerProductTransfer);

        $this->entityManager->saveCustomerProductPriceStorage($customerProductPriceStorageTransfer);
    }
}

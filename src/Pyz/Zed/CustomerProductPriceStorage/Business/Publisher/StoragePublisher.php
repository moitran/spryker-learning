<?php

/**
 * This file is part of the Spryker Commerce OS.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\CustomerProductPriceStorage\Business\Publisher;

use Generated\Shared\Transfer\EventEntityTransfer;
use Pyz\Zed\CustomerProductPriceStorage\Business\Converter\ConverterInterface;
use Pyz\Zed\CustomerProductPriceStorage\Persistence\CustomerProductPriceStorageEntityManager;
use Pyz\Zed\CustomerProductPriceStorage\Persistence\CustomerProductPriceStorageRepositoryInterface;

/**
 * Class StoragePublisher
 *
 * @package Pyz\Zed\CustomerProductPriceStorage\Business\Publisher
 */
class StoragePublisher implements StoragePublisherInterface
{
    /**
     * @var \Pyz\Zed\CustomerProductPriceStorage\Persistence\CustomerProductPriceStorageRepositoryInterface
     */
    protected $customerProductPriceStorageRepository;

    /**
     * @var \Pyz\Zed\CustomerProductPriceStorage\Persistence\CustomerProductPriceStorageEntityManager
     */
    protected $entityManager;

    /**
     * @var \Pyz\Zed\CustomerProductPriceStorage\Business\Converter\ConverterInterface
     */
    protected $converter;

    /**
     * @param \Pyz\Zed\CustomerProductPriceStorage\Persistence\CustomerProductPriceStorageRepositoryInterface $customerProductPriceStorageRepository
     * @param \Pyz\Zed\CustomerProductPriceStorage\Persistence\CustomerProductPriceStorageEntityManager $entityManager
     * @param \Pyz\Zed\CustomerProductPriceStorage\Business\Converter\ConverterInterface $converter
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
     * @param \Generated\Shared\Transfer\EventEntityTransfer $eventEntityTransfer
     *
     * @return void
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

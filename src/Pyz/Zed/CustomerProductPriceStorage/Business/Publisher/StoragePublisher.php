<?php

namespace Pyz\Zed\CustomerProductPriceStorage\Business\Publisher;

use Generated\Shared\Transfer\EventEntityTransfer;
use Pyz\Zed\CustomerProductPriceStorage\Business\Parser\CustomerProductEntityToDtoParserInterface;
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
     * @var CustomerProductEntityToDtoParserInterface
     */
    protected $parser;

    /**
     * StoragePublisher constructor.
     *
     * @param CustomerProductPriceStorageRepositoryInterface $customerProductPriceStorageRepository
     * @param CustomerProductPriceStorageEntityManager $entityManager
     * @param CustomerProductEntityToDtoParserInterface $parser
     */
    public function __construct(
        CustomerProductPriceStorageRepositoryInterface $customerProductPriceStorageRepository,
        CustomerProductPriceStorageEntityManager $entityManager,
        CustomerProductEntityToDtoParserInterface $parser
    ) {
        $this->customerProductPriceStorageRepository = $customerProductPriceStorageRepository;
        $this->entityManager = $entityManager;
        $this->parser = $parser;
    }

    /**
     * @param EventEntityTransfer $eventEntityTransfer
     *
     * @throws \Propel\Runtime\Exception\PropelException
     * @throws \Spryker\Zed\Propel\Business\Exception\AmbiguousComparisonException
     */
    public function publish(EventEntityTransfer $eventEntityTransfer)
    {
        $customerProductPrice = $this->customerProductPriceStorageRepository
            ->getCustomerProductPriceById($eventEntityTransfer->getId());

        if (!$customerProductPrice) {
            return;
        }

        $this->entityManager->saveCustomerProductPriceStorage(
            $this->parser->parse($customerProductPrice->getPyzCustomerProduct())
        );
    }
}

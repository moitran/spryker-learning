<?php


namespace Pyz\Zed\CustomerProductPrice\Business\Importer\Writer;

use Generated\Shared\Transfer\CustomerProductPriceCollectionTransfer;
use Generated\Shared\Transfer\CustomerProductTransfer;
use Pyz\Zed\CustomerProductPrice\Persistence\CustomerProductPriceEntityManager;

/**
 * Class DatabaseWriter
 * @package Pyz\Zed\CustomerProductPrice\Business\Importer\Writer
 */
class DatabaseWriter implements DatabaseWriterInterface
{
    /**
     * @var CustomerProductPriceEntityManager
     */
    protected $entityManager;

    /**
     * DatabaseWriter constructor.
     *
     * @param CustomerProductPriceEntityManager $entityManager
     */
    public function __construct(CustomerProductPriceEntityManager $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    /**
     * @param CustomerProductPriceCollectionTransfer $collectionTransfer
     *
     * @return mixed|void
     */
    public function writeCollection(CustomerProductPriceCollectionTransfer $collectionTransfer)
    {
        try {
            foreach ($collectionTransfer->getCustomerProducts() as $customerProduct) {
                $this->writeOne($customerProduct);
            }
        } catch (\Throwable $exception) {
            return false;
        }

        return true;
    }

    /**
     * @param CustomerProductTransfer $customerProductTransfer
     *
     * @throws \Propel\Runtime\Exception\PropelException
     */
    public function writeOne(CustomerProductTransfer $customerProductTransfer)
    {
        $this->entityManager->saveCustomerProductPrice($customerProductTransfer);
    }
}

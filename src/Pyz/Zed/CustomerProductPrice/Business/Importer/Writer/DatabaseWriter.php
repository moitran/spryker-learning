<?php

/**
 * This file is part of the Spryker Commerce OS.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\CustomerProductPrice\Business\Importer\Writer;

use Generated\Shared\Transfer\CustomerProductPriceCollectionTransfer;
use Generated\Shared\Transfer\CustomerProductTransfer;
use Pyz\Zed\CustomerProductPrice\Persistence\CustomerProductPriceEntityManager;
use Throwable;

/**
 * Class DatabaseWriter
 *
 * @package Pyz\Zed\CustomerProductPrice\Business\Importer\Writer
 */
class DatabaseWriter implements WriterInterface
{
    /**
     * @var \Pyz\Zed\CustomerProductPrice\Persistence\CustomerProductPriceEntityManager
     */
    protected $entityManager;

    /**
     * @param \Pyz\Zed\CustomerProductPrice\Persistence\CustomerProductPriceEntityManager $entityManager
     */
    public function __construct(CustomerProductPriceEntityManager $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    /**
     * @param \Generated\Shared\Transfer\CustomerProductPriceCollectionTransfer $collectionTransfer
     *
     * @return bool|mixed
     */
    public function writeCollection(CustomerProductPriceCollectionTransfer $collectionTransfer)
    {
        try {
            foreach ($collectionTransfer->getCustomerProducts() as $customerProduct) {
                $this->writeOne($customerProduct);
            }
        } catch (Throwable $exception) {
            return false;
        }

        return true;
    }

    /**
     * @param \Generated\Shared\Transfer\CustomerProductTransfer $customerProductTransfer
     *
     * @return void
     */
    public function writeOne(CustomerProductTransfer $customerProductTransfer)
    {
        $this->entityManager->saveCustomerProductPrice($customerProductTransfer);
    }
}

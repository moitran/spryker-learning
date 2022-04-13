<?php

namespace Pyz\Zed\CustomerProductPriceStorage\Persistence;

use Generated\Shared\Transfer\CustomerProductPriceStorageTransfer;
use Spryker\Zed\Kernel\Persistence\AbstractEntityManager;

/**
 * Class CustomerProductPriceEntityManager
 * @package Pyz\Zed\CustomerProductPriceStorage\Persistence
 * @method CustomerProductPriceStoragePersistenceFactory getFactory()
 */
class CustomerProductPriceStorageEntityManager extends AbstractEntityManager implements CustomerProductPriceStorageEntityManagerInterface
{
    /**
     * @param CustomerProductPriceStorageTransfer $customerProductPriceStorageTransfer
     *
     * @return mixed|void
     * @throws \Propel\Runtime\Exception\PropelException
     * @throws \Spryker\Zed\Propel\Business\Exception\AmbiguousComparisonException
     */
    public function saveCustomerProductPriceStorage(
        CustomerProductPriceStorageTransfer $customerProductPriceStorageTransfer
    ) {
        $customerProductPriceStorageEntity = $this->getFactory()->createCustomerProductPriceStorageQuery()
            ->filterByReferenceCustomerProduct($customerProductPriceStorageTransfer->getReference())
            ->findOneOrCreate();
        $customerProductPriceStorageEntity->setData($customerProductPriceStorageTransfer->getData()->toArray());
        if ($customerProductPriceStorageEntity->isNew() || $customerProductPriceStorageEntity->isModified()) {
            $customerProductPriceStorageEntity->save();
        }
    }
}

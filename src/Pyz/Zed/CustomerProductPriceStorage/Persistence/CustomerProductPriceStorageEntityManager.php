<?php

namespace Pyz\Zed\CustomerProductPriceStorage\Persistence;

use Generated\Shared\Transfer\CustomerProductPriceStorageTransfer;
use Orm\Zed\CustomerProductPriceStorage\Persistence\PyzCustomerProductPriceStorageQuery;
use Spryker\Zed\Kernel\Persistence\AbstractEntityManager;

/**
 * Class CustomerProductPriceEntityManager
 * @package Pyz\Zed\CustomerProductPriceStorage\Persistence
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
        $customerProductPriceStorageEntity = PyzCustomerProductPriceStorageQuery::create()
            ->filterByReferenceCustomerProduct($customerProductPriceStorageTransfer->getReference())
            ->findOneOrCreate();
        $customerProductPriceStorageEntity->setData($customerProductPriceStorageTransfer->getData()->toArray());
        if ($customerProductPriceStorageEntity->isNew() || $customerProductPriceStorageEntity->isModified()) {
            $customerProductPriceStorageEntity->save();
        }
    }
}

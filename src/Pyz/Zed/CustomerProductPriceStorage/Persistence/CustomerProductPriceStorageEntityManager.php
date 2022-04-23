<?php

/**
 * This file is part of the Spryker Commerce OS.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\CustomerProductPriceStorage\Persistence;

use Generated\Shared\Transfer\CustomerProductPriceStorageTransfer;
use Spryker\Zed\Kernel\Persistence\AbstractEntityManager;

/**
 * Class CustomerProductPriceEntityManager
 *
 * @package Pyz\Zed\CustomerProductPriceStorage\Persistence
 * @method \Pyz\Zed\CustomerProductPriceStorage\Persistence\CustomerProductPriceStoragePersistenceFactory getFactory()
 */
class CustomerProductPriceStorageEntityManager extends AbstractEntityManager implements CustomerProductPriceStorageEntityManagerInterface
{
    /**
     * @param \Generated\Shared\Transfer\CustomerProductPriceStorageTransfer $customerProductPriceStorageTransfer
     *
     * @return mixed|void
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

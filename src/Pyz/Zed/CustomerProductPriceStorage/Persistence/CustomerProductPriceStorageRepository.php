<?php

/**
 * This file is part of the Spryker Commerce OS.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\CustomerProductPriceStorage\Persistence;

use Generated\Shared\Transfer\CustomerProductPriceTransfer;
use Generated\Shared\Transfer\CustomerProductTransfer;
use Spryker\Zed\Kernel\Persistence\AbstractRepository;

/**
 * Class CustomerProductPriceStorageRepository
 *
 * @package Pyz\Zed\CustomerProductPriceStorage\Persistence
 * @method \Pyz\Zed\CustomerProductPriceStorage\Persistence\CustomerProductPriceStoragePersistenceFactory getFactory()
 */
class CustomerProductPriceStorageRepository extends AbstractRepository implements CustomerProductPriceStorageRepositoryInterface
{
    /**
     * @param int $id
     *
     * @return \Generated\Shared\Transfer\CustomerProductTransfer
     */
    public function getCustomerProductPriceById(int $id): CustomerProductTransfer
    {
        $customerProductQuery = $this->getFactory()->getCustomerProductPriceQueryContainer()->getCustomerProductPriceQuery();
        $customerProductPrice = $customerProductQuery->filterByIdCustomerProductPrice($id)->findOne();

        $customerProductTransfer = new CustomerProductTransfer();
        if (!$customerProductPrice) {
            return $customerProductTransfer;
        }
        $customerProductTransfer->fromArray($customerProductPrice->getPyzCustomerProduct()->toArray(), true);
        foreach ($customerProductPrice->getPyzCustomerProduct()->getPyzCustomerProductPrices() as $price) {
            $customerProductPriceTransfer = new CustomerProductPriceTransfer();
            $customerProductPriceTransfer->fromArray($price->toArray(), true);
            $customerProductTransfer->addCustomerProductPrice($customerProductPriceTransfer);
        }

        return $customerProductTransfer;
    }
}

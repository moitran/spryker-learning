<?php

namespace Pyz\Zed\CustomerProductPriceStorage\Persistence;

use Generated\Shared\Transfer\CustomerProductPriceStoreTransfer;
use Generated\Shared\Transfer\CustomerProductPriceTransfer;
use Generated\Shared\Transfer\CustomerProductTransfer;
use Spryker\Zed\Kernel\Persistence\AbstractRepository;

/**
 * Class CustomerProductPriceStorageRepository
 * @package Pyz\Zed\CustomerProductPriceStorage\Persistence
 * @method CustomerProductPriceStoragePersistenceFactory getFactory()
 */
class CustomerProductPriceStorageRepository extends AbstractRepository implements CustomerProductPriceStorageRepositoryInterface
{
    /**
     * @param int $id
     *
     * @return CustomerProductTransfer
     * @throws \Propel\Runtime\Exception\PropelException
     * @throws \Spryker\Zed\Propel\Business\Exception\AmbiguousComparisonException
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

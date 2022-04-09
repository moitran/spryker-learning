<?php

namespace Pyz\Zed\CustomerProductPriceStorage\Persistence;

use Orm\Zed\CustomerProductPrice\Persistence\PyzCustomerProductPrice;
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
     * @return PyzCustomerProductPrice
     * @throws \Spryker\Zed\Propel\Business\Exception\AmbiguousComparisonException
     */
    public function getCustomerProductPriceById(int $id): PyzCustomerProductPrice
    {
        $customerProductQuery = $this->getFactory()->getCustomerProductPriceQueryContainer()->getCustomerProductPriceQuery();

        return $customerProductQuery->filterByIdCustomerProductPrice($id)->findOne();
    }
}

<?php

namespace Pyz\Zed\CustomerProductPrice\Persistence;

use Generated\Shared\Transfer\CustomerProductPriceTransfer;
use Orm\Zed\CustomerProductPrice\Persistence\PyzCustomerProduct;
use Orm\Zed\CustomerProductPrice\Persistence\PyzCustomerProductPrice;
use Propel\Runtime\Collection\ObjectCollection;
use Spryker\Zed\Kernel\Persistence\AbstractRepository;
use Spryker\Zed\PropelOrm\Business\Runtime\ActiveQuery\Criteria;

/**
 * Class CustomerProductPriceRepository
 * @package Pyz\Zed\CustomerProductPrice\Persistence
 * @method CustomerProductPricePersistenceFactory getFactory()
 */
class CustomerProductPriceRepository extends AbstractRepository implements CustomerProductPriceRepositoryInterface
{
    /**
     * @param array $skus
     * @param string $customerNumber
     *
     * @return array
     * @throws \Propel\Runtime\Exception\PropelException
     * @throws \Spryker\Zed\Propel\Business\Exception\AmbiguousComparisonException
     */
    public function fetchPricesForSkus(array $skus, string $customerNumber): array
    {
        $query = $this->getFactory()->createCustomerProductQuery()
            ->filterByProductNumber_In($skus)
            ->filterByCustomerNumber($customerNumber);

        $query->joinWithPyzCustomerProductPrice(Criteria::LEFT_JOIN);
        $records = $query->find();

        return $this->formatTransfer($records);
    }

    /**
     * @param ObjectCollection $records
     *
     * @return array
     * @throws \Propel\Runtime\Exception\PropelException
     */
    protected function formatTransfer(ObjectCollection $records): array
    {
        $skuToPrices = [];

        /**
         * @var PyzCustomerProduct $customerProduct
         */
        foreach ($records->getData() as $customerProduct) {
            $skuToPrices[$customerProduct->getProductNumber()] = $this->convertPricestoDto($customerProduct->getPyzCustomerProductPrices());
        }

        return $skuToPrices;
    }

    /**
     * @param ObjectCollection $customerProductPrices
     *
     * @return array
     */
    protected function convertPricesToDto(ObjectCollection $customerProductPrices): array
    {
        $prices = [];

        /**
         * @var PyzCustomerProductPrice $customerProductPrice
         */
        foreach ($customerProductPrices as $customerProductPrice) {
            $price = new CustomerProductPriceTransfer();
            $price->fromArray($customerProductPrice->toArray(), true);
            $prices[] = $price;
        }

        return $prices;
    }
}

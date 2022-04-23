<?php

/**
 * This file is part of the Spryker Commerce OS.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\CustomerProductPrice\Persistence;

use Generated\Shared\Transfer\CustomerProductPriceTransfer;
use Propel\Runtime\Collection\ObjectCollection;
use Spryker\Zed\Kernel\Persistence\AbstractRepository;
use Spryker\Zed\PropelOrm\Business\Runtime\ActiveQuery\Criteria;

/**
 * Class CustomerProductPriceRepository
 *
 * @package Pyz\Zed\CustomerProductPrice\Persistence
 * @method \Pyz\Zed\CustomerProductPrice\Persistence\CustomerProductPricePersistenceFactory getFactory()
 */
class CustomerProductPriceRepository extends AbstractRepository implements CustomerProductPriceRepositoryInterface
{
    /**
     * @param array $skus
     * @param string $customerNumber
     *
     * @return array
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
     * @param \Propel\Runtime\Collection\ObjectCollection $records
     *
     * @return array
     */
    protected function formatTransfer(ObjectCollection $records): array
    {
        $skuToPrices = [];

        /**
         * @var \Orm\Zed\CustomerProductPrice\Persistence\PyzCustomerProduct $customerProduct
         */
        foreach ($records->getData() as $customerProduct) {
            $skuToPrices[$customerProduct->getProductNumber()] = $this->convertPricestoDto($customerProduct->getPyzCustomerProductPrices());
        }

        return $skuToPrices;
    }

    /**
     * @param \Propel\Runtime\Collection\ObjectCollection $customerProductPrices
     *
     * @return array
     */
    protected function convertPricesToDto(ObjectCollection $customerProductPrices): array
    {
        $prices = [];

        /**
         * @var \Orm\Zed\CustomerProductPrice\Persistence\PyzCustomerProductPrice $customerProductPrice
         */
        foreach ($customerProductPrices as $customerProductPrice) {
            $price = new CustomerProductPriceTransfer();
            $price->fromArray($customerProductPrice->toArray(), true);
            $prices[] = $price;
        }

        return $prices;
    }
}

<?php

namespace Pyz\Zed\CustomerProductPriceSearch\Persistence;

use Generated\Shared\Transfer\CustomerProductPriceCollectionTransfer;
use Generated\Shared\Transfer\CustomerProductPriceTransfer;
use Generated\Shared\Transfer\CustomerProductTransfer;
use Orm\Zed\CustomerProductPrice\Persistence\PyzCustomerProduct;
use Orm\Zed\Product\Persistence\Map\SpyProductTableMap;
use Spryker\Zed\Kernel\Persistence\AbstractRepository;
use Spryker\Zed\PropelOrm\Business\Runtime\ActiveQuery\Criteria;

/**
 * Class CustomerProductPriceSearchRepository
 * @package Pyz\Zed\CustomerProductPriceSearch\Persistence
 * @method CustomerProductPriceSearchPersistenceFactory getFactory()
 */
class CustomerProductPriceSearchRepository extends AbstractRepository implements CustomerProductPriceSearchRepositoryInterface
{
    /**
     * @param array $abstractIds
     *
     * @return array
     * @throws \Propel\Runtime\Exception\PropelException
     */
    public function findSkusByAbstractIds(array $abstractIds): array
    {
        // query on spy_product
        $query = $this->getFactory()->getProductQueryContainer()->queryProduct();

        // filter by abstract id + selecting sku & abstract_id
        $query->filterByFkProductAbstract_In($abstractIds);
        $query->select([
            SpyProductTableMap::COL_SKU,
            SpyProductTableMap::COL_FK_PRODUCT_ABSTRACT,
        ]);

        // transform to array
        $records = $query->find();
        $data = $records->getData();

        $skuCol = array_column($data, SpyProductTableMap::COL_SKU);
        $abstractCol = array_column($data, SpyProductTableMap::COL_FK_PRODUCT_ABSTRACT);

        // return array
        return array_combine($skuCol, $abstractCol);
    }

    /**
     * @param array $skus
     *
     * @return CustomerProductPriceCollectionTransfer
     * @throws \Propel\Runtime\Exception\PropelException
     */
    public function findCustomerProductPricesBySkus(array $skus): CustomerProductPriceCollectionTransfer
    {
        // query on pyz_customer_product
        $query = $this->getFactory()->getCustomerProductPriceQueryContainer()
            ->getCustomerProductQuery()
            ->filterByProductNumber_In($skus);

        // join with pyz_customer_product_prices
        $query->joinWithPyzCustomerProductPrice(Criteria::LEFT_JOIN);

        // transform to DTO
        $records = $query->find();
        $customerProductPriceCollectionTransfer = new CustomerProductPriceCollectionTransfer();

        if ($records->count() === 0) {
            return $customerProductPriceCollectionTransfer;
        }

        $data = $records->getData();

        /** @var PyzCustomerProduct $entry */
        foreach ($data as $entry) {
            $customerProductTransfer = new CustomerProductTransfer();
            $customerProductTransfer->fromArray($entry->toArray(), true);

            foreach ($entry->getPyzCustomerProductPrices() as $price) {
                $customerProductPriceTransfer = new CustomerProductPriceTransfer();
                $customerProductPriceTransfer->fromArray($price->toArray(), true);
                $customerProductTransfer->addCustomerProductPrice($customerProductPriceTransfer);
            }

            // add to collection
            $customerProductPriceCollectionTransfer->addCustomerProduct($customerProductTransfer);
        }

        // return collection
        return $customerProductPriceCollectionTransfer;
    }
}

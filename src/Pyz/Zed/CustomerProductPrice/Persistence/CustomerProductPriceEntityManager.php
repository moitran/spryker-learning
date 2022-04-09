<?php

namespace Pyz\Zed\CustomerProductPrice\Persistence;

use Generated\Shared\Transfer\CustomerProductPriceTransfer;
use Generated\Shared\Transfer\CustomerProductTransfer;
use Orm\Zed\CustomerProductPrice\Persistence\PyzCustomerProductPriceQuery;
use Orm\Zed\CustomerProductPrice\Persistence\PyzCustomerProductQuery;
use Spryker\Zed\Kernel\Persistence\AbstractEntityManager;

/**
 * Class CustomerProductPriceEntityManager
 * @package Pyz\Zed\CustomerProductPrice\Persistence
 */
class CustomerProductPriceEntityManager extends AbstractEntityManager implements CustomerProductPriceEntityManagerInterface
{
    /**
     * @param CustomerProductTransfer $customerProductTransfer
     *
     * @return mixed|void
     * @throws \Propel\Runtime\Exception\PropelException
     * @throws \Spryker\Zed\Propel\Business\Exception\AmbiguousComparisonException
     */
    public function saveCustomerProductPrice(CustomerProductTransfer $customerProductTransfer)
    {
        $customerProductEntity = PyzCustomerProductQuery::create()
            ->filterByCustomerNumber($customerProductTransfer->getCustomerNumber())
            ->filterByProductNumber($customerProductTransfer->getProductNumber())
            ->findOneOrCreate();
        $customerProductEntity->setProductNumber($customerProductTransfer->getProductNumber());
        $customerProductEntity->setCustomerNumber($customerProductTransfer->getCustomerNumber());

        /** @var CustomerProductPriceTransfer $customerProductPriceTransfer */
        $modifiedOrNewPrice = false;
        foreach ($customerProductTransfer->getCustomerProductPrices() as $customerProductPriceTransfer) {
            $customerProductPriceEntity = PyzCustomerProductPriceQuery::create()
                ->filterByPyzCustomerProduct($customerProductEntity)
                ->filterByQuantity($customerProductPriceTransfer->getQuantity())
                ->findOneOrCreate();
            // add new customer_product_price || update price for existed customer_product_price
            if ($customerProductPriceEntity->isNew() || $customerProductPriceEntity->getPrice() != $customerProductPriceTransfer->getPrice()) {
                $modifiedOrNewPrice = true;
            }
            $customerProductPriceEntity->setPrice($customerProductPriceTransfer->getPrice());
            $customerProductEntity->addPyzCustomerProductPrice($customerProductPriceEntity);
        };

        if ($customerProductEntity->isModified() || $customerProductEntity->isNew() || $modifiedOrNewPrice) {
            $customerProductEntity->save();
        }
    }
}

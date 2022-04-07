<?php

namespace Pyz\Zed\CustomerProductPrice\Persistence;

use Generated\Shared\Transfer\CustomerProductPriceTransfer;
use Generated\Shared\Transfer\CustomerProductTransfer;
use Orm\Zed\CustomerProductPrice\Persistence\PyzCustomerProduct;
use Orm\Zed\CustomerProductPrice\Persistence\PyzCustomerProductPrice;
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
     */
    public function saveCustomerProductPrice(CustomerProductTransfer $customerProductTransfer)
    {
        $entity = new PyzCustomerProduct();
        $entity->setProductNumber($customerProductTransfer->getProductNumber());
        $entity->setCustomerNumber($customerProductTransfer->getCustomerNumber());

        /** @var CustomerProductPriceTransfer $customerProductPrice */
        foreach ($customerProductTransfer->getCustomerProductPrices() as $customerProductPrice) {
            $priceEntity = new PyzCustomerProductPrice();
            $priceEntity->fromArray($customerProductPrice->toArray());
            $entity->addPyzCustomerProductPrice($priceEntity);
        }

        $entity->save();
    }
}

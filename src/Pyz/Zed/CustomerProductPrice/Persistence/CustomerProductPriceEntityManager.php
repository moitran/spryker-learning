<?php

namespace Pyz\Zed\CustomerProductPrice\Persistence;

use Generated\Shared\Transfer\CustomerProductTransfer;
use Generated\Shared\Transfer\CustomerProductPriceTransfer;
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
     * @return CustomerProductTransfer
     * @throws \Propel\Runtime\Exception\PropelException
     */
    public function saveCustomerProduct(CustomerProductTransfer $customerProductTransfer) : CustomerProductTransfer
    {
        $customerProductEntity = $this->getPyzCustomerProduct();
        $customerProductEntity->fromArray($customerProductTransfer->modifiedToArray());
        $customerProductEntity->save();
        $customerProductTransfer->fromArray($customerProductEntity->toArray(), true);

        return $customerProductTransfer;
    }

    /**
     * @param CustomerProductPriceTransfer $customerProductPriceTransfer
     *
     * @return CustomerProductPriceTransfer
     * @throws \Propel\Runtime\Exception\PropelException
     */
    public function saveCustomerProductPrice(CustomerProductPriceTransfer $customerProductPriceTransfer) : CustomerProductPriceTransfer
    {
        $customerProductPriceEntity = $this->getPyzCustomerProductPrice();
        $customerProductPriceEntity->fromArray($customerProductPriceTransfer->modifiedToArray());
        $customerProductPriceEntity->save();
        $customerProductPriceTransfer->fromArray($customerProductPriceEntity->toArray(), true);

        return $customerProductPriceTransfer;
    }

    /**
     * @return PyzCustomerProduct
     */
    protected function getPyzCustomerProduct()
    {
        return new PyzCustomerProduct();
    }

    /**
     * @return PyzCustomerProductPrice
     */
    protected function getPyzCustomerProductPrice()
    {
        return new PyzCustomerProductPrice();
    }
}

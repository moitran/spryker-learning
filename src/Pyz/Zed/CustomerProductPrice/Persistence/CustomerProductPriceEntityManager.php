<?php

namespace Pyz\Zed\CustomerProductPrice\Persistence;

use Generated\Shared\Transfer\PyzCustomerProductEntityTransfer;
use Generated\Shared\Transfer\PyzCustomerProductPriceEntityTransfer;
use Spryker\Zed\Kernel\Persistence\AbstractEntityManager;

/**
 * Class CustomerProductPriceEntityManager
 * @package Pyz\Zed\CustomerProductPrice\Persistence
 */
class CustomerProductPriceEntityManager extends AbstractEntityManager implements CustomerProductPriceEntityManagerInterface
{
    /**
     * @param PyzCustomerProductEntityTransfer $customerProductEntityTransfer
     *
     * @return PyzCustomerProductEntityTransfer
     * @throws \Propel\Runtime\Exception\PropelException
     */
    public function saveCustomerProduct(PyzCustomerProductEntityTransfer $customerProductEntityTransfer) : PyzCustomerProductEntityTransfer
    {
        $customerProductEntity = $this->getPyzCustomerProduct();
        $customerProductEntity->fromArray($customerProductEntityTransfer->modifiedToArray());
        $customerProductEntity->save();
        $customerProductEntityTransfer->fromArray($customerProductEntity->toArray(), true);

        return $customerProductEntityTransfer;
    }

    /**
     * @param PyzCustomerProductPriceEntityTransfer $customerProductPriceEntityTransfer
     *
     * @return PyzCustomerProductPriceEntityTransfer
     * @throws \Propel\Runtime\Exception\PropelException
     */
    public function saveCustomerProductPrice(PyzCustomerProductPriceEntityTransfer $customerProductPriceEntityTransfer) : PyzCustomerProductPriceEntityTransfer
    {
        $customerProductPriceEntity = $this->getPyzCustomerProductPrice();
        $customerProductPriceEntity->fromArray($customerProductPriceEntityTransfer->modifiedToArray());
        $customerProductPriceEntity->save();
        $customerProductPriceEntityTransfer->fromArray($customerProductPriceEntity->toArray(), true);

        return $customerProductPriceEntityTransfer;
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

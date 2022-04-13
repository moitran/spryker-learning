<?php

namespace Pyz\Zed\CustomerProductPrice\Persistence;

use Generated\Shared\Transfer\CustomerProductTransfer;
use Orm\Zed\CustomerProductPrice\Persistence\PyzCustomerProductPrice;
use Spryker\Zed\Kernel\Persistence\AbstractEntityManager;

/**
 * Class CustomerProductPriceEntityManager
 * @package Pyz\Zed\CustomerProductPrice\Persistence
 * @method CustomerProductPricePersistenceFactory getFactory()
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
        $customerProductEntity = $this->getFactory()->createCustomerProductQuery()
            ->filterByCustomerNumber($customerProductTransfer->getCustomerNumber())
            ->filterByProductNumber($customerProductTransfer->getProductNumber())
            ->findOneOrCreate();

        $customerProductEntity->getPyzCustomerProductPrices()->delete();

        foreach ($customerProductTransfer->getCustomerProductPrices() as $customerProductPriceTransfer) {
            $customerProductPriceEntity = new PyzCustomerProductPrice();
            $customerProductPriceEntity->fromArray($customerProductPriceTransfer->modifiedToArray());
            $customerProductEntity->addPyzCustomerProductPrice($customerProductPriceEntity);
        };

        $customerProductEntity->save();
    }
}

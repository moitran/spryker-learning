<?php

/**
 * This file is part of the Spryker Commerce OS.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\CustomerProductPrice\Persistence;

use Generated\Shared\Transfer\CustomerProductTransfer;
use Orm\Zed\CustomerProductPrice\Persistence\PyzCustomerProductPrice;
use Spryker\Zed\Kernel\Persistence\AbstractEntityManager;

/**
 * Class CustomerProductPriceEntityManager
 *
 * @package Pyz\Zed\CustomerProductPrice\Persistence
 * @method \Pyz\Zed\CustomerProductPrice\Persistence\CustomerProductPricePersistenceFactory getFactory()
 */
class CustomerProductPriceEntityManager extends AbstractEntityManager implements CustomerProductPriceEntityManagerInterface
{
    /**
     * @param \Generated\Shared\Transfer\CustomerProductTransfer $customerProductTransfer
     *
     * @return mixed|void
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
        }

        $customerProductEntity->save();
    }
}

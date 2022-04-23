<?php

/**
 * This file is part of the Spryker Commerce OS.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\CustomerProductPrice\Persistence;

use Orm\Zed\CustomerProductPrice\Persistence\PyzCustomerProductPriceQuery;
use Orm\Zed\CustomerProductPrice\Persistence\PyzCustomerProductQuery;
use Spryker\Zed\Kernel\Persistence\AbstractQueryContainer;

/**
 * Class CustomerProductPriceQueryContainerInterface
 *
 * @package Pyz\Zed\CustomerProductPrice\Persistence
 * @method \Pyz\Zed\CustomerProductPrice\Persistence\CustomerProductPricePersistenceFactory getFactory()
 */
class CustomerProductPriceQueryContainer extends AbstractQueryContainer implements CustomerProductPriceQueryContainerInterface
{
    /**
     * @return \Orm\Zed\CustomerProductPrice\Persistence\PyzCustomerProductPriceQuery
     */
    public function getCustomerProductPriceQuery(): PyzCustomerProductPriceQuery
    {
        return $this->getFactory()->createCustomerProductPriceQuery();
    }

    /**
     * @return \Orm\Zed\CustomerProductPrice\Persistence\PyzCustomerProductQuery
     */
    public function getCustomerProductQuery(): PyzCustomerProductQuery
    {
        return $this->getFactory()->createCustomerProductQuery();
    }
}

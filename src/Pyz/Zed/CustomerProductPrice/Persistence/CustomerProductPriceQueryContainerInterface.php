<?php

/**
 * This file is part of the Spryker Commerce OS.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\CustomerProductPrice\Persistence;

use Orm\Zed\CustomerProductPrice\Persistence\PyzCustomerProductPriceQuery;
use Orm\Zed\CustomerProductPrice\Persistence\PyzCustomerProductQuery;

/**
 * Class CustomerProductPriceQueryContainerInterface
 *
 * @package Pyz\Zed\CustomerProductPrice\Persistence
 */
interface CustomerProductPriceQueryContainerInterface
{
    /**
     * @return \Orm\Zed\CustomerProductPrice\Persistence\PyzCustomerProductPriceQuery
     */
    public function getCustomerProductPriceQuery(): PyzCustomerProductPriceQuery;

    /**
     * @return \Orm\Zed\CustomerProductPrice\Persistence\PyzCustomerProductQuery
     */
    public function getCustomerProductQuery(): PyzCustomerProductQuery;
}

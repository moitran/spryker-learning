<?php

/**
 * This file is part of the Spryker Commerce OS.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Client\CustomerProductPriceSearch;

use Spryker\Client\Customer\CustomerClientInterface;
use Spryker\Client\Kernel\AbstractFactory;

/**
 * Class CustomerProductPriceSearchFactory
 *
 * @package Pyz\Client\CustomerProductPriceSearch
 */
class CustomerProductPriceSearchFactory extends AbstractFactory
{
    /**
     * @return \Spryker\Client\Customer\CustomerClientInterface
     */
    public function getCustomerClient(): CustomerClientInterface
    {
        return $this->getProvidedDependency(CustomerProductPriceSearchDependencyProvider::CLIENT_CUSTOMER);
    }
}

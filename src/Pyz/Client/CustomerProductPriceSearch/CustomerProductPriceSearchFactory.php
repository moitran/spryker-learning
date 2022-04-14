<?php

namespace Pyz\Client\CustomerProductPriceSearch;

use Spryker\Client\Customer\CustomerClientInterface;
use Spryker\Client\Kernel\AbstractFactory;

/**
 * Class CustomerProductPriceSearchFactory
 * @package Pyz\Client\CustomerProductPriceSearch
 */
class CustomerProductPriceSearchFactory extends AbstractFactory
{
    /**
     * @return CustomerClientInterface
     * @throws \Spryker\Client\Kernel\Exception\Container\ContainerKeyNotFoundException
     */
    public function getCustomerClient() : CustomerClientInterface
    {
        return $this->getProvidedDependency(CustomerProductPriceSearchDependencyProvider::CLIENT_CUSTOMER);
    }
}

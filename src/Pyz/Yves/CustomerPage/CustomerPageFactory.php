<?php

namespace Pyz\Yves\CustomerPage;

use SprykerShop\Yves\CustomerPage\CustomerPageFactory as SprykerShopCustomerPageFactory;
use Pyz\Yves\CustomerPage\Form\FormFactory;

/**
 * Class CustomerPageFactory
 * @package Pyz\Yves\CustomerPage
 */
class CustomerPageFactory extends SprykerShopCustomerPageFactory
{
    /**
     * @return \SprykerShop\Yves\CustomerPage\Form\FormFactory
     */
    public function createCustomerFormFactory()
    {
        return new FormFactory();
    }
}

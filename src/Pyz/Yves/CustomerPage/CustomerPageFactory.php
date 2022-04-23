<?php

/**
 * This file is part of the Spryker Commerce OS.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Yves\CustomerPage;

use Pyz\Yves\CustomerPage\Form\FormFactory;
use SprykerShop\Yves\CustomerPage\CustomerPageFactory as SprykerShopCustomerPageFactory;

/**
 * Class CustomerPageFactory
 *
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

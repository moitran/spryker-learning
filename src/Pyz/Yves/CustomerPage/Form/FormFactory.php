<?php


namespace Pyz\Yves\CustomerPage\Form;

use SprykerShop\Yves\CustomerPage\Form\FormFactory as SprykerShopFormFactory;

/**
 * Class FormFactory
 * @package Pyz\Yves\CustomerPage\Form
 */
class FormFactory extends SprykerShopFormFactory
{
    /**
     * @return \Symfony\Component\Form\FormInterface
     */
    public function getRegisterForm()
    {
        return $this->getFormFactory()->create(RegisterForm::class);
    }
}

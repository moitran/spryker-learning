<?php

/**
 * This file is part of the Spryker Commerce OS.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Yves\CustomerPage\Form;

use SprykerShop\Yves\CustomerPage\Form\RegisterForm as SprykerShopRegisterForm;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;

/**
 * Class RegisterForm
 *
 * @package Pyz\Yves\CustomerPage\Form
 */
class RegisterForm extends SprykerShopRegisterForm
{
    public const FIELD_CUSTOMER_NUMBER = 'customer_number';

    /**
     * @param \Symfony\Component\Form\FormBuilderInterface $builder
     * @param array $options
     *
     * @return void
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $this->addCustomerNumberField($builder);
        parent::buildForm($builder, $options);
    }

    /**
     * @param \Symfony\Component\Form\FormBuilderInterface $builder
     *
     * @return $this
     */
    protected function addCustomerNumberField(FormBuilderInterface $builder)
    {
        $builder->add(static::FIELD_CUSTOMER_NUMBER, TextType::class, [
            'label' => 'customer.customer_number',
            'constraints' => [
                $this->createNotBlankConstraint(),
            ],
        ]);

        return $this;
    }
}

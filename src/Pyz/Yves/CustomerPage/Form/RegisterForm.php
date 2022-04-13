<?php

namespace Pyz\Yves\CustomerPage\Form;

use SprykerShop\Yves\CustomerPage\Form\RegisterForm as SprykerShopRegisterForm;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;

/**
 * Class RegisterForm
 * @package Pyz\Yves\CustomerPage\Form
 */
class RegisterForm extends SprykerShopRegisterForm
{
    const FIELD_CUSTOMER_NUMBER = 'customer_number';

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $this->addCustomerNumberField($builder);
        parent::buildForm($builder, $options);
    }

    /**
     * @param FormBuilderInterface $builder
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

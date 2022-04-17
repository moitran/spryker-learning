<?php

namespace Pyz\Zed\PathBlacklistGui\Communication\Form;

use Generated\Shared\Transfer\PathBlacklistTransfer;
use Pyz\Zed\PathBlacklistGui\Communication\PathBlacklistGuiCommunicationFactory;
use Spryker\Zed\Kernel\Communication\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;

/**
 * Class PathBlacklistForm
 * @package Pyz\Zed\PathBlacklistGui\Communication\Form
 * @method PathBlacklistGuiCommunicationFactory getFactory()
 */
class PathBlacklistForm extends AbstractType
{
    protected const BLOCK_PREFIX = 'path_blacklist';
    protected const FIELD_ID_PATH_BLACK_LIST = 'idPathBlacklist';
    protected const FIELD_PATH = 'path';
    protected const FIELD_NAME_MAX_LENGTH = 256;

    /**
     * @return string
     */
    public function getBlockPrefix(): string
    {
        return static::BLOCK_PREFIX;
    }

    /**
     * @param \Symfony\Component\OptionsResolver\OptionsResolver $resolver
     *
     * @return void
     */
    public function configureOptions(OptionsResolver $resolver): void
    {
        parent::configureOptions($resolver);
        $resolver->setDefaults([
            'data_class' => PathBlacklistTransfer::class,
        ]);
    }

    /**
     * @param \Symfony\Component\Form\FormBuilderInterface $builder
     * @param array $options
     *
     * @return void
     */
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $this->addIdPathBlacklistField($builder)
            ->addPathField($builder);
    }

    /**
     * @param \Symfony\Component\Form\FormBuilderInterface $builder
     *
     * @return $this
     */
    protected function addIdPathBlacklistField(FormBuilderInterface $builder)
    {
        $builder->add(static::FIELD_ID_PATH_BLACK_LIST, HiddenType::class);

        return $this;
    }

    /**
     * @param \Symfony\Component\Form\FormBuilderInterface $builder
     *
     * @return $this
     */
    protected function addPathField(FormBuilderInterface $builder)
    {
        $builder->add(static::FIELD_PATH, TextType::class, [
            'label' => 'Path',
            'constraints' => [
                new NotBlank(['normalizer' => 'trim']),
                new Length(['max' => static::FIELD_NAME_MAX_LENGTH]),
                $this->getFactory()->createPathUniqueConstraint(),
            ],
        ]);

        $builder->add('save', SubmitType::class, [
            'attr' => ['class' => 'save'],
        ]);

        return $this;
    }
}

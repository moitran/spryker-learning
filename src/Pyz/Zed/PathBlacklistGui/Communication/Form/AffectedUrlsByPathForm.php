<?php

namespace Pyz\Zed\PathBlacklistGui\Communication\Form;

use Generated\Shared\Transfer\PathBlacklistTransfer;
use Spryker\Zed\Kernel\Communication\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AffectedUrlsByPathForm extends AbstractType
{
    protected const BLOCK_PREFIX = 'affected_url_by_path_blacklist';
    protected const FIELD_PATH = 'path';

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
        $this->addPathField($builder);
    }

    /**
     * @param \Symfony\Component\Form\FormBuilderInterface $builder
     *
     * @return $this
     */
    protected function addPathField(FormBuilderInterface $builder)
    {
        $builder->add(static::FIELD_PATH, HiddenType::class);

        $builder->add('get_affected_urls', SubmitType::class, [
            'label' => 'Get Affected URLs',
            'attr' => ['class' => 'getAffectedUrls'],
        ]);

        return $this;
    }
}

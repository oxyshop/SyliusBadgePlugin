<?php

declare(strict_types=1);
/*
 * This file is part of oXyShop e-commerce platform
 *
 * (c) oXyShop <info@oxyshop.cz>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Oxyshop\SyliusBadgePlugin\Form\Extension;

use Oxyshop\SyliusBadgePlugin\Form\Type\ProductBadgeType;
use Sylius\Bundle\ProductBundle\Form\Type\ProductType;
use Sylius\Bundle\ResourceBundle\Form\Type\ResourceAutocompleteChoiceType;
use Sylius\Component\Core\Model\ProductInterface;
use Symfony\Component\Form\AbstractTypeExtension;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

final class ProductTypeExtension extends AbstractTypeExtension
{
    public function __construct()
    {
        dump('asd');
    }

    /**
     * @param FormBuilderInterface $builder
     * @param array                $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            /*
            ->add('badges', CollectionType::class, [
                'entry_type' => ProductBadgeType::class, // Form Class that handle autocomplete input
                'entry_options' => ['product' => $options['data']],
                'allow_add' => true,
                'allow_delete' => true,
                'by_reference' => false,
                'label' => false,
                'block_name' => 'entry',
            ])
            */
            ->add('badges', ResourceAutocompleteChoiceType::class, [
                'label' => 'sylius.ui.product_variants',
                'multiple' => true,
                'required' => false,
                'choice_name' => 'descriptor',
                'choice_value' => 'code',
                'resource' => 'sylius.product_variant',
            ])
        ;
    }

    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefined('product');
        $resolver->setAllowedTypes('product', ProductInterface::class);
    }

    /**
     * @return iterable
     */
    public function getExtendedTypes(): iterable
    {
        return [ProductType::class];
    }

    /**
     * @return string
     */
    public function getBlockPrefix(): string
    {
        return 'oxyshop_sylius_badge_plugin_product_badge';
    }
}

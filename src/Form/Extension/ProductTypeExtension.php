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

use Oxyshop\SyliusBadgePlugin\Form\Type\BadgeAutocompleteChoiceType;
use Oxyshop\SyliusBadgePlugin\Form\Type\BadgeChoiceType;
use Sylius\Bundle\ProductBundle\Form\Type\ProductType;
use Sylius\Component\Core\Model\ProductInterface;
use Symfony\Component\Form\AbstractTypeExtension;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

final class ProductTypeExtension extends AbstractTypeExtension
{
    /**
     * @param FormBuilderInterface $builder
     * @param array                $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('badges', BadgeChoiceType::class, [
                'label' => false,
                'required' => false,
                'multiple' => true,
                'expanded' => true,
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

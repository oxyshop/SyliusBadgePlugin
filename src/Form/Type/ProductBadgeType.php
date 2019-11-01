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

namespace Oxyshop\SyliusBadgePlugin\Form\Type;

use Sylius\Bundle\ResourceBundle\Form\Type\AbstractResourceType;
use Sylius\Bundle\ResourceBundle\Form\Type\ResourceAutocompleteChoiceType;
use Sylius\Component\Core\Model\ProductInterface;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\Form\FormView;
use Symfony\Component\OptionsResolver\OptionsResolver;

final class ProductBadgeType extends AbstractResourceType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array                $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('productVariants2', ResourceAutocompleteChoiceType::class, [
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
     * @param FormView      $view
     * @param FormInterface $form
     * @param array         $options
     */
    public function buildView(FormView $view, FormInterface $form, array $options): void
    {
        //$view->vars['product'] = $options['product'];
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
     * @return string
     */
    public function getBlockPrefix(): string
    {
        return 'oxyshop_sylius_badge_plugin_product_badge';
    }
}

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

use Sylius\Bundle\ResourceBundle\Form\EventSubscriber\AddCodeFormSubscriber;
use Sylius\Bundle\ResourceBundle\Form\Type\AbstractResourceType;
use Sylius\Bundle\ResourceBundle\Form\Type\ResourceTranslationsType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;

class BadgeType extends AbstractResourceType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array                $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            //->addEventSubscriber(new AddCodeFormSubscriber())
            ->add('code', TextType::class)
            ->add('position', IntegerType::class)
            ->add('enable', CheckboxType::class)
            ->add('class', TextType::class)
            ->add('translations', ResourceTranslationsType::class, [
                'entry_type' => BadgeTranslationType::class,
            ])
            /*
            ->add('enable', CheckboxType::class, [
                'required' => false,
            ])
            */
        ;
    }

    /**
     * @return string
     */
    public function getBlockPrefix(): string
    {
        return 'oxyshop_sylius_badge_plugin_badge';
    }
}

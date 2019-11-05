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

namespace Oxyshop\SyliusBadgePlugin;

use Doctrine\Bundle\DoctrineBundle\DependencyInjection\Compiler\DoctrineOrmMappingsPass;
use Sylius\Bundle\CoreBundle\Application\SyliusPluginTrait;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\Bundle\Bundle;

final class OxyshopSyliusBadgePlugin extends Bundle
{
    use SyliusPluginTrait;

    /** @var string */
    private const ENTITY_NAMESPACE = 'Oxyshop\SyliusBadgePlugin\Entity';

    /**
     * @param ContainerBuilder $container
     */
    public function build(ContainerBuilder $container): void
    {
        $container->addCompilerPass(DoctrineOrmMappingsPass::createAnnotationMappingDriver(
            [
                self::ENTITY_NAMESPACE,
            ],
            [
                realpath(__DIR__.'/Entity'),
            ]
        ));

        parent::build($container);
    }
}

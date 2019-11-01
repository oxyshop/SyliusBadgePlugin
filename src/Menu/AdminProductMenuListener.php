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

namespace Oxyshop\SyliusBadgePlugin\Menu;

use Knp\Menu\ItemInterface;
use Oxyshop\SyliusBadgePlugin\Exception\Exception;
use Sylius\Bundle\AdminBundle\Event\ProductMenuBuilderEvent;

final class AdminProductMenuListener
{
    /** @var string */
    private const PARENT_NODE = 'catalog';

    /** @var string|null */
    private $parentNode;

    /**
     * @param string|null $parentNode
     */
    public function __construct(?string $parentNode = null)
    {
        $this->parentNode = $parentNode;
    }

    /**
     * @param ProductMenuBuilderEvent $event
     */
    public function addItems(ProductMenuBuilderEvent $event): void
    {
        $menu = $event->getMenu();

        if (null === $menu) {
            throw new Exception('The product menu was not found');
        }

        if (null !== $this->parentNode) {
            $menu = $this->getChild($menu);
        }

        $menu->addChild('badges')
            ->setLabel('oxyshop_sylius_badge_plugin.ui.badges')
            ->setAttribute('template', '@OxyshopSyliusBadgePlugin/Admin/Product/Tab/_badges.html.twig')
        ;
    }

    /**
     * @param ItemInterface $menu
     *
     * @return ItemInterface|null
     */
    private function getChild(ItemInterface $menu): ?ItemInterface
    {
        $menu = $menu->getChild($this->parentNode);

        if (null === $menu) {
            throw new Exception(sprintf('The parent menu item was not found: "%s"', $this->parentNode));
        }

        return $menu;
    }
}

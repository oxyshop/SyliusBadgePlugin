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

use Oxyshop\SyliusBadgePlugin\Exception\Exception;
use Sylius\Bundle\UiBundle\Menu\Event\MenuBuilderEvent;

final class AdminMenuListener
{
    /** @var string */
    private const PARENT_NODE = 'catalog';
    /** @var string|null */
    private $parentNode;

    /**
     * @param string|null $parentNode
     */
    public function __construct(?string $parentNode = self::PARENT_NODE)
    {
        $this->parentNode = $parentNode;
    }

    /**
     * @param MenuBuilderEvent $event
     *
     * @throws \Exception
     */
    public function addAdminMenuItems(MenuBuilderEvent $event): void
    {
        $menu = $event->getMenu()
            ->getChild($this->parentNode);

        if (null === $menu) {
            throw new Exception(sprintf('The parent menu item was not found: "%s"', $this->parentNode));
        }

        $menu->addChild('badges', ['route' => 'oxyshop_sylius_badge_plugin_admin_badge_index'])
            ->setLabel('oxyshop_sylius_badge_plugin.menu.admin.badges')
            ->setLabelAttribute('icon', 'tag')
        ;
    }
}

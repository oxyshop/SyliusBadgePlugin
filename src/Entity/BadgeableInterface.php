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

namespace Oxyshop\SyliusBadgePlugin\Entity;

use Doctrine\Common\Collections\Collection;

interface BadgeableInterface
{
    /**
     * @return Collection
     */
    public function getBadges(): Collection;

    /**
     * @param Collection $badges
     */
    public function setBadges(Collection $badges): void;

    /**
     * @param BadgeInterface $badge
     */
    public function add(BadgeInterface $badge): void;

    /**
     * @param BadgeInterface $badge
     */
    public function remove(BadgeInterface $badge): void;
}

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

namespace Oxyshop\SyliusBadgePlugin\Model;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Oxyshop\SyliusBadgePlugin\Entity\BadgeInterface;

trait BadgeableTrait
{
    /**
     * @ORM\ManyToMany(targetEntity="Oxyshop\SyliusBadgePlugin\Entity\Badge", cascade={"persist"})
     * @ORM\JoinTable(name="oxyshop_product_badge",
     *      joinColumns={@ORM\JoinColumn(name="product_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="badge_id", referencedColumnName="id")}
     *      )
     *
     * @var BadgeInterface[]|Collection
     */
    protected $badges;

    public function __construct()
    {
        parent::__construct();

        $this->badges = new ArrayCollection();
    }

    /**
     * @return Collection
     */
    public function getBadges(): Collection
    {
        return $this->badges;
    }

    /**
     * @param BadgeInterface[]|Collection $badges
     */
    public function setBadges(Collection $badges): void
    {
        $this->badges = $badges;
    }
}

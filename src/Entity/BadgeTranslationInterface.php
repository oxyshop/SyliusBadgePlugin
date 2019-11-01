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

use Sylius\Component\Resource\Model\ResourceInterface;
use Sylius\Component\Resource\Model\TranslationInterface;

interface BadgeTranslationInterface extends ResourceInterface, TranslationInterface
{
    /**
     * @return string|null
     */
    public function getName(): ?string;

    /**
     * @return string|null
     */
    public function getDescription(): ?string;
}

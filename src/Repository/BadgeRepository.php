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

namespace Oxyshop\SyliusBadgePlugin\Repository;

use Doctrine\ORM\QueryBuilder;
use Sylius\Bundle\ResourceBundle\Doctrine\ORM\EntityRepository;

final class BadgeRepository extends EntityRepository implements BadgeRepositoryInterface
{
    /**
     * @return QueryBuilder
     */
    public function createAllBadgesQueryBuilder(): QueryBuilder
    {
        return $this->createQueryBuilder('b');
    }

    /**
     * @param string      $phrase
     * @param string|null $locale
     *
     * @return iterable
     */
    public function findByNamePart(string $phrase, ?string $locale = null): iterable
    {
        return $this->createTranslationBasedQueryBuilder($locale)
            ->andWhere('translation.name LIKE :name')
            ->setParameter('name', "%{$phrase}%")
            ->getQuery()
            ->getResult()
        ;
    }

    /**
     * @param string|null $locale
     *
     * @return QueryBuilder
     */
    private function createTranslationBasedQueryBuilder(?string $locale = null): QueryBuilder
    {
        $queryBuilder = $this->createQueryBuilder('o')
            ->addSelect('translation')
            ->leftJoin('o.translations', 'translation')
        ;

        if (null !== $locale) {
            $queryBuilder
                ->andWhere('translation.locale = :locale')
                ->setParameter('locale', $locale)
            ;
        }

        return $queryBuilder;
    }
}

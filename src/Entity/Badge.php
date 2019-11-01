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

use DateTimeInterface;
use Doctrine\ORM\Mapping as ORM;
use Exception;
use Sylius\Component\Resource\Model\TranslatableInterface;
use Sylius\Component\Resource\Model\TranslatableTrait;
use Sylius\Component\Resource\Model\TranslationInterface;

/**
 * @ORM\MappedSuperclass()
 * @ORM\Table(name="oxyshop_badge")
 * @ORM\HasLifecycleCallbacks()
 */
class Badge implements BadgeInterface, TranslatableInterface
{
    // use TimestampableTrait;

    use TranslatableTrait {
        __construct as private initializeTranslationsCollection;
    }

    /**
     * @ORM\Id()
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="IDENTITY")
     *
     * @var int|null
     */
    private $id;

    /**
     * @ORM\Column(length=128, unique=true)
     *
     * @var string|null
     */
    private $code;

    /**
     * @ORM\Column(length=128)
     *
     * @var string
     */
    //private $name;

    /**
     * @ORM\Column(type="text")
     *
     * @var string
     */
    //private $description;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     *
     * @var bool
     */
    private $enable;

    /**
     * @ORM\Column(type="integer")
     *
     * @var int
     */
    private $position;

    /**
     * @ORM\Column(type="string", length=128)
     *
     * @var string
     */
    private $class;

    /**
     * ORM\Column(type="datetime", nullable=true).
     *
     * @var DateTimeInterface|null
     */
    //private $createdAt;

    /**
     * ORM\Column(type="datetime", nullable=true).
     *
     * @var DateTimeInterface|null
     */
    //private $updatedAt;

    public function __construct()
    {
        $this->initializeTranslationsCollection();
    }

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return string|null
     */
    public function getCode(): ?string
    {
        return $this->code;
    }

    /**
     * @param string|null $code
     */
    public function setCode(?string $code): void
    {
        $this->code = $code;
    }

    /**
     * @return bool|null
     */
    public function isEnable(): ?bool
    {
        return $this->enable;
    }

    /**
     * @param bool|null $enable
     */
    public function setEnable(?bool $enable): void
    {
        $this->enable = $enable;
    }

    /**
     * @return int|null
     */
    public function getPosition(): ?int
    {
        return $this->position;
    }

    /**
     * @param int $position
     */
    public function setPosition(int $position): void
    {
        $this->position = $position;
    }

    /**
     * @return string|null
     */
    public function getClass(): ?string
    {
        return $this->class;
    }

    /**
     * @param string $class
     */
    public function setClass(string $class): void
    {
        $this->class = $class;
    }

    /*
    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->createdAt;
    }

    public function setCreatedAt(?\DateTimeInterface $createdAt): void
    {
        $this->createdAt = $createdAt;
    }

    public function getUpdatedAt(): ?\DateTimeInterface
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(?\DateTimeInterface $updatedAt): void
    {
        $this->updatedAt = $updatedAt;
    }
    */

    /*
    **
     * @ORM\PrePersist()
     *
     * @throws Exception
     *
    public function setCreatedAtValue(): void
    {
        $this->createdAt = new \DateTimeImmutable();
    }

    **
     * @ORM\PreUpdate()
     *
     * @throws Exception
     *
    public function setUpdatedAtValue(): void
    {
        $this->updatedAt = new \DateTimeImmutable();
    }
    */

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->getTranslation()->setName($name);
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->getTranslation()->getName();
    }

    /**
     * @param string $description
     */
    public function setDescription($description)
    {
        $this->getTranslation()->setDescription($description);
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->getTranslation()->getDescription();
    }

    /**
     * @return TranslationInterface
     */
    protected function createTranslation(): TranslationInterface
    {
        return new BadgeTranslation();
    }
}

<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use ApiPlatform\Metadata\Delete;
use ApiPlatform\Metadata\Get;
use ApiPlatform\Metadata\GetCollection;
use ApiPlatform\Metadata\Post;
use ApiPlatform\Metadata\Put;
use App\Controller\GetTariffAction;
use App\Repository\TariffRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TariffRepository::class)]
#[ApiResource(
    operations: [
        new Get(),
        new GetCollection(
            controller: GetTariffAction::class,
            name: 'getTariff'
        ),
        new Post(
            uriTemplate: 'postTariff',
            security: "is_granted('ROLE_ADMIN')"
        ),
        new Delete(
            security: "is_granted('ROLE_ADMIN')"
        ),
        new Put(
            security: "is_granted('ROLE_ADMIN')"
        )
    ]
)]
class Tariff
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $basicPrice = null;

    #[ORM\Column]
    private ?int $standartPrice = null;

    #[ORM\Column]
    private ?int $premiumPrice = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getBasicPrice(): ?int
    {
        return $this->basicPrice;
    }

    public function setBasicPrice(int $basicPrice): static
    {
        $this->basicPrice = $basicPrice;

        return $this;
    }

    public function getStandartPrice(): ?int
    {
        return $this->standartPrice;
    }

    public function setStandartPrice(int $standartPrice): static
    {
        $this->standartPrice = $standartPrice;

        return $this;
    }

    public function getPremiumPrice(): ?int
    {
        return $this->premiumPrice;
    }

    public function setPremiumPrice(int $premiumPrice): static
    {
        $this->premiumPrice = $premiumPrice;

        return $this;
    }
}

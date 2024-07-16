<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use ApiPlatform\Metadata\Delete;
use ApiPlatform\Metadata\Get;
use ApiPlatform\Metadata\GetCollection;
use ApiPlatform\Metadata\Post;
use ApiPlatform\Metadata\Put;
use App\Controller\GetAllNewsAction;
use App\Controller\GetNewsByIdAction;
use App\Controller\GetThreeNewsAction;
use App\Repository\NewPageRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Attribute\Groups;

#[ORM\Entity(repositoryClass: NewPageRepository::class)]
#[ApiResource(
    operations: [
        new Post(
            uriTemplate: 'postNews',
            security: "is_granted('ROLE_ADMIN')"
        ),
        new GetCollection(
            uriTemplate: 'getAllNews',
            name: 'allNews'
        ),
        new GetCollection(
            uriTemplate: 'getNewsThree',
            controller: GetThreeNewsAction::class,
            name: 'threeNews'
        ),
        new Get(),
        new Delete(
            security: "is_granted('ROLE_ADMIN')"
        ),
        new Put(
            security: "is_granted('ROLE_ADMIN')"
        )
    ],
    normalizationContext: ['groups' => ['newPage:read']],
    denormalizationContext: ['groups' => ['newPage:write']],
    order: ['id' => 'DESC']
)]
#[Groups(['newPage:read'])]
class NewPage
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    #[Groups(['newPage:write', 'newPage:read'])]
    private ?string $title = null;

    #[ORM\Column(length: 255)]
    #[Groups(['newPage:write', 'newPage:read'])]
    private ?string $description = null;

    #[ORM\Column(type: Types::TEXT)]
    #[Groups(['newPage:write', 'newPage:read'])]
    private ?string $text = null;

    #[ORM\OneToOne(cascade: ['persist', 'remove'])]
    #[Groups(['newPage:write', 'newPage:read'])]
    private ?MediaObject $image = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): static
    {
        $this->title = $title;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): static
    {
        $this->description = $description;

        return $this;
    }

    public function getText(): ?string
    {
        return $this->text;
    }

    public function setText(string $text): static
    {
        $this->text = $text;

        return $this;
    }

    public function getImage(): ?MediaObject
    {
        return $this->image;
    }

    public function setImage(?MediaObject $image): static
    {
        $this->image = $image;

        return $this;
    }

}

<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use ApiPlatform\Metadata\Delete;
use ApiPlatform\Metadata\Get;
use ApiPlatform\Metadata\GetCollection;
use ApiPlatform\Metadata\Patch;
use ApiPlatform\Metadata\Post;
use ApiPlatform\Metadata\Put;
use App\Repository\GrupoRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: GrupoRepository::class)]
#[ApiResource(
    operations: [
        new GetCollection(),
        new Get(),
        new Delete(security: 'is_granted("ROLE_DIRECTIVO")'),
        new Post(security: 'is_granted("ROLE_DIRECTIVO")'),
        new Put(security: 'is_granted("GRUPO_EDIT", object)'),
        new Patch(security: 'is_granted("GRUPO_EDIT, object")')
    ]
)]
class Grupo
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nombre = null;

    #[ORM\Column]
    private ?int $planta = null;

    #[ORM\Column]
    private ?int $aula = null;

    #[ORM\ManyToOne(inversedBy: 'grupos')]
    private ?Tutor $tutor = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNombre(): ?string
    {
        return $this->nombre;
    }

    public function setNombre(string $nombre): static
    {
        $this->nombre = $nombre;

        return $this;
    }

    public function getPlanta(): ?int
    {
        return $this->planta;
    }

    public function setPlanta(int $planta): static
    {
        $this->planta = $planta;

        return $this;
    }

    public function getAula(): ?int
    {
        return $this->aula;
    }

    public function setAula(int $aula): static
    {
        $this->aula = $aula;

        return $this;
    }

    public function getTutor(): ?Tutor
    {
        return $this->tutor;
    }

    public function setTutor(?Tutor $tutor): static
    {
        $this->tutor = $tutor;

        return $this;
    }
}

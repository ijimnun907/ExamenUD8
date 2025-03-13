<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiProperty;
use ApiPlatform\Metadata\ApiResource;
use ApiPlatform\Metadata\Delete;
use ApiPlatform\Metadata\Get;
use ApiPlatform\Metadata\GetCollection;
use ApiPlatform\Metadata\Patch;
use ApiPlatform\Metadata\Post;
use ApiPlatform\Metadata\Put;
use App\Repository\TutorRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;

#[ORM\Entity(repositoryClass: TutorRepository::class)]
#[ApiResource(
    operations: [
        new GetCollection(uriTemplate: '/tutores'),
        new Get(uriTemplate: '/tutores/{id}'),
        new Post(uriTemplate: '/tutores', security: 'is_granted("ROLE_DIRECTIVO")'),
        new Delete(uriTemplate: '/tutores/{id}', security: 'is_granted("ROLE_DIRECTIVO")'),
        new Put(uriTemplate: '/tutores/{id}', security: 'is_granted("ROLE_DIRECTIVO")'),
        new Patch(uriTemplate: '/tutores/{id}', security: 'is_granted("ROLE_DIRECTIVO")')
    ]
)]
class Tutor implements UserInterface, PasswordAuthenticatedUserInterface
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $usuario = null;

    #[ORM\Column(length: 255)]
    #[ApiProperty(readable: false)]
    private ?string $clave = null;

    #[ORM\Column]
    private ?bool $directivo = null;

    #[ORM\OneToMany(targetEntity: Grupo::class, mappedBy: 'tutor')]
    private Collection $grupos;

    public function __construct()
    {
        $this->grupos = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUsuario(): ?string
    {
        return $this->usuario;
    }

    public function setUsuario(string $usuario): static
    {
        $this->usuario = $usuario;

        return $this;
    }

    #[ApiProperty(readable: false)]
    public function getClave(): ?string
    {
        return $this->clave;
    }

    public function setClave(string $clave): static
    {
        $this->clave = $clave;

        return $this;
    }

    public function isDirectivo(): ?bool
    {
        return $this->directivo;
    }

    public function setDirectivo(bool $directivo): static
    {
        $this->directivo = $directivo;

        return $this;
    }

    /**
     * @return Collection<int, Grupo>
     */
    public function getGrupos(): Collection
    {
        return $this->grupos;
    }

    public function addGrupo(Grupo $grupo): static
    {
        if (!$this->grupos->contains($grupo)) {
            $this->grupos->add($grupo);
            $grupo->setTutor($this);
        }

        return $this;
    }

    public function removeGrupo(Grupo $grupo): static
    {
        if ($this->grupos->removeElement($grupo)) {
            // set the owning side to null (unless already changed)
            if ($grupo->getTutor() === $this) {
                $grupo->setTutor(null);
            }
        }

        return $this;
    }

    public function getRoles()
    {
        $roles = [];
        $roles[] = 'ROLE_USER';
        $roles[] = 'ROLE_TUTOR';
        if ($this->directivo){
            $roles[] = 'ROLE_DIRECTIVO';
        }
        return array_unique($roles);
    }

    #[ApiProperty(readable: false)]
    public function getPassword(): ?string
    {
        return $this->clave;
    }

    public function getSalt()
    {
        // TODO: Implement getSalt() method.
    }

    public function eraseCredentials()
    {
        // TODO: Implement eraseCredentials() method.
    }

    public function getUsername()
    {
        return $this->usuario;
    }

    public function getUserIdentifier()
    {
        return $this->usuario;
    }

    public function __call(string $name, array $arguments)
    {
        // TODO: Implement @method string getUserIdentifier()
    }
}

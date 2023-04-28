<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;

#[ORM\Entity(repositoryClass: UserRepository::class)]
class User implements UserInterface, PasswordAuthenticatedUserInterface
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 180, unique: true)]
    private ?string $email = null;

    #[ORM\Column]
    private array $roles = [];

    /**
     * @var string The hashed password
     */
    #[ORM\Column]
    private ?string $password = null;

    #[ORM\Column(length: 50)]
    private ?string $nom = null;

    #[ORM\Column(length: 50)]
    private ?string $prenom = null;

    #[ORM\ManyToOne(inversedBy: 'users')]
    #[ORM\JoinColumn(nullable: false)]

    private ?Role $refRole = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUserIdentifier(): string
    {
        return (string) $this->email;
    }

    /**
     * @see UserInterface
     */
    public function getRoles(): array
    {
        $roles[] = $this->getRefRole()->getDescription();
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }

    public function setRoles(array $roles): self
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * @see PasswordAuthenticatedUserInterface
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials()
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): self
    {
        $this->prenom = $prenom;

        return $this;
    }

   
    public function getRefRole(): ?Role
    {
        return $this->refRole;
    }

    public function setRefRole(?Role $refRole): self
    {
        $this->refRole = $refRole;

        return $this;
    }
<<<<<<< HEAD:siteDeBlog/src/Entity/User.php

    /**
     * @return Collection<int, Commentaire>
     */
    public function getRefCommentaire(): Collection
    {
        return $this->refCommentaire;
    }

    public function addRefCommentaire(Commentaire $refCommentaire): self
    {
        if (!$this->refCommentaire->contains($refCommentaire)) {
            $this->refCommentaire->add($refCommentaire);
            $refCommentaire->setUser($this);
        }

        return $this;
    }

    public function removeRefCommentaire(Commentaire $refCommentaire): self
    {
        if ($this->refCommentaire->removeElement($refCommentaire)) {
            // set the owning side to null (unless already changed)
            if ($refCommentaire->getUser() === $this) {
                $refCommentaire->setUser(null);
            }
        }
=======
>>>>>>> 35d63b721050518a983fadc30319dccb3001ae5b:electroloc/src/Entity/User.php


<<<<<<< HEAD:siteDeBlog/src/Entity/User.php
    /**
     * @return Collection<int, Article>
     */
    public function getRefArticle(): Collection
    {
        return $this->refArticle;
    }

    public function addRefArticle(Article $refArticle): self
    {
        if (!$this->refArticle->contains($refArticle)) {
            $this->refArticle->add($refArticle);
            $refArticle->setUser($this);
        }

        return $this;
    }

    public function removeRefArticle(Article $refArticle): self
    {
        if ($this->refArticle->removeElement($refArticle)) {
            // set the owning side to null (unless already changed)
            if ($refArticle->getUser() === $this) {
                $refArticle->setUser(null);
            }
        }

        return $this;
    }

=======
>>>>>>> 35d63b721050518a983fadc30319dccb3001ae5b:electroloc/src/Entity/User.php
    public function __toString()
	{
	 	return $this->getPrenom();
	}
<<<<<<< HEAD:siteDeBlog/src/Entity/User.php
}
=======
}
>>>>>>> 35d63b721050518a983fadc30319dccb3001ae5b:electroloc/src/Entity/User.php

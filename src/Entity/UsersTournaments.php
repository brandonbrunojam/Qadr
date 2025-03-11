<?php

namespace App\Entity;

use App\Repository\UsersTournamentsRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: UsersTournamentsRepository::class)]
class UsersTournaments
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne]
    private ?users $users = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?tournaments $tournaments = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUsers(): ?users
    {
        return $this->users;
    }

    public function setUsers(?users $users): static
    {
        $this->users = $users;

        return $this;
    }

    public function getTournaments(): ?tournaments
    {
        return $this->tournaments;
    }

    public function setTournaments(?tournaments $tournaments): static
    {
        $this->tournaments = $tournaments;

        return $this;
    }
}

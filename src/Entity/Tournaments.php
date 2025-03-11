<?php

namespace App\Entity;

use App\Repository\TournamentsRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TournamentsRepository::class)]
class Tournaments
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(nullable: true)]
    private ?\DateTimeImmutable $start_date = null;

    #[ORM\Column(nullable: true)]
    private ?\DateTimeImmutable $end_date = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $created_at = null;

    #[ORM\Column(nullable: true)]
    private ?\DateTimeImmutable $updated_at = null;

    #[ORM\Column(nullable: true)]
    private ?int $ticket_bronze = null;

    #[ORM\Column(nullable: true)]
    private ?int $ticket_silver = null;

    #[ORM\Column(nullable: true)]
    private ?int $ticket_gold = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getStartDate(): ?\DateTimeImmutable
    {
        return $this->start_date;
    }

    public function setStartDate(?\DateTimeImmutable $start_date): static
    {
        $this->start_date = $start_date;

        return $this;
    }

    public function getEndDate(): ?\DateTimeImmutable
    {
        return $this->end_date;
    }

    public function setEndDate(?\DateTimeImmutable $end_date): static
    {
        $this->end_date = $end_date;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->created_at;
    }

    public function setCreatedAt(\DateTimeImmutable $created_at): static
    {
        $this->created_at = $created_at;

        return $this;
    }

    public function getUpdatedAt(): ?\DateTimeImmutable
    {
        return $this->updated_at;
    }

    public function setUpdatedAt(?\DateTimeImmutable $updated_at): static
    {
        $this->updated_at = $updated_at;

        return $this;
    }

    public function getTicketBronze(): ?int
    {
        return $this->ticket_bronze;
    }

    public function setTicketBronze(?int $ticket_bronze): static
    {
        $this->ticket_bronze = $ticket_bronze;

        return $this;
    }

    public function getTicketSilver(): ?int
    {
        return $this->ticket_silver;
    }

    public function setTicketSilver(?int $ticket_silver): static
    {
        $this->ticket_silver = $ticket_silver;

        return $this;
    }

    public function getTicketGold(): ?int
    {
        return $this->ticket_gold;
    }

    public function setTicketGold(?int $ticket_gold): static
    {
        $this->ticket_gold = $ticket_gold;

        return $this;
    }
}

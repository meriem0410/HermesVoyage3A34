<?php

namespace App\Entity;

use App\Repository\ReservationRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\UX\Turbo\Attribute\Broadcast;

#[ORM\Entity(repositoryClass: ReservationRepository::class)]
#[Broadcast]
class Reservation
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $checkin = null;



    #[ORM\Column]
    private ?int $nbguest = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $checkout = null;


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCheckin(): ?\DateTimeInterface
    {
        return $this->checkin;
    }

    public function setCheckin(\DateTimeInterface $checkin): static
    {
        $this->checkin = $checkin;

        return $this;
    }


    public function getNbguest(): ?int
    {
        return $this->nbguest;
    }

    public function setNbguest(int $nbguest): static
    {
        $this->nbguest = $nbguest;

        return $this;
    }

    public function getCheckout(): ?\DateTimeInterface
    {
        return $this->checkout;
    }

    public function setCheckout(\DateTimeInterface $checkout): static
    {
        $this->checkout = $checkout;

        return $this;
    }

    
}

<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\BookingRepository")
 */
class Booking
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="date")
     */
    private $checkinDate;

    /**
     * @ORM\Column(type="date")
     */
    private $checkoutDate;

    public function __construct()
    {
        $this->checkinDate = new \DateTime();
        $this->checkoutDate = new \DateTime();
    }

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Room")
     * @ORM\JoinColumn(nullable=false)
     */
    private $room_id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User")
     * @ORM\JoinColumn(nullable=false)
     */
    private $user_id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Betaal")
     */
    private $betaal;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $betaal_methode;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCheckinDate(): ?\DateTimeInterface
    {
        return $this->checkinDate;
    }

    public function setCheckinDate(\DateTimeInterface $checkinDate): self
    {
        $this->checkinDate = $checkinDate;

        return $this;
    }

    public function getCheckoutDate(): ?\DateTimeInterface
    {
        return $this->checkoutDate;
    }

    public function setCheckoutDate(\DateTimeInterface $checkoutDate): self
    {
        $this->checkoutDate = $checkoutDate;

        return $this;
    }

    public function getRoomId(): ?room
    {
        return $this->room_id;
    }

    public function setRoomId(?room $room_id): self
    {
        $this->room_id = $room_id;

        return $this;
    }

    public function getUserId(): ?user
    {
        return $this->user_id;
    }

    public function setUserId(?user $user_id): self
    {
        $this->user_id = $user_id;

        return $this;
    }

    public function getBetaal(): ?betaal
    {
        return $this->betaal;
    }

    public function setBetaal(?betaal $betaal): self
    {
        $this->betaal = $betaal;

        return $this;
    }

    public function getBetaalMethode(): ?string
    {
        return $this->betaal_methode;
    }

    public function setBetaalMethode(string $betaal_methode): self
    {
        $this->betaal_methode = $betaal_methode;

        return $this;
    }
}

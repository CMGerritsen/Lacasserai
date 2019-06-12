<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\BetaalRepository")
 */
class Betaal
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User")
     */
    private $User;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $soort;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $rek_nr;

    /**
     * @ORM\Column(type="date")
     */
    private $betaaldate;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUser(): ?User
    {
        return $this->User;
    }

    public function setUser(?User $User): self
    {
        $this->User = $User;

        return $this;
    }

    public function getSoort(): ?string
    {
        return $this->soort;
    }

    public function setSoort(string $soort): self
    {
        $this->soort = $soort;

        return $this;
    }

    public function getRekNr(): ?string
    {
        return $this->rek_nr;
    }

    public function setRekNr(string $rek_nr): self
    {
        $this->rek_nr = $rek_nr;

        return $this;
    }

    public function getBetaaldate(): ?\DateTimeInterface
    {
        return $this->betaaldate;
    }

    public function setBetaaldate(\DateTimeInterface $betaaldate): self
    {
        $this->betaaldate = $betaaldate;

        return $this;
    }
}

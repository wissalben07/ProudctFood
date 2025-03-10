<?php

namespace App\Entity;

use App\Repository\CompteBancaireRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CompteBancaireRepository::class)]
class CompteBancaire
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $Propeietaire = null;

    #[ORM\Column]
    private ?float $solde = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(int $id): static
    {
        $this->id = $id;

        return $this;
    }

    public function getPropeietaire(): ?string
    {
        return $this->Propeietaire;
    }

    public function setPropeietaire(string $Propeietaire): static
    {
        $this->Propeietaire = $Propeietaire;

        return $this;
    }

    public function getSolde(): ?float
    {
        return $this->solde;
    }

    public function setSolde(float $solde): static
    {
        $this->solde = $solde;

        return $this;
    }
    public function __construct($proprietaire,$solde) {
        $this->proprietaire = $proprietaire;
        $this->solde = $solde;
    }
    
    public function retirer(float $montant):float{
        if ($montant> $this->solde) {
            throw new \Exception("Error ");
        }
        else {
            $this->solde -= $montant;
            return $this->solde;
        }
    }
}
?>


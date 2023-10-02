<?php

namespace App;

class Adherent
{
    private string $numeroAdherent = "";
    private string $prenom;
    private string $nom;
    private string $email;
    private \DateTime $dateAdhesion;

    /**
     * @param string $prenom
     * @param string $nom
     * @param string|null $dateAdhesion
     */
    public function __construct(string $prenom, string $nom, ?string $dateAdhesion = null)
    {
        $this->prenom = $prenom;
        $this->nom = $nom;
        if (isset($dateAdhesion)) {
            $this->dateAdhesion = \DateTime::createFromFormat("d/m/Y",$dateAdhesion);
        } else {
            $this->dateAdhesion = new \DateTime();
        }
    }

    public function getPrenom(): string
    {
        return $this->prenom;
    }

    public function getNom(): string
    {
        return $this->nom;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getDateAdhesion(): \DateTime
    {
        return $this->dateAdhesion;
    }

    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    public function genererNumero(): void
    {
        $this->numeroAdherent = "AD-".sprintf("%'.06d",rand(0,999999));
    }

    public function getNumeroAdherent(): string
    {
        return $this->numeroAdherent;
    }

    public function renouvelerAdhesion(): void
    {
        $this->dateAdhesion->modify("+1 year");
    }

    public function getInfosAdherent(): Adherent
    {
        return $this;
    }

    public function checkValiditeAdhesion(): bool
    {
        $dateDuJour = new \DateTime();
        $intervalle = \DateInterval::createFromDateString("1 year");
        if ($dateDuJour->sub($intervalle) > $this->dateAdhesion) {
            return false;
        } else {
            return true;
        }
    }
}
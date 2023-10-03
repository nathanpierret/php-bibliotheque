<?php

namespace App;

class Emprunt
{
    private \DateTime $dateEmprunt;
    private \DateTime $dateRetourEstimee;
    private ?\DateTime $dateRetour = null;
    private Media $media;
    private Adherent $adherent;

    /**
     * @param Media $media
     * @param Adherent $adherent
     */
    public function __construct(Media $media, Adherent $adherent)
    {
        $this->dateEmprunt = new \DateTime();
        $this->media = $media;
        $this->adherent = $adherent;
        $this->dateRetourEstimee = (new \DateTime())->modify("+{$this->media->getDureeEmprunt()}");
    }

    public function setDateEmprunt(string $dateEmprunt): void
    {
        $this->dateEmprunt = \DateTime::createFromFormat("d/m/Y", $dateEmprunt);
        $this->dateRetourEstimee = clone $this->dateEmprunt;
        $this->dateRetourEstimee->modify("+{$this->media->getDureeEmprunt()}");
    }

    public function getDateEmprunt(): \DateTime
    {
        return $this->dateEmprunt;
    }

    public function getDateRetourEstimee(): \DateTime
    {
        return $this->dateRetourEstimee;
    }

    public function getDateRetour(): ?\DateTime
    {
        return $this->dateRetour;
    }

    public function setDateRetour(string $dateRetour): void
    {
        $this->dateRetour = \DateTime::createFromFormat("d/m/Y",$dateRetour);
    }

    public function getMedia(): Media
    {
        return $this->media;
    }

    public function getAdherent(): Adherent
    {
        return $this->adherent;
    }

    public function getInfosEmprunt(): Emprunt
    {
        return $this;
    }

    public function checkIfEmprunte(): bool
    {
        if (!isset($this->dateRetour)) {
            return true;
        } else {
            return false;
        }
    }

    public function checkAlertEmprunt(): bool
    {
        if ($this->checkIfEmprunte()) {
            if (new \DateTime() > $this->dateRetourEstimee) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    public function checkDepassementDate(): bool
    {
        if (!$this->checkIfEmprunte()) {
            if ($this->dateRetour > $this->dateRetourEstimee) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }
}
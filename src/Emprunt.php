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
     * @param \DateTime $dateEmprunt
     * @param Media $media
     * @param Adherent $adherent
     */
    public function __construct(\DateTime $dateEmprunt, Media $media, Adherent $adherent)
    {
        $this->dateEmprunt = $dateEmprunt;
        $this->media = $media;
        $this->adherent = $adherent;
        $this->dateRetourEstimee = $this->dateEmprunt->add(\DateInterval::createFromDateString($this->media->getDureeEmprunt()));
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
        if (new \DateTime() > $this->dateRetourEstimee and !isset($this->dateRetour)) {
            return true;
        } else {
            return false;
        }
    }

    public function checkDepassementDate()
    {

    }
}
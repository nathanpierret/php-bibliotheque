<?php

namespace App;

use App\Media;

class BluRay extends Media
{
    private string $realisateur;
    private int $dureeHeures;
    private int $dureeMinutes;
    private string $anneeSortie;

    /**
     * @param string $titre
     * @param string $realisateur
     * @param int $heures
     * @param int $minutes
     * @param string $anneeSortie
     */

    public function __construct(string $titre, string $realisateur, int $heures, int $minutes, string $anneeSortie)
    {
        parent::__construct($titre);
        $this->realisateur = $realisateur;
        $this->dureeHeures = $heures;
        $this->dureeMinutes = $minutes;
        $this->anneeSortie = $anneeSortie;
        $this->dureeEmprunt = "15 days";
    }

    public function getRealisateur(): string
    {
        return $this->realisateur;
    }

    public function getDuree(): string
    {
        $duree = $this->dureeHeures;
        if ($this->dureeHeures <= 1) {
            $duree .= " heure et ".$this->dureeMinutes;
        } else {
            $duree .= " heures et ".$this->dureeMinutes;
        }
        if ($this->dureeMinutes <= 1) {
            $duree .= " minute.";
        } else {
            $duree .= " minutes.";
        }
        return $duree;
    }

    public function getAnneeSortie(): string
    {
        return $this->anneeSortie;
    }

    public function getInfos(): BluRay
    {
        return $this;
    }
}
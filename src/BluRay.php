<?php

namespace App;

use App\Media;

class BluRay extends Media
{
    private string $realisateur;
    private string $duree;
    private string $anneeSortie;

    /**
     * @param string $titre
     * @param string $realisateur
     * @param string $duree
     * @param string $anneeSortie
     */

    public function __construct(string $titre, string $realisateur, string $duree, string $anneeSortie)
    {
        parent::__construct($titre);
        $this->realisateur = $realisateur;
        $this->duree = $duree;
        $this->anneeSortie = $anneeSortie;
        $this->dureeEmprunt = "15 days";
    }

    public function getRealisateur(): string
    {
        return $this->realisateur;
    }

    public function getDuree(): string
    {
        return $this->duree;
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
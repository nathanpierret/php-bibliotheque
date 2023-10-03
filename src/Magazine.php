<?php

namespace App;

use App\Media;

class Magazine extends Media
{
    private int $numero;
    private \DateTime $datePublication;

    /**
     * @param string $titre
     * @param int $numero
     * @param string $datePublication
     */
    public function __construct(string $titre, int $numero, string $datePublication)
    {
        parent::__construct($titre);
        $this->numero = $numero;
        $this->datePublication = \DateTime::createFromFormat("d/m/Y",$datePublication);
    }

    public function getNumero(): int
    {
        return $this->numero;
    }

    public function getDatePublication(): string
    {
        return $this->datePublication->format("d/m/Y");
    }

    public function getDureeEmprunt(): string
    {
        $this->dureeEmprunt = "10 days";
        return $this->dureeEmprunt;
    }

    public function getInfos(): Magazine
    {
        return $this;
    }
}
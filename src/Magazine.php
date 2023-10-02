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
     * @param \DateTime $datePublication
     */
    public function __construct(string $titre, int $numero, \DateTime $datePublication)
    {
        parent::__construct($titre);
        $this->numero = $numero;
        $this->datePublication = $datePublication;
    }

    public function getNumero(): int
    {
        return $this->numero;
    }

    public function getDatePublication(): \DateTime
    {
        return $this->datePublication;
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
<?php

namespace App;

use App\Media;

class Livre extends Media
{
    private int $isbn;
    private string $auteur;
    private int $nombrePages;

    /**
     * @param string $titre
     * @param int $isbn
     * @param string $auteur
     * @param int $nombrePages
     */
    public function __construct(string $titre, int $isbn, string $auteur, int $nombrePages)
    {
        parent::__construct($titre);
        $this->isbn = $isbn;
        $this->auteur = $auteur;
        $this->nombrePages = $nombrePages;
        $this->dureeEmprunt = 21;
    }

    public function getIsbn(): int
    {
        return $this->isbn;
    }

    public function getAuteur(): string
    {
        return $this->auteur;
    }

    public function getNombrePages(): int
    {
        return $this->nombrePages;
    }

    public function getDureeEmprunt(): string
    {
        $this->dureeEmprunt = "21 days";
        return $this->dureeEmprunt;
    }

    public function getInfos(): Livre
    {
        return $this;
    }
}
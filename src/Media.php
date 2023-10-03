<?php

namespace App;

abstract class Media
{
    protected string $titre;
    protected string $dureeEmprunt;

    /**
     * @param string $titre
     */
    public function __construct(string $titre)
    {
        $this->titre = $titre;
    }

    public function getTitre(): string
    {
        return $this->titre;
    }

    public function getDureeEmprunt(): string
    {
        return $this->dureeEmprunt;
    }

    abstract public function getInfos();
}
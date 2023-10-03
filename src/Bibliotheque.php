<?php

namespace App;

class Bibliotheque
{
    private string $nom;
    /**
     * @var Adherent[]
     */
    private array $adherents;
    /**
     * @var Media[]
     */
    private array $medias;
    /**
     * @var Emprunt[]
     */
    private array $emprunts;

    /**
     * @param string $nom
     */
    public function __construct(string $nom)
    {
        $this->nom = $nom;
        $this->medias = [];
        $this->adherents = [];
        $this->emprunts = [];
    }

    public function getNom(): string
    {
        return $this->nom;
    }

    public function getAdherents(): array
    {
        return $this->adherents;
    }

    public function getMedias(): array
    {
        return $this->medias;
    }

    public function getEmprunts(): array
    {
        return $this->emprunts;
    }

    public function inscrireAdherent(Adherent $adherent): void
    {
        $this->adherents[] = $adherent;
    }

    public function ajouterMedia(Media $media): void
    {
        $this->medias[] = $media;
    }

    public function emprunterMedia(Adherent $adherent, Media $media): bool
    {
        if (in_array($adherent,$this->adherents) and in_array($media,$this->medias)) {
            $emprunt = new Emprunt($media,$adherent);
            $this->emprunts[] = $emprunt;
            return true;
        }
        return false;
    }
}
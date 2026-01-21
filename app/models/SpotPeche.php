<?php

namespace app\models;

use Exception;

class SpotPeche
{
    private int $id_spot;
    private string $nom_spot;
    private string $type_eau;
    private string $localisation;
    private string $especes_disponible;
    public function __construct() {}


    public function getIdSpot(): int
    {
        return $this->id_spot;
    }

    public function getNomSpot(): string
    {
        return $this->nom_spot;
    }

    public function getTypeEau(): string
    {
        return $this->type_eau;
    }

    public function getLocalisation(): string
    {
        return $this->localisation;
    }

    public function getEspecesDisponible(): string
    {
        return $this->especes_disponible;
    }


    public function setIdSpot(int $id_spot): void
    {
        if ($id_spot < 0) {
            throw new Exception("L'id du spot doit être supérieur à 0");
        }

        $this->id_spot = $id_spot;
    }

    public function setNomSpot(string $nom_spot): void
    {
        if (empty($nom_spot)) {
            throw new Exception("Le nom du spot ne doit pas être vide");
        }

        $this->nom_spot = $nom_spot;
    }

    public function setTypeEau(string $type_eau): void
    {
        if (empty($type_eau)) {
            throw new Exception("Le type d'eau ne doit pas être vide");
        }

        $this->type_eau = $type_eau;
    }

    public function setLocalisation(string $localisation): void
    {
        if (empty($localisation)) {
            throw new Exception("La localisation ne doit pas être vide");
        }

        $this->localisation = $localisation;
    }

    public function setEspecesDisponible(string $especes_disponible): void
    {
        if (empty($especes_disponible)) {
            throw new Exception("Les espèces disponibles ne doivent pas être vides");
        }

        $this->especes_disponible = $especes_disponible;
    }
    
}

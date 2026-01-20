<?php

namespace app\models;

use config\Connexion;
use Exception;
use PDO;

class   Pecheur extends User
{
    private string $photo_pecheur;
    private string $region;
    private string $type_peche_favorite;
    private int $id_equipe;
    public function __construct()
    {
        parent::__construct();
    }

    public function __toString()
    {
        return parent::__toString() . "pecheur : photo_pecheur = $this->photo_pecheur, region = $this->region, type_peche_favorite = $this->type_peche_favorite, id_equipe = $this->id_equipe";
    }

    public function getPhotoPecheur(): string
    {
        return $this->photo_pecheur;
    }

    public function getRegion(): string
    {
        return $this->region;
    }

    public function getTypePeche(): string
    {
        return $this->type_peche_favorite;
    }

    public function getIdEquipe(): int
    {
        return $this->id_equipe;
    }

    public function setPhotoPecheur(string $photo): void
    {
        if (empty($photo)) {
            throw new Exception("La photo de l'équipe ne doit pas être vide");
        }

        $this->photo_pecheur = $photo;
    }

    public function setRegion(string $region): void
    {
        if (empty($region)) {
            throw new Exception("La region de l'équipe ne doit pas être vide");
        }

        $this->region = $region;
    }

    public function setTypePeche(string $type): void
    {
        if (empty($type)) {
            throw new Exception("Le type de l'équipe ne doit pas être vide");
        }

        $this->type_peche_favorite = $type;
    }

    public function setIdEquipe(int $id): void
    {
        if ($id < 0) {
            throw new Exception("L'id de l'équipe doit être supérieur à 0");
        }

        $this->id_equipe = $id;
    }
    public function getAllPecheur(): array
    {
        $db = Connexion::connect()->getConnexion();
        $query = "SELECT * FROM pecheur";
        try {
            $stmt = $db->prepare($query);
        } catch (Exception $e) {
            throw new Exception("Une erreur est survenue lors de la requête SQL : " . $query . " : " . $e->getMessage());
        }
        $stmt->execute();
        return $stmt->fetchAll( PDO::FETCH_CLASS, Pecheur::class);
    }
}

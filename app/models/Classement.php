<?php

namespace app\models;

use config\Connexion;
use Exception;
use PDO;

class Classement
{
    public $id_pecheur;
    public $nom_user;
    public $prenom_user;
    public $total_points;
    public $total_poids;

    public function __construct() {}

    public function getIdPecheur(): int
    {
        return $this->id_pecheur;
    }

    public function getNomUser(): string
    {
        return $this->nom_user;
    }

    public function getPrenomUser(): string
    {
        return $this->prenom_user;
    }

    public function getTotalPoints(): int
    {
        return $this->total_points;
    }

    public function getTotalPoids(): float
    {
        return $this->total_poids;
    }



    public function setIdPecheur(int $id_pecheur): void
    {
        if ($id_pecheur <= 0) {
            throw new Exception("Id pêcheur invalide");
        }
        $this->id_pecheur = $id_pecheur;
    }

    public function setNomUser(string $nom_user): void
    {
        if (empty($nom_user)) {
            throw new Exception("Le nom ne doit pas être vide");
        }
        $this->nom_user = $nom_user;
    }

    public function setPrenomUser(string $prenom_user): void
    {
        if (empty($prenom_user)) {
            throw new Exception("Le prénom ne doit pas être vide");
        }
        $this->prenom_user = $prenom_user;
    }

    public function setTotalPoints(int $total_points): void
    {
        if ($total_points < 0) {
            throw new Exception("Total points invalide");
        }
        $this->total_points = $total_points;
    }

    public function setTotalPoids(float $total_poids): void
    {
        if ($total_poids < 0) {
            throw new Exception("Total poids invalide");
        }
        $this->total_poids = $total_poids;
    }

    public static function getClassementsGenerale(): array
    {
        $db = Connexion::connect()->getConnexion();
        $query = "SELECT * FROM classementGeneralPecheur";

        try {
            $stmt = $db->prepare($query);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_CLASS, self::class);
        } catch (Exception $e) {
            throw new Exception(
                "Erreur lors de la requête SQL (classement général) : " . $e->getMessage()
            );
        }
    }

    public static function getClassementsPecheur(int $id_pecheur): array
    {
        $db = Connexion::connect()->getConnexion();
        $query = "SELECT * FROM classementPecheur WHERE id_pecheur = :id_pecheur";
        try {
            $stmt = $db->prepare($query);
            $stmt->execute([':id_pecheur' => $id_pecheur]);
            return $stmt->fetchAll(PDO::FETCH_CLASS, self::class);
        } catch (Exception $e) {
            throw new Exception(
                "Erreur lors de la requête SQL (classement) : " . $e->getMessage()
            );
        }
        if ($stmt->rowCount() > 0) {
            return $stmt->fetchAll(PDO::FETCH_CLASS, self::class);
        } else {
            return [];
        }
    }
}

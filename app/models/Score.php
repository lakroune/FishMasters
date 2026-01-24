<?php

namespace app\models;

use config\Connexion;
use Exception;

class Score
{
    private $total_poids;
    private $total_points;
    private $nb_prises;
    private $id_pecheur;
    private $id_classement;

    public function __construct() {}

    public function getTotalPoids(): float
    {
        return $this->total_poids;
    }
    public function setTotalPoids(float $total_poids): void
    {
        if ($total_poids < 0) {
            throw new Exception("Le total de poids doit être supérieur à 0");
        }
        $this->total_poids = $total_poids;
    }

    public function getTotalPoints(): float
    {
        return $this->total_points;
    }
    public function setTotalPoints(float $total_points): void
    {
        if ($total_points < 0) {
            throw new Exception("Le total de points doit être supérieur à 0");
        }
        $this->total_points = $total_points;
    }

    public function getNbPrises(): int
    {
        return $this->nb_prises;
    }
    public function setNbPrises(int $nb_prises): void
    {
        if ($nb_prises < 0) {
            throw new Exception("Le nombre de prises doit être supérieur à 0");
        }
        $this->nb_prises = $nb_prises;
    }

    public function getIdPecheur(): int
    {
        return $this->id_pecheur;
    }
    public function setIdPecheur(int $id_pecheur): void
    {
        if ($id_pecheur < 0) {
            throw new Exception("L'id du pecheur doit être supérieur à 0");
        }
        $this->id_pecheur = $id_pecheur;
    }

    public function getIdClassement(): int
    {
        return $this->id_classement;
    }
    public function setIdClassement(int $id_classement): void
    {
        if ($id_classement < 0) {
            throw new Exception("L'id du classement doit être supérieur à 0");
        }
        $this->id_classement = $id_classement;
    }

    //addscore

    public function addScore()
    {
        try {

            $sql = "INSERT INTO score(total_poids, total_points, nb_prises, id_pecheur, id_classement)
                    VALUES (?, ?, ?, ?, ?)";

            $stmt = Connexion::connect()->getConnexion()->prepare($sql);

            $stmt->execute([
                $this->total_poids,
                $this->total_points,
                $this->nb_prises,
                $this->id_pecheur,
                $this->id_classement
            ]);


            return true;
        } catch (exception $e) {

            return false;
        }
    }



    public function getScoreByClassement(int $id_classement): ?Score
    {
        $db = Connexion::connect()->getConnexion();
        $sql = "SELECT * FROM scores WHERE id_classement = :id_classement ";
        try {
            $stmt = $db->prepare($sql);
        } catch (Exception $e) {
            throw new Exception("Une erreur est survenue lors de la requête SQL : " . $sql . " : " . $e->getMessage());
        }
        $stmt->execute(['id_classement' => $id_classement]);
        return $stmt->fetchObject(Score::class);
    }

    public static function getScorePecheur(int $id_pecheur): ?Score
    {
        $db = Connexion::connect()->getConnexion();
        $sql = "SELECT * FROM scores WHERE id_pecheur = :id_pecheur ";
        try {
            $stmt = $db->prepare($sql);
        } catch (Exception $e) {
            throw new Exception("Une erreur est survenue lors de la requête SQL : " . $sql . " : " . $e->getMessage());
        }
        $stmt->execute(['id_pecheur' => $id_pecheur]);
        return $stmt->fetchObject(Score::class);
    }
    // public function getScoreByClassement(int $id_classement): ?Score
    // {
    //     $db = Connexion::connect()->getConnexion();
    //     $sql = "SELECT * FROM scores WHERE id_classement = :id_classement ";
    //     try {
    //         $stmt = $db->prepare($sql);
    //     } catch (Exception $e) {
    //         throw new Exception("Une erreur est survenue lors de la requête SQL : " . $sql . " : " . $e->getMessage());
    //     }
    //     $stmt->execute(['id_classement' => $id_classement]);
    //     return $stmt->fetchObject(Score::class);
    // }
}

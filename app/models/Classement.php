<?php

namespace app\models;

use config\Connexion;
use Exception;
use PDO;

class Classement
{
    private $id_classment;
    private $type_classment;
    private $date_classment;
    private $id_competition;

    public function __construct() {}

    public function getIdClassment(): int
    {
        return $this->id_classment;
    }

    public function getTypeClassment(): string
    {
        return $this->type_classment;
    }

    public function getDateClassment(): string
    {
        return $this->date_classment;
    }

    public function getIdCompetition(): int
    {
        return $this->id_competition;
    }



    public function setIdClassment(int $id_classment): void
    {
        if ($id_classment < 0) {
            throw new Exception("L'id du classment doit être supérieur à 0");
        }

        $this->id_classment = $id_classment;
    }

    public function setTypeClassment(string $type_classment): void
    {
        if (empty($type_classment)) {
            throw new Exception("Le type de classment ne doit pas être vide");
        }

        $this->type_classment = $type_classment;
    }

    public function setDateClassment(string $date_classment): void
    {
        if (empty($date_classment)) {
            throw new Exception("La date du classment ne doit pas être vide");
        }

        $this->date_classment = $date_classment;
    }

    public function setIdCompetition(int $id_competition): void
    {
        if ($id_competition < 0) {
            throw new Exception("L'id de la competition doit être supérieur à 0");
        }

        $this->id_competition = $id_competition;
    }


    public function addClassment(): bool
    {
        try {

            $sql = "INSERT INTO classment(type_classment, date_classement, id_competition)
                    VALUES (?, ?, ?)";

            $stmt = Connexion::connect()->getConnexion()->prepare($sql);

            $stmt->execute([
                $this->type_classment,
                $this->date_classment,
                $this->id_competition
            ]);

            return true;
        } catch (exception $e) {

            return false;
        }
    }
    public static function getClassementsGenerale(): array
    {
        $db = Connexion::connect()->getConnexion();
        $query = "SELECT * FROM classementGeneralPecheur";
        try {
            $stmt = $db->prepare($query);
        } catch (Exception $e) {
            throw new Exception("Une erreur est survenue lors de la requête SQL : " . $query . " : " . $e->getMessage());
        }
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            return $stmt->fetchAll(PDO::FETCH_CLASS, Classement::class);
        } else {
            return [];
        }
    }
}

<?php

namespace app\models;

use config\Connexion;
use Exception;
use PDO;

//  id_classement SERIAL PRIMARY KEY,
//     type_classement VARCHAR(50) check (
//         type_classement in ('Individuelle', 'Equipee')
//     ),
//     date_classement TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
//     id_competition INT REFERENCES competitions (id_competition),
//     id_pecheur INT REFERENCES pecheurs (id_user) DEFAULT NULL,
//     id_equipe INT REFERENCES equipes (id_equipe) DEFAULT NULL,
//     rank int DEFAULT 0
class Classement
{
    private int $id_classement;
    private string $type_classement;
    private string $date_classement;
    private int $id_competition;
    private int $id_pecheur;
    private int $id_equipe;
    private int $rank;

    public function __construct() {}

    public function getIdClassement(): int
    {
        return $this->id_classement;
    }

    public function getTypeClassement(): string
    {
        return $this->type_classement;
    }

    public function getDateClassement(): string
    {
        return $this->date_classement;
    }

    public function getIdCompetition(): int
    {
        return $this->id_competition;
    }

    public function getIdPecheur(): int
    {
        return $this->id_pecheur;
    }

    public function getIdEquipe(): int
    {
        return $this->id_equipe;
    }

    public function getRank(): int
    {
        return $this->rank;
    }

    public function setIdClassement(int $id): void
    {
        if ($id <= 0) {
            throw new Exception("L'id du classement doit être supérieur à 0");
        }

        $this->id_classement = $id;
    }

    public function setTypeClassement(string $type): void
    {
        if (empty($type)) {
            throw new Exception("Le type du classement ne doit pas être vide");
        }
        $this->type_classement = $type;
    }


    public function setDateClassement(string $date): void
    {
        if (empty($date)) {
            throw new Exception("La date du classement ne doit pas être vide");
        }
        $this->date_classement = $date;
    }

    public function setIdCompetition(int $id): void
    {
        if ($id <= 0) {
            throw new Exception("L'id de la competition doit être supérieur à 0");
        }
        $this->id_competition = $id;
    }

    public function setIdPecheur(int $id): void
    {
        if ($id <= 0) {
            throw new Exception("L'id du pecheur doit être supérieur à 0");
        }
        $this->id_pecheur = $id;
    }

    public function setIdEquipe(int $id): void
    {
        if ($id <= 0) {
            throw new Exception("L'id de l'équipe doit être supérieur à 0");
        }
        $this->id_equipe = $id;
    }

    public function setRank(int $rank): void
    {
        if ($rank <= 0) {
            throw new Exception("Le rank doit être supérieur à 0");
        }
        $this->rank = $rank;
    }

    public function __toString(): string
    {
        return "Classement : id_classement= $this->id_classement ,type_classement= $this->type_classement ,date_classement= $this->date_classement ,id_competition= $this->id_competition ,id_pecheur= $this->id_pecheur ,id_equipe= $this->id_equipe ,rank= $this->rank";
    }

    public function getIdClassementByPecheurAndCompetition(int $idPecheur, int $idCompetition): int
    {
        $db = Connexion::connect()->getConnexion();
        $requete = "SELECT id_classement FROM classements WHERE id_pecheur = :idPecheur AND id_competition = :idCompetition";
        try {
            $stmt = $db->prepare($requete);
        } catch (Exception $e) {
            throw new Exception("Une erreur est survenue lors de la requête SQL : " . $requete . " : " . $e->getMessage());
        }
        $stmt->bindParam(':idPecheur', $idPecheur);
        $stmt->bindParam(':idCompetition', $idCompetition);
        $stmt->execute();
        $idClassement = $stmt->fetchColumn();
        return $idClassement;
    }
    public function getClassementGeneralePecheurs(): array
    {
        $db = Connexion::connect()->getConnexion();
        $requete = "SELECT * FROM classements WHERE type_classement = 'Individuelle'";
        try {
            $stmt = $db->prepare($requete);
        } catch (Exception $e) {
            throw new Exception("Une erreur est survenue lors de la requête SQL : " . $requete . " : " . $e->getMessage());
        }
        $stmt->execute();
        $classements = $stmt->fetchAll(PDO::FETCH_CLASS, Classement::class);
        return $classements;
    }
    public function getClassementGeneraleEquipes(): array
    {
        $db = Connexion::connect()->getConnexion();
        $requete = "SELECT * FROM classements WHERE type_classement = 'Equipe'";
        try {
            $stmt = $db->prepare($requete);
        } catch (Exception $e) {
            throw new Exception("Une erreur est survenue lors de la requête SQL : " . $requete . " : " . $e->getMessage());
        }
        $stmt->execute();
        $classements = $stmt->fetchAll(PDO::FETCH_CLASS, Classement::class);
        return $classements;
    }
    // public function 
}

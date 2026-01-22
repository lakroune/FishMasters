<?php

namespace app\models;

use config\Connexion;
use Exception;
use PDO;

class Competition


{
    private int $id_competition;
    private string $nom_competition;
    private string $date_create;
    private string $date_debut;
    private string $date_fin;
    private string $type_competition;
    private int $nb_matchs;
    private int $nb_participants;
    private int $id_categorie;



    public function __construct() {}

    public function getId(): int
    {
        return $this->id_competition;
    }

    public function getNom(): string
    {
        return $this->nom_competition;
    }

    public function getDate(): string
    {
        return $this->date_create;
    }

    public function getDateDebut(): string
    {
        return $this->date_debut;
    }

    public function getDateFin(): string
    {
        return $this->date_fin;
    }

    public function getType(): string
    {
        return $this->type_competition;
    }


    public function getNbMatchs(): int
    {
        return $this->nb_matchs;
    }

    public function getNbParticipants(): int
    {
        return $this->nb_participants;
    }

    public function getIdCategorie(): int
    {
        return $this->id_categorie;
    }



    public function setId(int $id): void
    {
        if ($id < 0) {
            throw new Exception("L'id de la competition doit être supérieur à 0");
        }

        $this->id_competition = $id;
    }

    public function setNom(string $nom): void
    {
        if (empty($nom)) {
            throw new Exception("Le nom de la competition ne doit pas être vide");
        }

        $this->nom_competition = $nom;
    }

    public function setDate(string $date): void
    {
        $regex = '/^[0-9]{4}-[0-9]{2}-[0-9]{2}$/';
        if (!preg_match($regex, $date)) {
            throw new Exception("La date de la competition n'est pas au bon format");
        }

        $this->date_create = $date;
    }

    public function setDateDebut(string $date):void
    {
           
    }
    public function __toString()
    {
        return "competition  : id_competition = $this->id_competition, nom_competition = $this->nom_competition, date_create = $this->date_create";
    }
    public function getAllCompetition(): array
    {
        $db = Connexion::connect()->getConnexion();
        $query = "SELECT * FROM competition";
        try {
            $stmt = $db->prepare($query);
        } catch (Exception $e) {
            throw new Exception("Une erreur est survenue lors de la requête SQL : " . $query . " : " . $e->getMessage());
        }
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            return $stmt->fetchAll(PDO::FETCH_CLASS, Competition::class);
        } else {
            return [];
        }
    }
    public function getCompetition($id_competition): ?Competition
    {
        $db = Connexion::connect()->getConnexion();
        $query = "SELECT * FROM competition WHERE id_competition = :id_competition";

        try {
            $stmt = $db->prepare($query);
        } catch (Exception $e) {
            throw new Exception("Une erreur est survenue lors de la requête SQL : " . $query . " : " . $e->getMessage());
        }
        $stmt->bindValue(':id_competition', $id_competition);
        $stmt->execute();
        return $stmt->fetchObject(Competition::class);
    }
}

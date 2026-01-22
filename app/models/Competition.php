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

    public function setDateDebut(string $date): void
    {
        $regex = '/^[0-9]{4}-[0-9]{2}-[0-9]{2}$/';
        if (!preg_match($regex, $date)) {
            throw new Exception("La date de la competition n'est pas au bon format");
        }

        $this->date_debut = $date;
    }

    public function setDateFin(string $date): void
    {
        $regex = '/^[0-9]{4}-[0-9]{2}-[0-9]{2}$/';
        if (!preg_match($regex, $date)) {
            throw new Exception("La date de la competition n'est pas au bon format");
        }

        $this->date_fin = $date;
    }
    public function setType(string $type): void
    {
        if (empty($type)) {
            throw new Exception("Le type de la competition ne doit pas être vide");
        }

        $this->type_competition = $type;
    }
    public function setNbMatchs(int $nb_matchs): void
    {
        if ($nb_matchs < 0) {
            throw new Exception("Le nombre de matchs doit être supérieur à 0");
        }

        $this->nb_matchs = $nb_matchs;
    }
    public function setNbParticipants(int $nb_participants): void
    {
        if ($nb_participants < 0) {
            throw new Exception("Le nombre de participants doit être supérieur à 0");
        }

        $this->nb_participants = $nb_participants;
    }
    public function setIdCategorie(int $id_categorie): void
    {
        if ($id_categorie < 0) {
            throw new Exception("L'id de la categorie doit être supérieur à 0");
        }

        $this->id_categorie = $id_categorie;
    }


    public function __toString()
    {
        return "competition  : id_competition = $this->id_competition, nom_competition = $this->nom_competition, date_create = $this->date_create";
    }

    public function addCompetition(array $data): bool
    {
        $db = Connexion::connect()->getConnexion();
        $query = "INSERT INTO competitions (nom_competition, date_create, date_debut, date_fin, type_competition, nb_matchs, nb_participants, id_categorie) 
        VALUES (:nom_competition, :date_create, :date_debut, :date_fin, :type_competition, :nb_matchs, :nb_participants, :id_categorie)";
        try {
            $stmt = $db->prepare($query);
        } catch (Exception $e) {
            throw new Exception("Une erreur est survenue lors de la requête SQL : " . $query . " : " . $e->getMessage());
            return false;
        }
        try {
            $this->rempirer($data);
        } catch (Exception $e) {
            throw new Exception("erreur : " . $e->getMessage());
            return false;
        }
        $stmt->bindValue(':nom_competition', $this->nom_competition);
        $stmt->bindValue(':date_create', $this->date_create);
        $stmt->bindValue(':date_debut', $this->date_debut);
        $stmt->bindValue(':date_fin', $this->date_fin);
        $stmt->bindValue(':type_competition', $this->type_competition);
        $stmt->bindValue(':nb_matchs', $this->nb_matchs);
        $stmt->bindValue(':nb_participants', $this->nb_participants);
        $stmt->bindValue(':id_categorie', $this->id_categorie);
        if ($stmt->execute()) {
            return true;
        }
        return false;
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
    public function getCompetitionbyId($id_competition): ?Competition
    {
        $db = Connexion::connect()->getConnexion();
        $query = "SELECT * FROM competitions WHERE id_competition = :id_competition";

        try {
            $stmt = $db->prepare($query);
        } catch (Exception $e) {
            throw new Exception("Une erreur est survenue lors de la requête SQL : " . $query . " : " . $e->getMessage());
        }
        $stmt->bindValue(':id_competition', $id_competition);
        $stmt->execute();
        return $stmt->fetchObject(Competition::class);
    }
    private function rempirer(array $data)
    {
        foreach ($data as $key => $value) {
            $method = 'set' . ucfirst($key);
            if (method_exists($this, $method)) {
                $this->$method($value);
            }
        }
    }
}

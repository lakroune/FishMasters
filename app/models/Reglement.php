<?php

namespace app\models;

use config\Connexion;
use Exception;
use PDO;

class Reglement
{
    private int $id_reglement;
    private string $description;
    private string $mode_scoring;
    private float $taille_mini;
    private string $especes_autorisees;
    private int $limite_especes;
    private int $id_competition;

    public function __construct() {}
    public function getIdReglement(): int
    {
        
        return $this->id_reglement;
    }
    public function getDescription(): string
    {
        return $this->description;
    }
    public function getModeScoring(): string
    {
        return $this->mode_scoring;
    }
    public function getTailleMini(): float
    {
        return $this->taille_mini;
    }
    public function getEspecesAutorisees(): string
    {
        return $this->especes_autorisees;
    }
    public function getLimiteEspeces(): int
    {
        return $this->limite_especes;
    }
    public function getIdCompetition(): int
    {
        return $this->id_competition;
    }

    public function setIdReglement(int $id): void
    {
        if ($id < 0) {
            throw new Exception("L'id du reglement doit être supérieur à 0");
        }

        $this->id_reglement = $id;
    }


    public function setDescription(string $description): void
    {
        if (empty($description)) {
            throw new Exception("La description ne doit pas être vide");
        }

        $this->description = $description;
    }

    public function setModeScoring(string $mode): void
    {
        if (empty($mode)) {
            throw new Exception("Le mode de scoring ne doit pas être vide");
        }

        $this->mode_scoring = $mode;
    }

    public function setTailleMini(float $taille): void
    {
        if ($taille < 0) {
            throw new Exception("La taille mini doit être supérieur à 0");
        }

        $this->taille_mini = $taille;
    }

    public function setEspecesAutorisees(string $especes): void
    {
        if (empty($especes)) {
            throw new Exception("Les espèces autorisées ne doivent pas être vides");
        }

        $this->especes_autorisees = $especes;
    }

    public function setLimiteEspeces(int $limite): void
    {
        if ($limite < 0) {
            throw new Exception("La limite d'espèces doit être supérieur à 0");
        }

        $this->limite_especes = $limite;
    }
    public function setIdCompetition(int $id): void
    {
        if ($id < 0) {
            throw new Exception("L'id de la competition doit être supérieur à 0");
        }

        $this->id_competition = $id;
    }
    public function __toString()
    {
        return "reglement: id_reglement=$this->id_reglement";
    }
    public function ajouterReglement(array $data): bool
    {
        $db = Connexion::connect()->getConnexion();
        $query = "INSERT INTO reglements (description, mode_scoring, taille_mini, especes_autorisees, limite_especes, id_competition) VALUES (:description, :mode_scoring, :taille_mini, :especes_autorisees, :limite_especes, :id_competition)";
        try {
            $stmt = $db->prepare($query);
        } catch (Exception $e) {
            throw new Exception("Une erreur est survenue lors de la requête SQL : " . $query . " : " . $e->getMessage());
        }
        $this->rempirer($data);
        $stmt->bindValue(':description', $this->description);
        $stmt->bindValue(':mode_scoring', $this->mode_scoring);
        $stmt->bindValue(':taille_mini', $this->taille_mini);
        $stmt->bindValue(':especes_autorisees', $this->especes_autorisees);
        $stmt->bindValue(':limite_especes', $this->limite_especes);
        $stmt->bindValue(':id_competition', $this->id_competition);
        if ($stmt->execute()) {
            return true;
        }
        return false;
    }
    public function modifierReglement(array $data): bool
    {
        $db = Connexion::connect()->getConnexion();
        $query = "UPDATE reglement SET ";
        try {
            $stmt = $db->prepare($query);
        } catch (Exception $e) {
            throw new Exception("Une erreur est survenue lors de la requête SQL : " . $query . " : " . $e->getMessage());
        }
        $this->rempirer($data);
        $stmt->bindValue(':description', $this->description);
        $stmt->bindValue(':mode_scoring', $this->mode_scoring);
        $stmt->bindValue(':taille_mini', $this->taille_mini);
        $stmt->bindValue(':especes_autorisees', $this->especes_autorisees);
        $stmt->bindValue(':limite_especes', $this->limite_especes);
        $stmt->bindValue(':id_competition', $this->id_competition);
        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    public function getIdReglementById(int $id_reglement): ?Reglement
    {
        $db = Connexion::connect()->getConnexion();
        $query = "SELECT * FROM reglement WHERE id_reglement = :id_reglement";
        try {
            $stmt = $db->prepare($query);
        } catch (Exception $e) {
            throw new Exception("Une erreur est survenue lors de la requête SQL : " . $query . " : " . $e->getMessage());
        }
        $stmt->bindValue(':id_reglement', $id_reglement);
        $stmt->execute();
        return $stmt->fetchObject(Reglement::class);
    }
    public function getAllReglement(): array
    {
        $db = Connexion::connect()->getConnexion();
        $query = "SELECT * FROM reglements";
        try {
            $stmt = $db->prepare($query);
        } catch (Exception $e) {
            throw new Exception("Une erreur est survenue lors de la requête SQL : " . $query . " : " . $e->getMessage());
        }
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_CLASS, Reglement::class);
    }
    public function getIdReglementByIdCompetition(int $id_competition): array
    {
        $db = Connexion::connect()->getConnexion();
        $query = "SELECT * FROM reglement WHERE id_competition = :id_competition";
        try {
            $stmt = $db->prepare($query);
        } catch (Exception $e) {
            throw new Exception("Une erreur est survenue lors de la requête SQL : " . $query . " : " . $e->getMessage());
        }
        $stmt->bindValue(':id_competition', $id_competition);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_CLASS, Reglement::class);
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

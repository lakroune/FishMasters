<?php

namespace app\models;

use config\Connexion;
use Exception;
use PDO;

class Pecheur extends User
{
    private string $photo_pecheur;
    private string $region;
    private string $type_peche_favorite;
    private ?int $id_equipe;
    private PDO $pdo;
    public function __construct()
    {
        parent::__construct();
        $this->pdo = Connexion::connect()->getConnexion();
    }

    public function __toString()
    {
        return parent::__toString() . "pecheur : photo_pecheur = $this->photo_pecheur, region = $this->region, type_peche_favorite = $this->type_peche_favorite, id_equipe = $this->id_equipe";
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
    public function getPhotoPecheur(): string
    {
        return $this->photo_pecheur;
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
    public static function getAllPecheur(): array
    {

        $query = "SELECT * FROM pecheurs";
        try {
            $stmt =  self::$pdo->prepare($query);
        } catch (Exception $e) {
            throw new Exception("Une erreur est survenue lors de la requête SQL : " . $query . " : " . $e->getMessage());
        }
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_CLASS, Pecheur::class);
    }
    public static function getPecheurById(int $id): ?Pecheur
    {

        $query = "SELECT * FROM pecheurs WHERE id_user = :id";
        try {
            $stmt =  self::$pdo->prepare($query);
        } catch (Exception $e) {
            throw new Exception("Une erreur est survenue lors de la requête SQL : " . $query . " : " . $e->getMessage());
        }
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetchObject(Pecheur::class);
    }

    public  function creer(): bool
    {
        try {

            $sql = "INSERT INTO pecheurs(nom_user, prenom_user, email, password_user, role_user, photo_pecheur, region, type_peche_favorite, id_equipe) VALUES (?,?,?,?,?,?,?,?,?)";
            try {
                $stmt =  $this->pdo->prepare($sql);
            } catch (Exception $e) {
                new Exception("ee" . $e);
            }
            $stmt->execute([
                $this->nom_user,
                $this->prenom_user,
                $this->email,
                $this->password_user,
                $this->role_user,
                $this->photo_pecheur,
                $this->region,
                $this->type_peche_favorite
            ]);
            return true;
        } catch (Exception $e) {
            return false;
        }
    }

    public static function afficherPecheure()
    {



        $sql = "
            SELECT 
                p.nom_user,
                p.region,
                p.type_peche_favorite,
                p.id_pecheur,
                COUNT(pr.id_prise)                AS nb_prises,
                SUM(pr.poids)                     AS total_poids,
                SUM(pr.poids * e.coefficient)     AS total_points
            FROM prises pr
            JOIN especes e ON pr.id_espece = e.id_espece
            JOIN pecheurs p ON pr.id_pecheur = p.id_use
            WHERE e.id_delete = 0
            GROUP BY p.id_pecheur
        ";

        $stmt = self::$pdo->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


    public function getCountPecheure()
    {
        $sql = "SELECT * FROM pecheurs";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        return count($stmt->fetchAll(PDO::FETCH_ASSOC));
    }
}

<?php

namespace app\models;


use config\Connexion;
use Exception;
use PDO;

class Classement
{
    private int $id_classement;
    private string $type_classement;
    private string $date_classement;
    private int $id_competition;
    private ?int $id_pecheur;
    private ?int $id_equipe;
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
        if ($id <= 0 ) {
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
    public static function getClassementGeneralePecheurs(): array
    {
        $db = Connexion::connect()->getConnexion();
        $requete = "SELECT * FROM classements WHERE type_classement = 'Individuelle' ORDER BY rank ASC";
        try {
            $stmt = $db->prepare($requete);
        } catch (Exception $e) {
            throw new Exception("Une erreur est survenue lors de la requête SQL : " . $requete . " : " . $e->getMessage());
        }
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_CLASS, Classement::class);
    }
    public static function getClassementGeneraleEquipes(): array
    {
        $db = Connexion::connect()->getConnexion();
        $requete = "SELECT * FROM classements WHERE type_classement = 'Equipee'";
        try {
            $stmt = $db->prepare($requete);
        } catch (Exception $e) {
            throw new Exception("Une erreur est survenue lors de la requête SQL : " . $requete . " : " . $e->getMessage());
        }
        $stmt->execute();
        $classements = $stmt->fetchAll(PDO::FETCH_CLASS, Classement::class);
        return $classements;
    }
    public static function getClassementByTypeEau(string $type_eau): array
    {
        $db = Connexion::connect()->getConnexion();
        $requete = "SELECT cl.* from classements cl inner join  competitions comp on cl.id_competition = comp.id_competition inner join categories cat on comp.id_categorie = cat.id_categorie inner join spot_peches sp on cat.id_categorie = sp.id_categorie where sp.type_eau = :type_eau group by cl.id_classement order by cl.rank asc";
        try {
            $stmt = $db->prepare($requete);
        } catch (Exception $e) {
            throw new Exception("Une erreur est survenue lors de la requête SQL : " . $requete . " : " . $e->getMessage());
        }
        $stmt->bindParam(':type_eau', $type_eau);
        $stmt->execute();
        $classements = $stmt->fetchAll(PDO::FETCH_CLASS, Classement::class);
        return $classements;
    }
    public static function getClassementByEspece(int $id_espece): array
    {
        $db = Connexion::connect()->getConnexion();
        $requete = "SELECT cl.* FROM classements cl inner join competitions com on cl.id_competition = com.id_competition inner join  pecheurs p on com.id_competition = p.id_competition inner join prises pr on p.id_user = pr.id_pecheur inner join especes e on pr.id_espece = e.id_espece where e.id_espece = :id_espece group by cl.id_classement order by cl.rank asc";
        try {
            $stmt = $db->prepare($requete);
        } catch (Exception $e) {
            throw new Exception("Une erreur est survenue lors de la requête SQL : " . $requete . " : " . $e->getMessage());
        }
        $stmt->bindParam(':id_espece', $id_espece);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_CLASS, Classement::class);
    }
    public static function getClassementByNamePecheur(string $name): array
    {
        $db = Connexion::connect()->getConnexion();
        $requete = "SELECT cl.* FROM classements cl inner join pecheurs p on cl.id_pecheur = p.id_user where concat(p.nom_user, ' ', p.prenom_user) like :name group by cl.id_classement order by cl.rank asc";
        try {
            $stmt = $db->prepare($requete);
        } catch (Exception $e) {
            throw new Exception("Une erreur est survenue lors de la requête SQL : " . $requete . " : " . $e->getMessage());
        }
        $name = '%' . $name . '%';
        $stmt->bindParam(':name', $name);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_CLASS, Classement::class);
    }
}

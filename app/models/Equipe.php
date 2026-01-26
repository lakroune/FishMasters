<?php

namespace app\models;

use Exception, PDO, app\models\Pecheur;
use config\Connexion;


class Equipe
{
    private int $id_equipe;
    private string $nom_equipe;
    private int $nb_equipe;
    private string $type_peche_favorite;
    private int $id_competition;
    private static ?PDO $pdo = null;
    public function __construct()
    {
        self::$pdo = Connexion::connect()->getConnexion();
    }

    

    public function all(): array
    {
        $stmt = self::$pdo->query("SELECT * FROM equipes");
        $rows = $stmt->fetchAll(PDO::FETCH_OBJ);
        $equipes = [];
        foreach ($rows as $row) {
            $equipe = new Equipe();
            $equipe->setIdCompetition($row->id_competition);
            $equipe->setTypePeche($row->type_peche_favorite);
            $equipe->setNbEquipe($row->nb_equipe);
            $equipe->setIdEquipe($row->id_equipe);
            $equipe->setNomEquipe($row->nom_equipe);
            $equipes[] = $equipe;
        }
        return $equipes;
    }

    public function find(int $id): ?Equipe
    {
        $stmt = self::$pdo->prepare(
            "SELECT * FROM equipe WHERE id = :id"
        );
        if(!$stmt->execute(['id' => $id])) return null;
        $row = $stmt->fetch() ?: null;
        $equipe = new Equipe();
        $equipe->setIdCompetition($row->id_competition);
        $equipe->setTypePeche($row->type_peche_favorite);
        $equipe->setNbEquipe($row->nb_equipe);
        $equipe->setIdEquipe($row->id_equipe);
        $equipe->setNomEquipe($row->nom_equipe);
        return $equipe;
    }

    public function create(string $nom_equipe, string $nb_equipe, string $type_peche_favorite): bool
    {
        $stmt = self::$pdo->prepare(
            "INSERT INTO equipe (nom_equipe, nb_equipe, type_peche_favorite) VALUES (:nom_equipe, :nb_equipe, :type_peche_favorite)"
        );
        return $stmt->execute([
            'nom_equipe' => $nom_equipe,
            'nb_equipe' => $nb_equipe,
            'type_peche_favorite' => $type_peche_favorite
        ]);
    }

    public function addMembre(int $equipeId, int $pecheurId): bool
    {
        $stmt = self::$pdo->prepare(
            "update pecheur set id_equipe = :id_equipe where id_user = :id_user"
        );
        return $stmt->execute([
            'id_equipe' => $equipeId,
            'id_user' => $pecheurId
        ]);
    }

    public function getMembres(int $equipeId): array
    {
        $stmt = self::$pdo->prepare(
            "SELECT p.*
             FROM pecheur p
             JOIN equipe e ON p.id_equipe = e.id
             WHERE e.id = :id"
        );

        $stmt->execute(['id' => $equipeId]);
        return $stmt->fetchAll(PDO::FETCH_OBJ);
        $memberes = [];
        foreach ($rows as $row) {
            $membre = new Pecheur();
            $membre->setIdEquipe($row->id_equipe);
            $membre->setTypePeche($row->type_peche_favorite);
            $membre->setRegion($row->region);
            $membre->setPhotoPecheur($row->photo_pecheur);
            $membre->setRole($row->role_user);
            $membre->setPassword($row->password_user);
            $membre->setEmail($row->email);
            $membre->setPrenom($row->prenom_user);
            $membre->setNom($row->nom_user);
            $membre->setId($row->id_user);
            $memberes[] = $membre;
        }
        return $equipes;
    }

    public function getId(): int
    {
        return $this->id_equipe;
    }

    public function getNom(): string
    {
        return $this->nom_equipe;
    }

    public function getNb(): int
    {
        return $this->nb_equipe;
    }

    public function getTypePeche(): string
    {
        return $this->type_peche_favorite;
    }

    public function getIdCompetition(): int
    {
        return $this->id_competition;
    }

    public function setIdEquipe(int $id): void
    {
        if ($id < 0) {
            throw new Exception("L'id de l'équipe doit être supérieur à 0");
        }

        $this->id_equipe = $id;
    }

    public function setNomEquipe(string $nom): void
    {
        if (empty($nom)) {
            throw new Exception("Le nom de l'équipe ne doit pas être vide");
        }

        $this->nom_equipe = $nom;
    }

    public function setNbEquipe(int $nb): void
    {
        if ($nb < 0) {
            throw new Exception("Le nombre d'équipes doit être supérieur à 0");
        }

        $this->nb_equipe = $nb;
    }

    public function setTypePeche(string $type): void
    {
        $this->type_peche_favorite = $type;
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
        return "equipe : id_equipe = $this->id_equipe, nom_equipe = $this->nom_equipe, nb_equipe = $this->nb_equipe, type_peche = $this->type_peche_favorite, id_competition = $this->id_competition";
    }
}

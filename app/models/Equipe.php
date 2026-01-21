<?php

namespace app\models;

use Exception, PDO;
use \config\Connection as Connection;


class Equipe
{
    private int $id_equipe;
    private string $nom_equipe;
    private int $nb_equipe;
    private string $type_peche_favorite;
    private int $id_competition;
    private array $membres;
    private static ?PDO $pdo = null;
    public function __construct(){
        self::$pdo = Connection::connect()->getConnexion();
    }


    public function all(): array
    {
        $stmt = $this->pdo->query("SELECT * FROM equipes");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function find(int $id): ?array
    {
        $stmt = $this->pdo->prepare(
            "SELECT * FROM equipes WHERE id = :id"
        );
        $stmt->execute(['id' => $id]);
        return $stmt->fetch() ?: null;
    }

    public function create(string $nom, string $region): bool
    {
        $stmt = $this->pdo->prepare(
            "INSERT INTO equipes (nom, region) VALUES (:nom, :region)"
        );
        return $stmt->execute([
            'nom' => $nom,
            'region' => $region
        ]);
    }

    /* ==========================
       Team logic
       ========================== */

    public function addMembre(int $equipeId, int $pecheurId): bool
    {
        $stmt = $this->pdo->prepare(
            "INSERT INTO equipe_pecheur (equipe_id, pecheur_id)
             VALUES (:equipe, :pecheur)"
        );

        return $stmt->execute([
            'equipe' => $equipeId,
            'pecheur' => $pecheurId
        ]);
    }

    public function getMembres(int $equipeId): array
    {
        $stmt = $this->pdo->prepare(
            "SELECT p.*
             FROM pecheurs p
             JOIN equipe_pecheur ep ON p.id = ep.pecheur_id
             WHERE ep.equipe_id = :id"
        );

        $stmt->execute(['id' => $equipeId]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
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

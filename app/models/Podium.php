<?php

namespace app\models;

use config\Connexion;
use PDO;

class Podium
{
    private PDO $db;

    public function __construct()
    {
        $this->db = Connexion::connect()->getConnexion();
    }

    public function top3General(): array
    {
        $sql = "
            SELECT nom_user, prenom_user, total_points
            FROM classementGeneralPecheur
            ORDER BY rang_general
            LIMIT 3
        ";

        return $this->db->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }

    public function top3ByCompetition(int $idCompetition): array
    {
        $sql = "
            SELECT nom_user, prenom_user, total_points
            FROM classementPecheur
            WHERE id_competition = :id
            ORDER BY rank
            LIMIT 3
        ";

        $stmt = $this->db->prepare($sql);
        $stmt->execute(['id' => $idCompetition]);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getCompetitions(): array
    {
        return $this->db
            ->query("SELECT id_competition, nom_competition FROM competitions")
            ->fetchAll(PDO::FETCH_ASSOC);
    }
}

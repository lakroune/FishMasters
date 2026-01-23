<?php

namespace app\models;

use PDO;
use Exception;
use config\Connexion;

class Subscribe
{
    private PDO $pdo;

    public function __construct()
    {
        $this->pdo = Connexion::connect()->getConnexion();
    }

    public function create(int $id_fan, int $id_pecheur): bool
    {
        try {
            $stmt = $this->pdo->prepare("
                INSERT INTO subscriptions (id_fan, id_pecheur)
                VALUES (:id_fan, :id_pecheur)
            ");

            return $stmt->execute([
                'id_fan' => $id_fan,
                'id_pecheur' => $id_pecheur
            ]);
        } catch (Exception $e) {
            return false;
        }
    }


    public function isSubscribed(int $id_user, int $id_pecheur): bool
    {
        $stmt = $this->pdo->prepare("
            SELECT COUNT(*)
            FROM subscriptions
            WHERE id_user = :id_user AND id_pecheur = :id_pecheur
        ");
        $stmt->execute([
            'id_user' => $id_user,
            'id_pecheur' => $id_pecheur
        ]);

        return $stmt->fetchColumn() > 0;
    }

    public function getByUser(int $id_fan): array
    {
        $stmt = $this->pdo->prepare("
            SELECT *
            FROM subscriptions
            WHERE id_fan = :id_fan
        ");
        $stmt->execute(['id_fan' => $id_fan]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function delete(int $id_fan, int $id_pecheur): bool
    {
        $stmt = $this->pdo->prepare("
            DELETE FROM subscriptions
            WHERE id_fan = :id_fan AND id_pecheur = :id_pecheur
        ");
        return $stmt->execute([
            'id_fan' => $id_fan,
            'id_pecheur' => $id_pecheur
        ]);
    }
}

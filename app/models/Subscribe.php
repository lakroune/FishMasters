<?php

namespace app\models;

use PDO, DateTime;

class Subscribe
{

    private PDO $pdo;
    private int $subscribe_id;
    private int $pecheur_id;
    private DateTime $create_at;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }
    public function add(int $fanId, int $pecheurId): bool
    {
        $stmt = $this->pdo->prepare(
            "INSERT INTO subscriptions (fan_id, pecheur_id)
             VALUES (:fan, :pecheur)"
        );

        return $stmt->execute([
            'fan' => $fanId,
            'pecheur' => $pecheurId
        ]);
    }

    public function remove(int $fanId, string $type, int $targetId): bool
    {
        $stmt = $this->pdo->prepare(
            "DELETE FROM subscriptions
             WHERE fan_id = :fan
               AND target_type = :type
               AND target_id = :target"
        );

        return $stmt->execute([
            'fan' => $fanId,
            'type' => $type,
            'target' => $targetId
        ]);
    }

    public function getFanSubscriptions(int $fanId): array
    {
        $stmt = $this->pdo->prepare(
            "SELECT * FROM subscriptions
             WHERE fan_id = :fan"
        );

        $stmt->execute(['fan' => $fanId]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function isSubscribed(int $fanId, string $type, int $targetId): bool
    {
        $stmt = $this->pdo->prepare(
            "SELECT COUNT(*) FROM subscriptions
             WHERE fan_id = :fan
               AND target_type = :type
               AND target_id = :target"
        );

        $stmt->execute([
            'fan' => $fanId,
            'type' => $type,
            'target' => $targetId
        ]);

        return $stmt->fetchColumn() > 0;
    }
}

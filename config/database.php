<?php

namespace config;

use PDO;
use PDOException;

class Connexion
{
    private string $nomDB = "FISHMASTERS";
    private string $userDB = "postgres";
    private string $passDB = "123456";
    private string $hostDB = "localhost";
    private int $portDB = 5432;

    private ?PDO $pdo = null;
    private static ?Connexion $instance = null;

    private function __construct()
    {
        try {
            $dsn = "pgsql:host={$this->hostDB};port={$this->portDB};dbname={$this->nomDB}";
            $this->pdo = new PDO($dsn, $this->userDB, $this->passDB);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            throw new PDOException("Connection failed: " . $e->getMessage());
        }
    }

    public static function connect(): Connexion
    {
        if (self::$instance === null) {
            self::$instance = new Connexion();
        }
        return self::$instance;
    }

    public function getConnexion(): PDO
    {
        return $this->pdo;
    }
}

Connexion::connect()->getConnexion();

<?php

namespace config;

use PDO;
use PDOException;

class Connexion
{
    private string $nomDB = "masterfich";
    private string $userDB = "admin";
    private string $passDB = "af22c17a3e7b0a2d1800ea79";
    private string $hostDB = "www.dockhosting.dev";
    private int $portDB = 49581;

    private ?PDO $pdo = null;
    private static ?Connexion $instance = null;

    private function __construct()
    {
        try {
            $dsn = "pgsql:host={$this->hostDB};port={$this->portDB};dbname={$this->nomDB}";
            $this->pdo = new PDO($dsn, $this->userDB, $this->passDB);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "yhn_";
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
       echo "hellow";
        return $this->pdo;
    }
}

Connexion::connect()->getConnexion();


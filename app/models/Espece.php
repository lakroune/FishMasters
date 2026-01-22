<?php

namespace app\models;

use Exception, PDO;
use config\Connexion;


class Espece
{
    private int $id_espece;
    private string $nom_espece;
    private int $coefficient;
    private string $description;
    private PDO $pdo;


    public function __construct()
    {
        self::$pdo = Connexion::connect()->getConnexion();
    }

    public function getAll(): array
    {
        $stmt = $this->pdo->query("SELECT * FROM espece");
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $especes = [];

        foreach ($rows as $row) {
            $espece = new Espece();
            $espece->setIdEspece($row['id_espece']);
            $espece->setNomEspece($row['nom_espece']);
            $espece->setCoefficient($row['coefficient']);
            $espece->setDescription($row['description']);

            $especes[] = $espece;
        }

        return $especes;
    }

    public function find(int $id): ?Espece
    {
        $stmt = $this->pdo->prepare(
            "SELECT * FROM espece WHERE id_espece = :id"
        );
        $stmt->execute(['id' => $id]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$row) {
            return null;
        }

        $espece = new Espece();
        $espece->setIdEspece($row['id_espece']);
        $espece->setNomEspece($row['nom_espece']);
        $espece->setCoefficient($row['coefficient']);
        $espece->setDescription($row['description']);

        return $espece;
    }



    public function __toString()
    {
        return "espece : id_espece = $this->id_espece, nom_espece = $this->nom_espece, coefficient = $this->coefficient, description = $this->description";
    }

    public function getIdEspece(): int
    {
        return $this->id_espece;
    }

    public function getNomEspece(): string
    {
        return $this->nom_espece;
    }

    public function getCoefficient(): int
    {
        return $this->coefficient;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function setIdEspece(int $id): void
    {
        if ($id < 0) {
            throw new Exception("L'id de l'espece doit être supérieur à 0");
        }

        $this->id_espece = $id;
    }

    public function setNomEspece(string $nom): void
    {
        if (empty($nom)) {
            throw new Exception("Le nom de l'espece ne doit pas être vide");
        }

        $this->nom_espece = $nom;
    }

    public function setCoefficient(int $coefficient): void
    {
        if ($coefficient < 0) {
            throw new Exception("Le coefficient doit être supérieur à 0");
        }

        $this->coefficient = $coefficient;
    }

    public function setDescription(string $description): void
    {
        if (empty($description)) {
            throw new Exception("La description de l'espece ne doit pas être vide");
        }

        $this->description = $description;
    }
}

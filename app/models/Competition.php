<?php

namespace app\models;

use Exception;

class Competition


{
    private int $id_competition;
    private string $nom_competition;
    private string $date_create;


    public function __construct() {}

    public function getId(): int
    {
        return $this->id_competition;
    }

    public function getNom(): string
    {
        return $this->nom_competition;
    }

    public function getDate(): string
    {
        return $this->date_create;
    }

    public function setId(int $id): void
    {
        if ($id < 0) {
            throw new Exception("L'id de la competition doit être supérieur à 0");
        }

        $this->id_competition = $id;
    }

    public function setNom(string $nom): void
    {
        if (empty($nom)) {
            throw new Exception("Le nom de la competition ne doit pas être vide");
        }

        $this->nom_competition = $nom;
    }

    public function setDate(string $date): void
    {
        $regex = '/^[0-9]{4}-[0-9]{2}-[0-9]{2}$/';
        if (!preg_match($regex, $date)) {
            throw new Exception("La date de la competition n'est pas au bon format");
        }

        $this->date_create = $date;
    }
    public function __toString()
    {
        return "competition  : id_competition = $this->id_competition, nom_competition = $this->nom_competition, date_create = $this->date_create";
    }
}

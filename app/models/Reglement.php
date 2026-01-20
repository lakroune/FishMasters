<?php

namespace app\models;

use Exception;

class Reglement
{
    private int $id_reglement;
    private string $description;
    private string $mode_scoring;
    private float $taille_mini;
    private string $especes_autorisees;
    private int $limite_especes;
    private int $id_competition;

    public function __construct() {}
    public function getIdReglement(): int
    {
        return $this->id_reglement;
    }
    public function getDescription(): string
    {
        return $this->description;
    }
    public function getModeScoring(): string
    {
        return $this->mode_scoring;
    }
    public function getTailleMini(): float
    {
        return $this->taille_mini;
    }
    public function getEspecesAutorisees(): string
    {
        return $this->especes_autorisees;
    }
    public function getLimiteEspeces(): int
    {
        return $this->limite_especes;
    }
    public function getIdCompetition(): int
    {
        return $this->id_competition;
    }

    public function setIdReglement(int $id): void
    {
        if ($id < 0) {
            throw new Exception("L'id du reglement doit être supérieur à 0");
        }

        $this->id_reglement = $id;
    }


    public function setDescription(string $description): void
    {
        if (empty($description)) {
            throw new Exception("La description ne doit pas être vide");
        }

        $this->description = $description;
    }

    public function setModeScoring(string $mode): void
    {
        if (empty($mode)) {
            throw new Exception("Le mode de scoring ne doit pas être vide");
        }

        $this->mode_scoring = $mode;
    }

    public function setTailleMini(float $taille): void
    {
        if ($taille < 0) {
            throw new Exception("La taille mini doit être supérieur à 0");
        }

        $this->taille_mini = $taille;
    }

    public function setEspecesAutorisees(string $especes): void
    {
        if (empty($especes)) {
            throw new Exception("Les espèces autorisées ne doivent pas être vides");
        }

        $this->especes_autorisees = $especes;
    }

    public function setLimiteEspeces(int $limite): void
    {
        if ($limite < 0) {
            throw new Exception("La limite d'espèces doit être supérieur à 0");
        }

        $this->limite_especes = $limite;
    }
    public function setIdCompetition(int $id): void
    {
        if ($id < 0) {
            throw new Exception("L'id de la competition doit être supérieur à 0");
        }

        $this->id_competition = $id;
    }
    public function __toString()
    { // TODO: Implement __toString() method.
        return "reglement: id_reglement=$this->id_reglement";
    }
}

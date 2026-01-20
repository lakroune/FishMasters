<?php

namespace app\models;

use Exception;


class Equipe
{
    private int $id_equipe;
    private string $nom_equipe;
    private int $nb_equipe;
    private string $type_peche_favorite;
    private int $id_competition;
    public function __construct() {}

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

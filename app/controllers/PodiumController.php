<?php

namespace app\controllers;

use app\models\Podium;

class PodiumController
{
    private Podium $podium;

    public function __construct()
    {
        $this->podium = new Podium();
    }

    public function index()
    {
        $title = "Classement Général";
        $top3  = $this->podium->top3General();
        $competitions = $this->podium->getCompetitions();
        $currentCompetition = null;

        require_once __DIR__ . '/../views/podium.php';
    }

    public function competition($idCompetition)
    {
        $title = "Podium de la compétition";
        $top3  = $this->podium->top3ByCompetition((int)$idCompetition);
        $competitions = $this->podium->getCompetitions();
        $currentCompetition = (int)$idCompetition;

        require_once __DIR__ . '/../views/podium.php';
    }
}

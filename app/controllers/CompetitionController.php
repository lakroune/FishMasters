<?php

namespace app\controllers;

use app\models\Competition;
use app\models\SpotPeche;
use app\models\Reglement;

class CompetitionController
{

    public function index()
    {
        $competitions = Competition::getAllCompetition();
        $spotsPeches = SpotPeche::getAllSpotPeche();
        $reglements = (new Reglement())->getAllReglement();
        require_once "app/views/calendrier.php";
    }
    public function default()
    {
        $this->index();
    }
    
}

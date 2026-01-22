<?php

namespace app\controllers;

use app\models\Competition;
use app\models\SpotPeche;

class CompetitionController
{

    public function index()
    {
        $competitions = Competition::getAllCompetition();
        $spotsPeches = SpotPeche::getAllSpotPeche();
        require_once(PATH_ROOT . "app/views/calendrier.php");
    }
    public function default()
    {
        $this->index();
    }
    
}

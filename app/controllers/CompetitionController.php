<?php
<<<<<<< HEAD
    namespace app\controllers;



Class CompetitionController
=======

namespace app\controllers;

use app\models\Competition;
use app\models\SpotPeche;
use app\models\Reglement;

class CompetitionController
>>>>>>> origin/feature/models
{

    public function index()
    {
<<<<<<< HEAD
        require_once __DIR__ . '/../views/addCompetition.php';
    }
    
    public function addComptition()
    {

    }

}

?>
=======
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
>>>>>>> origin/feature/models

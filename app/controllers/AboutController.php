<?php

namespace app\controllers;
use app\models\Competition;
use app\models\Equipe;
use app\models\Pecheur;
use app\models\SpotPeche;

class AboutController
{
    public function index()
    {
        require_once __DIR__ . '/../views/about.php';
    }

    


}

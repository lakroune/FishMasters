<?php

namespace app\controllers;

use app\models\Classement;
use app\models\Pecheur;

class ClassementController
{
    public function index()
    {
        $classements = Classement::getClassementsGenerale();
        echo json_encode($classements);
        foreach ($classements as $classement) {
            echo $classement->getIdClassment();
        }
        // echo $classements->getIdCompetition();
        $pecheur = new Pecheur();
        require_once __DIR__ . '/../views/classement.php';
    }
    public function default()
    {
        $this->index();
    }
    public function filter()
    {
        
        require_once __DIR__ . '/../views/classement.php';
    }
}

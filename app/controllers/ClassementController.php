<?php

namespace app\controllers;

use app\models\Classement;
use app\models\Pecheur;
use app\models\Score;

class ClassementController
{
    public function index()
    {
        $pecheur = new Pecheur();
        $score = new Score();
        $classements = Classement::getClassementGeneralePecheurs();
        foreach ($classements as $classement) {
            $array_classements[] = [$classement, $pecheur->getPecheurById($classement->getIdPecheur()), $score->getScoreByClassement($classement->getIdClassement())];
        }
        
        require_once __DIR__ . '/../views/classement.php';
    }
    public function default()
    {
        $this->index();
    }
    public function filter()
    {
        $pecheur = new Pecheur();
        if (isset($_POST['spot']) && isset($_POST['exper'])) {
            if ($_POST['spot'] == "all") {
                $classements = Classement::getClassementGeneralePecheurs();
                foreach ($classements as $classement) {
                    $array_classements[] = [$classement, $pecheur->getPecheurById($classement->getIdPecheur())];
                }
                require_once __DIR__ . '/../views/classement.php';
            } elseif ($_POST['exper'] == "mer") {
                $classements = Classement::getClassementByTypeEau("Mer");
                foreach ($classements as $classement) {
                    $array_classements[] = [$classement, $pecheur->getPecheurById($classement->getIdPecheur())];
                }
                require_once __DIR__ . '/../views/classement.php';
            } elseif ($_POST['spot'] == "eaudouce") {
                $classements = Classement::getClassementByTypeEau("Eau Douce");
                foreach ($classements as $classement) {
                    $array_classements[] = [$classement, $pecheur->getPecheurById($classement->getIdPecheur())];
                }
                require_once __DIR__ . '/../views/classement.php';
            } else {
                $this->index();
            }
        }
    }
    
}

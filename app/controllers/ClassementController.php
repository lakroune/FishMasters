<?php

namespace app\controllers;

use app\models\Classement;
use app\models\Pecheur;

class ClassementController
{
    public function index()
    {
        $pecheur = new Pecheur();
        $classements = Classement::getClassementGeneralePecheurs();
        foreach ($classements as $classement) {
            $array_classements[] = [$classement, $pecheur->getPecheurById($classement->getIdPecheur())];
        }
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

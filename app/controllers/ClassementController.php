<?php

namespace app\controllers;

use app\models\Classement;
use app\models\Pecheur;

class ClassementController
{
    public function index()
    {
        require_once __DIR__ . '/../views/classement.php';
    }
    public function default()
    {
        $this->index();
    }
    public function filter()
    {
        $classements = Classement::getClassementsGenerale();
        $lesTrois = array_slice($classements, 0, 3);
        require_once __DIR__ . '/../views/classement.php';
    }
}

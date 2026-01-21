<?php

namespace app\controllers;

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
        $p = new Pecheur();
        $p->getAllPecheur();
    
        require_once __DIR__ . '/../views/classement.php';
    }
}

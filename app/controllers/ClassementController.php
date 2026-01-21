<?php

namespace app\controllers;

<<<<<<< HEAD
=======
use app\models\Pecheur;

>>>>>>> 778b7def51f4cd8a64d05903ff0f16cf811db5b2
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
<<<<<<< HEAD
       print_r($_POST);

=======
        $p = new Pecheur();
        $p->getAllPecheur();
    
>>>>>>> 778b7def51f4cd8a64d05903ff0f16cf811db5b2
        require_once __DIR__ . '/../views/classement.php';
    }
}

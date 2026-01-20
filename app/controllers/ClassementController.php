<?php

namespace app\controllers;

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
       print_r($_POST);

        require_once __DIR__ . '/../views/classement.php';
    }
}

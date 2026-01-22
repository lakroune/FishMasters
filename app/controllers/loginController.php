<?php

namespace app\controllers;

use config\Connexion;
use PDO;
use app\models\Pecheur;
use app\models\User;

class LoginController
{
    private User $user;

    public function index()
    {
        require_once __DIR__ . '/../views/login.php';

    }
    public function default()
    {
        $this->index();
    }

    public function login()
    {
        $this->user = new User();
        if ($this->user->register($_POST))
            header("location: " . PATH_ROOT . "/login");
    }
}

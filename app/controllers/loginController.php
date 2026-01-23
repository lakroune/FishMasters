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
        if (isset($_POST['login'])) {

            $email = trim($_POST['email']);
            $password = $_POST['passwordUser'];

            if (empty($email) || empty($password)) {
                header("Location:  " . PATH_ROOT . "/login");
                exit;
            }
            $user = User::findByEmail($email);

            if (password_verify($password, $user->getPassword())) {
                $_SESSION['User'] = $user;
                if ($user->getRole() === "ADMIN") {
                    header("Location: ./dash_admin");
                } elseif ($user->getRole() === "PECHEUR") {
                    header("Location: ./Profile_Pecheur");
                } elseif ($user->getRole() === "FAN") {
                    header("Location: ./Profile_Fan");
                }
                exit;
            } else {
                header("Location: " . PATH_ROOT . "/login");
                exit;
            }
        }
    }
    public function error()
    {
        echo "<script>alert('Veuillez remplir tous les champs')</script>";
        require __DIR__ . '/../views/login.php';
    }

    // if ($this->user->($_POST))
    //     header("location: " . PATH_ROOT . "/login");
}

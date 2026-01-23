<?php

namespace app\controllers;

use Config\Connexion;
use PDO;
use app\models\Pecheur;
use app\models\Fan;

class signupController
{
    public function index()
    {
        require_once __DIR__ . '/../views/signup.php';
    }
    public function default()
    {
        $this->index();
    }
    public function signup()
    {
        $pech = new Pecheur();
        $fans = new Fan();

        $filename = $_FILES["photoPecheur"]['name'];
        $tempname = $_FILES["photoPecheur"]['tmp_name'];

        $folder = "uploads/" . "fish_master_" . time() . "_" . $filename;

        if (move_uploaded_file($tempname, $folder)) {
            if ($_POST['roleUser'] == "PECHEUR") {
                $pech->setNom($_POST['nomUser'] ?? '');
                $pech->setPrenom($_POST['prenomUser'] ?? '');
                $pech->setEmail($_POST['emailUser'] ?? '');
                $pech->setRole($_POST['roleUser'] ?? '');
                $pech->setRegion($_POST['region'] ?? '');
                $pech->setTypePeche($_POST['type_peche_favorite'] ?? '');
                $pech->setPhotoPecheur($filename);
                $password_hash = password_hash($_POST['passwordUser'], PASSWORD_BCRYPT);
                $pech->setPassword($password_hash);
                if ($pech->creer()) {
                    header('Location: ' . PATH_ROOT . '/login');
                    exit;
                } else {
                    header('Location: ' . PATH_ROOT . '/signup/error');
                    exit;
                }
            } elseif ($_POST['roleUser'] == "FAN") {
                if ($fans->register($_POST)) {
                    header('Location: ' . PATH_ROOT . '/login');
                } else {
                    header('Location: ' . PATH_ROOT . '/signup/error');
                    exit;
                }
            } else {
                header('Location: ' . PATH_ROOT . '/signup/error');
            }
        } else {
            header('Location: ' . PATH_ROOT . '/signup/error');
        }
    }
}

<?php

namespace app\controllers;

use Config\Connexion;
use PDO;
use app\models\Pecheur;
use app\models\Fan;
use Exception;

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


        if ($_POST['role'] == "PECHEUR") {
            if (move_uploaded_file($tempname, $folder)) {

                $pech->setNom($_POST['nom'] ?? '');
                $pech->setPrenom($_POST['prenom'] ?? '');
                $pech->setEmail($_POST['email'] ?? '');
                $pech->setRole($_POST['role'] ?? '');
                $pech->setRegion($_POST['region'] ?? '');
                $pech->setTypePeche($_POST['type_peche_favorite'] ?? '');
                $pech->setPhotoPecheur($filename);
                $password_hash = password_hash($_POST['password'], PASSWORD_BCRYPT);
                $pech->setPassword($password_hash);

                try {
                    if ($pech->creer()) {
                        header('Location: ' . PATH_ROOT . '/login');
                        exit;
                    } else {
                        header('Location: ' . PATH_ROOT . '/signup/error/pecheur');
                        exit;
                    }
                } catch (Exception $e) {
                    echo $e->getMessage();
                }
            } else {
                header('Location: ' . PATH_ROOT . '/signup/error/pecheur');
                exit;
            }
        } elseif ($_POST["role"] === "FAN") {
            $_POST['password'] = password_hash($_POST['password'], PASSWORD_BCRYPT);
            if ($fans->register($_POST)) {
                header('Location: ' . PATH_ROOT . '/login');
            } else {
                header('Location: ' . PATH_ROOT . '/signup/error');
                exit;
            }
        }
    }
    public function error()
    {
        echo "<script>alert('Veuillez remplir tous les champs')</script>";
        require __DIR__ . '/../views/signup.php';
    }
}

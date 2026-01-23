<?php

namespace app\controllers;

use Config\Connexion;
use PDO;
use app\models\Pecheur;
use app\models\Fan;

class SingupController
{
    public function index()
    {
        require_once __DIR__ . '/../views/singup.php';
    }
    public function default()
    {
        $this->index();
    }
    public function singup()
    {
        $pech = new Pecheur();
        $fans = new Fan();

        $filename = $_FILES["photoPecheur"]['name'];
        $tempname = $_FILES["photoPecheur"]['tmp_name'];

        if ($_POST['roleUser'] == "PECHEUR") {
             move_uploaded_file($filename, './imFolder' .$tempname);
            $pech->setNom($_POST['nomUser'] ?? '');
            $pech->setPrenom($_POST['prenomUser'] ?? '');
            $pech->setEmail($_POST['emailUser'] ?? '');
            $pech->setRole($_POST['roleUser'] ?? '');
            $pech->setRegion($_POST['region'] ?? '');
            $pech->setTypePeche($_POST['type_peche_favorite'] ?? '');
            $pech->setPhotoPecheur($filename);
            $password_hash = password_hash($_POST['passwordUser'], PASSWORD_BCRYPT);
            $pech->setPassword($password_hash);
           

            $pech->creer();
           
        } elseif ($_POST['roleUser'] == "FAN") {
            $fans->register($_POST);
            header('Location: /login');
            exit;
        }
    }
}

<?php

namespace app\controllers;

use app\models\Subscribe;

class PecheurController
{
    /**
     * Afficher la page des pecheurs
     *
     * @return void
     */
    public function afficher()
    {
        require_once __DIR__ . '/../views/Pecheur.php';
    }


    /**
     * Afficher la page de modification des pecheurs
     * 
     * @return void
     */
    public function modifier()
    {
        require_once __DIR__ . '/../views/modifier_pecheur.php';
    }
    public function ajouter()
    {
        require_once __DIR__ . '/../views/ajouter_pecheur.php';
    }
    public function index()
    {
        require_once __DIR__ . '/../views/pecheurs.php';
    }
    public function profile()
    {
        require_once __DIR__ . '/../views/profilePecheur.php';
    }

    public function subscribe()
    {
        $subscribe = new Subscribe();
        if ($subscribe->isSubscribed($_SESSION['User']->getId(), $_GET['id_pecheur']) === true) {
            if ($subscribe->delete($_SESSION['User']->getId(), $_GET['id_pecheur'])) {
                header("Location: " . PATH_ROOT . "/pecheur");
            } else {
                header("Location: " . PATH_ROOT . "/pecheur");
            }
        } else {
            if ($subscribe->create($_SESSION['User']->getId(), $_GET['id_pecheur'])) {
                header("Location: " . PATH_ROOT . "/pecheur");
            } else {
                header("Location: " . PATH_ROOT . "/pecheur");
            }
        }
    }
}

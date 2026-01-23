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
        if ($subscribe->isSubscribed($_POST['id_user'], $_POST['id_competition'])) {
            if ($subscribe->create($_POST['id_user'], $_POST['id_competition'])) {
                echo "success";
                exit;
            } else {
                echo "failed";
                exit;
            };
        }
        else{
            if ($subscribe->delete($_POST['id_user'], $_POST['id_competition'])) {
                echo "success";
                exit;
            } else {
                echo "failed";
                exit;
            };
        }
    }
}

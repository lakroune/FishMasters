<?php

namespace app\controllers;

use app\models\Classement;
use app\models\Pecheur;
use app\models\Prise;
use app\models\Score;
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
        $pecheurs = Pecheur::getAllPecheur();
        require_once __DIR__ . '/../views/pecheurs.php';
    }
    public function profile()
    {
        $pecheur = $_SESSION["User"];
        if ($pecheur->getRole() === "PECHEUR"):
            $modifier = true;
            require_once __DIR__ . '/../views/profilePecheur.php';

        else:
            $this->index();
        endif;
    }
    public function show(int $id_pecheur)
    {
        $pecheur = Pecheur::getPecheurById($id_pecheur);
        if ($pecheur != NULL):
            $prise = new Prise();
            $prises = $prise->getAll();
            $classement = Classement::getClassementByPecheur($id_pecheur);
            $score = Score::getScorePecheur($id_pecheur);
            $prises= Prise::getPriseByPecheur($id_pecheur);
            
            $modifier = false;
            require_once __DIR__ . '/../views/profilePecheur.php';
        else:
            $this->index();

        endif;
    }

    public function subscribe(int $id_pecheur)
    {
        $subscribe = new Subscribe();
        if ($subscribe->isSubscribed($_SESSION['User']->getIdUser(), $id_pecheur)) {
            if ($subscribe->delete($_SESSION['User']->getIdUser(), $id_pecheur)) {
                header("Location: " . PATH_ROOT . "/pecheur");
            } else {
                header("Location: " . PATH_ROOT . "/pecheur");
            }
        } else {
            if ($subscribe->create($_SESSION['User']->getIdUser(), $id_pecheur)) {
                header("Location: " . PATH_ROOT . "/pecheur");
            } else {
                header("Location: " . PATH_ROOT . "/pecheur");
            }
        }
    }
}

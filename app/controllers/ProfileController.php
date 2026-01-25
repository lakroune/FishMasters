<?php

namespace app\controllers;

use app\models\Classement;
use app\models\Pecheur;
use app\models\Prise;
use app\models\Score;

class ProfileController
{
    public function index()
    {
        $pecheur = $_SESSION["User"];
        if ($pecheur->getRole() === "PECHEUR"):
            $id_pecheur = $pecheur->getIdUser();
            $pecheur = Pecheur::getPecheurById($id_pecheur);
            $prise = new Prise();
            $prises = $prise->getAll();
            $classement = Classement::getClassementByPecheur($id_pecheur);
            $score = Score::getScorePecheur($id_pecheur);
            $prises = Prise::getPriseByPecheur($id_pecheur);
            $modifier = true;
            require_once __DIR__ . '/../views/profilePecheur.php';

        elseif ($pecheur->getRole() === "FAN"):
            require_once __DIR__ . '/../views/profileFan.php';
        else:
            $this->index();
        endif;
    }
    public function default()
    {
        $this->index();
    }
}

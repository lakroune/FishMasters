<?php

namespace app\controllers;

use app\models\Classement;
use app\models\Espece;
use app\models\Pecheur;
use app\models\Prise;
use app\models\Score;

class HomeController
{
    public function index()
    {
        if (isset($_SESSION['User'])):
            $user = $_SESSION["User"];

            if ($user->getRole() === "ADMIN"):
                require_once __DIR__ . '/../views/admin.php';
            elseif ($user->getRole() === "PECHEUR"):
                $id_pecheur = $user->getIdUser();
                $pecheur = Pecheur::getPecheurById($id_pecheur);
                $score = Score::getScorePecheur($id_pecheur);
                $classement = Classement::getClassementByPecheur($id_pecheur);
                $prises = Prise::getPriseByPecheur($id_pecheur);
                require_once __DIR__ . '/../views/dashboard_pecheur.php';
            elseif ($user->getRole() === "FAN"):
                $prises = (new Prise())->getAll();
                $array_prises = array();
                foreach ($prises as $prise) {
                        $array_prises[] = ["prise" => $prise, "pecheur" => Pecheur::getPecheurById($prise->id_pecheur), "espece" => (new Espece())->getEspeceParId($prise->id_espece)];
                }
                $top_pecheurs = array();
                $pecheurs = Pecheur::getTopRanked(5);
                foreach ($pecheurs as $pecheur) {
                    $top_pecheurs[] = ["pecheur" => $pecheur, "score" => Score::getScorePecheur($pecheur->getIdUser())];
                }

                require_once __DIR__ . '/../views/actualites.php';
            endif;
        else:
            require_once __DIR__ . '/../views/index.php';
        endif;
    }
    /**
     * This function is called when no other route is matched.
     */
    public function default()
    {
        echo "Default";
    }
}

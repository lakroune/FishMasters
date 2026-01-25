<?php

namespace app\controllers;

use app\models\Classement;
use app\models\Pecheur;
use app\models\Score;

class ClassementController
{
    public function index($type_eau = null)
    {
        $pecheurModel = new Pecheur();
        $scoreModel = new Score();
        
        if ($type_eau) {
            $classements = Classement::getClassementByTypeEau($type_eau);
        } else {
            $classements = Classement::getClassementGeneralePecheurs();
        }

        $array_classements = [];
        if ($classements) {
            foreach ($classements as $classement) {
                $array_classements[] = [
                    'info'    => $classement,
                    'pecheur' => $pecheurModel->getPecheurById($classement->getIdPecheur()),
                    'score'   => $scoreModel->getScoreByClassement($classement->getIdClassement())
                ];
            }
        }

        require_once __DIR__ . '/../views/classement.php';
    }

    public function filter()
    {
        $type = $_POST['exper'] ?? 'all';
        if ($type === "mer") {
            $this->index("Mer");
        } elseif ($type === "eaudouce") {
            $this->index("Eau Douce");
        } else {
            $this->index();
        }
    }
}
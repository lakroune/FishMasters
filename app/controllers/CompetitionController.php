<?php
namespace app\controllers;

use app\models\Competition;

class CompetitionController
{
    private $competitionModel;

    public function __construct()
    {
        $this->competitionModel = new Competition();
    }

    public function index()
    {

        $filters = [
            'categorie' => $_GET['categorie'] ?? null,
            'milieu' => $_GET['milieu'] ?? null,
            'region' => $_GET['region'] ?? null,
        ];

        $competitions = $this->competitionModel->getFilteredCompetitions(array_filter($filters));

        $categories = $this->competitionModel->getCategories();
        $milieux = $this->competitionModel->getMilieux();
        $regions = $this->competitionModel->getRegions();

        $title = "Filtrer les compétitions";

        require_once __DIR__ . '/../views/competitions.php';
    }
<<<<<<< HEAD
=======
    public function default()
    {
        $this->index();
    }
>>>>>>> a711dbfee3ebe1517376038b7f2265ef7fd3a2cc
}

<?php

namespace app\controllers;

use app\models\Competition;
use app\models\Categorie;

class AddCompetitionController
{
    private Competition $competition;
    private Categorie $categories;

    public function __construct()
    {
        $this->competition = new Competition();
        $this->categories  = new Categorie();
    }

    public function index()
    {
        $categories = $this->categories->getCategories();
        require_once __DIR__ . '/../views/addCompetition.php';
    }

    public function store()
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            header('Location: ' . PATH_ROOT . '/competition/add');
            exit;
        }

        $data = [
            'nom_competition'  => $_POST['name'] ?? '',
            'date_debut'       => $_POST['dateDebut'] ?? '',
            'date_fin'         => $_POST['dateFin'] ?? '',
            'type_competition' => $_POST['Competition'] ?? '',
            'nb_matchs'        => 0,
            'nb_participants'  => 0,
            'id_categorie'     => $_POST['category'] ?? null,
        ];

        $this->competition->addCompetition($data);

        header('Location: ' . PATH_ROOT . '/competition');
        exit;
    }
    public function default()
    {
        $this->index();
    }
}

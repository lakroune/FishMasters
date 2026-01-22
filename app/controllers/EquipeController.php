<?php
namespace app\controllers;
use app\models\Equipe, PDO;

class EquipeController
{
    private Equipe $equipeModel;

    public function __construct()
    {
        $this->equipeModel = new Equipe();
    }

    public function index(): void
    {
        $equipes = $this->equipeModel->all();
        require "../views/equipes/index.php";
    }

    public function show(int $id): void
    {
        $equipe = $this->equipeModel->find($id);
        $membres = $this->equipeModel->getMembres($id);

        require "../views/equipes/show.php";
    }

    public function store(): void
    {
        $this->equipeModel->create(
            $_POST['nom_equipe'],
            $_POST['nb_equipe'],
            $_POST['type_peche_favorite']
        );
        header("Location: /equipes");
        exit;
    }

    public function addMembre(): void
    {
        $this->equipeModel->addMembre(
            $_POST['equipe_id'],
            $_POST['pecheur_id']
        );

        header("Location: /equipes/" . $_POST['equipe_id']);
        exit;
    }
}

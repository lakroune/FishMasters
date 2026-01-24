<?php

namespace app\controllers;

use app\models\Espece;
use app\models\Prise;
use app\models\SpotPeche;

class PriseController
{
    private Prise $model;

    public function __construct()
    {
        $this->model = new Prise();
    }


    public function index(): void
    {
        $prises = $this->model->getAll();
        $especes = (new Espece())->getAll();
        $spots = (new SpotPeche())->getAllSpotPeche();
        require __DIR__ . '/../views/prise.php';
    }

    public function show(int $id): void
    {
        $prise = $this->model->find($id);

        if (!$prise) {
            http_response_code(404);
            echo "Prise introuvable";
            return;
        }

        require __DIR__ . '/../views/prise/show.php';
    }

    public function createForm(): void
    {
        require __DIR__ . '/../views/prise/create.php';
    }

    public function store(): void
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $filename = $_FILES["photoPrise"]['name'];
            $tempname = $_FILES["photoPrise"]['tmp_name'];

            $folder = "uploads/" . "fish_master_Prises" . time() . "_" . $filename;
            if (move_uploaded_file($tempname, $folder)) {
                $success = $this->model->create(
                    $folder,
                    $_POST['poids'],
                    $_POST['taille'],
                    $_SESSION['User']->getIdUser(),
                    (int) $_POST['id_espece'],
                    (int)  $_POST['id_spot']
                );
                // if ($success) {
                //     header('Location: ' . PATH_ROOT . '/prise');
                //     exit;
                // } else {
                //     header('Location: ' . PATH_ROOT . '/prise/error');
                //     exit;
                // }
                echo "Prise ajoutée avec succès.";
            }
        } else {
            header('Location: ' . PATH_ROOT . '/prise/error');
            exit;
        }
    }
    public function error(): void
    {
        $error_msg = "Veuillez remplir tous les champs avant de valider.";
        $this->index();
    }
}

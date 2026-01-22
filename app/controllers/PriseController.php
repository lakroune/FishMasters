<?php

namespace app\controllers;

use app\models\Prise;

class PriseController
{
    private Prise $model;

    public function __construct()
    {
        $this->model = new Prise();
    }

    public function index(): void
    {
        // $prises = $this->model->getAll();
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
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            $success = $this->model->create(
                $_POST['image_prise'],
                $_POST['date_capture'],
                $_POST['poids'],
                $_POST['taille'],
                $_POST['id_pecheur'],
                $_POST['id_espece'],
                $_POST['id_spot']
            );

            if ($success) {
                header('Location: /prise');
                exit;
            }

            echo "Erreur lors de la création";
        }
    }
}

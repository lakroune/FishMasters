<?php

namespace app\controllers;

use app\models\Espece;

class EspeceController
{
    private Espece $model;

    public function __construct()
    {
        $this->model = new Espece();
    }

    public function index(): void
    {
        $especes = $this->model->getAll();
        require __DIR__ . '/../views/espece/index.php';
    }
    

    public function show(int $id): void
    {
        $espece = $this->model->find($id);

        if (!$espece) {
            http_response_code(404);
            echo "Espèce introuvable";
            return;
        }

        require __DIR__ . '/../views/espece/show.php';
    }

    public function addEspece()
    {
        $resultat = $this->model->create($_POST["nom_espece"], $_POST["coefficient"], $_POST["description"]);
        if ($resultat) {
            $sucess_message = "l'espece est ajouter avec success";
        } else {
            $erroe_message = "l'espece n'a été pas ajouter";
        }
            require __DIR__ . '/../views/espece/show.php';
    }
}

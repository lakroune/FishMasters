<?php
    namespace app\controllers;

use app\models\Categorie;
use app\models\Competition;

Class AddCompetitionController
{

    private $competition;
    private $categories;

    public function __construct()
    {
        $this->competition = new Competition ;
        $this->categories = new Categorie ;
    }
   
    public function index()
    {
        if(isset($_POST['submit'])){
            $add = new AddCompetitionController;
            $add->addComptition();
        }
        
        $categories = $this->categories->getCategories();
        require_once __DIR__ . '/../views/addCompetition.php';
    }
    
    public function addComptition()
    {
        $data = [
            'nom_competition'   => $_POST['name'],
            'date_debut'        => $_POST['dateDebut'],
            'date_fin'          => $_POST['dateFin'],
            'type_competition'  => $_POST['Competition'],
            'nb_matchs'         => 0,
            'nb_participants'   => 0,
            'id_categorie'      => $_POST['category'],
        ];

        $this->competition->addCompetition($data);
    }

}

?>
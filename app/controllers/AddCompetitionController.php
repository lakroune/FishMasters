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
        $categories = $this->categories->getCategories();
        require_once __DIR__ . '/../views/addCompetition.php';
    }
    
    public function addComptition()
    {
        
        $_POST['name'];
        $_POST['date'];
        $_POST['water_type'];
        $_POST['category'];
        $_POST['technique'];
        $_POST['environement'];
        $_POST['location'];
        $_POST['status'];
        $_POST['description'];
    }

}

?>
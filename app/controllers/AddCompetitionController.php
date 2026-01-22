<?php
    namespace app\controllers;

use app\models\Competition;

Class AddCompetitionController
{

    private $competition;

    public function __construct()
    {
        $this->competition = new Competition;
    }
   
    public function index()
    {
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
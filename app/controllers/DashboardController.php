<?php

namespace app\controllers;

use app\models\Espece;
use app\models\Pecheur;
use app\models\Prise;


class DashboardController{



  public function __construct()
    {
        $this->prise = new Prise();
        $this->espece = new Espece();
        $this->pecheure=new Pecheur();
    }

    public function index(){
      $count_prise = $this->prise->getCountPrise();
    $count_espece = $this->espece->getCountEspece();
    $count_pecheure=$this->pecheure->getCountPecheure();
   $poids_par_espece=$this->espece->getPoidsParEspece();
 
    $especes = Espece::afficher(); 
    require __DIR__ . '/../views/admin.php';
    }
}
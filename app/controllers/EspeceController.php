<?php
namespace app\controllers;

use app\models\Espece;
use app\controllers\DashboardController;

class EspeceController{
private DashboardController $dashboard;
private Espece $espece;
public function __construct(){
    $this->dashboard=new DashboardController();
    $this->espece=new Espece();
}
public function ajauter(){
   $espece = new Espece();
$espece->setNomEspece($_POST['espece']);
$espece->setCoefficient($_POST['coaficiant']);
$espece->setDescription($_POST['description']);
if($espece->ajouter()){
    $this->dashboard->index();
    require_once __DIR__.'/../views/Admin.php';
}
}

public function afficher(){
    $this->dashboard->index();
      require_once __DIR__.'/../views/Admin.php';
}

public function supprimer(){
    $id=$_GET['id'];
    $supprimer =Espece::supprimer($id);
    if($supprimer){
         $this->dashboard->index();
           require_once __DIR__.'/../views/Admin.php';
    }
}

public function getEspece(){
    $id=$_GET['id'];
    $espece_to_edit=$this->espece->getEspeceParId($id);
     require_once __DIR__.'/../views/modifier_espece.php';
}

public function modifier(){
       $espece = new Espece();
$espece->setNomEspece($_POST['espece']);
$espece->setCoefficient($_POST['coaficiant']);
$espece->setDescription($_POST['description']);
$espece->setIdEspece($_POST['id_espece']);

    if($espece->modifierEspece()){
          $this->dashboard->index();
     require_once __DIR__.'/../views/Admin.php';
    }
}

}







?>








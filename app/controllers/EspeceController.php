<?php
namespace app\controllers;

use app\models\Espece;

class EspeceController{


public function ajauter(){
   $espece = new Espece();
$espece->setNomEspece($_POST['espece']);
$espece->setCoefficient($_POST['coaficiant']);
$espece->setDescription($_POST['description']);
if($espece->ajouter()){
    $especes =Espece::afficher();
    require_once __DIR__.'/../views/Admin.php';
}
}

public function afficher(){
     $especes =Espece::afficher();
      require_once __DIR__.'/../views/Admin.php';
}

public function supprimer(){
    $id=$_GET['id'];
    $supprimer =Espece::supprimer($id);
    if($supprimer){
         $especes =Espece::afficher();
           require_once __DIR__.'/../views/Admin.php';
    }
}

public function getEspece(){
    $id=$_GET['id'];
    $espece_to_edit=Espece::getEspeceParId($id);
     require_once __DIR__.'/../views/modifier_espece.php';
}

public function modifier(){
    $nom=$_POST['espece'];
    $coeficient=$_POST['coaficiant'];
    $description=$_POST['description'];
    $id=$_POST['id_espece'];
    $espece=new Espece($nom,$coeficient,$description,$id);
    if($espece->modifierEspece()){
          $especes =Espece::afficher();
     require_once __DIR__.'/../views/Admin.php';
    }
}

}







?>








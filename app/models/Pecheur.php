<?php
namespace App\models;

use config\Connexion;
use PDO;

class Pecheur extends User{
    protected $photo_pecheur;
    protected $region;
    protected $type_peche_favorite;

   public function __get($param)
   {
     return $this->$param;
   }

   public function __set($property, $value)
   {
      $this->$property = $value;
   }

   public function login($email)
   { 
      $pdo=Connexion::connect()->getConnexion();
       $sql = ("SELECT * FROM pecheurs WHERE email = :email");
      $stmt = $pdo->prepare($sql);
      $stmt->execute(['email' => $email]);
      $result = $stmt->fetch(PDO::FETCH_CLASS, 'Pecheur');

      return $result;
     
     
   }



} 

?>
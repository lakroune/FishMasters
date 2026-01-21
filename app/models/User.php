<?php
 namespace App\models;
 
 class User {
  protected $id_user;
  protected $prenom;
  protected $nom;
  protected $email;
  protected $password;


    public function __get($param)
    {
       return  $this->$param;
    }

    public function __set($property, $value)
    {
        $this->$property = $value;
    }

    
 


 }

?>
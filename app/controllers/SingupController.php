<?php
 namespace app\controllers;
 use Config\Connexion;
 use PDO;
 use app\models\Pecheur;
 use app\models\Fan;

 class SingupController {
     




    public function index()
    {
        require_once __DIR__ . '/../views/singup.php';

    }
    public function default()
    {
        $this->index();
    }
    public function singup()
    {     $pech = new Pecheur();
          $fans = new Fan();
        if(isset($_POST["singup"])){
              if(getRole())
    }
        $pech = new Pecheur();
        // if ($this->pech->creer($_POST))
        //     header("location: " . PATH_ROOT . "/singup");

        $pech->setNom($_POST['nom'] ?? '');
        $pech->setPrenom($_POST['prenom'] ?? '');
        $pech->setEmail($_POST['email'] ?? '');
        $pech->setRole($_POST['role'] ?? '');
        $pech->setRegion($_POST['region'] ?? '');
        $pech->setTypePeche($_POST['type_peche_favorite'] ?? '');  
        
        $password_hash = password_hash($_POST['password'], PASSWORD_BCRYPT);
        $pech->setPassword($password_hash);


        $pech->creer();
        header('Location: /singup');
        exit;

    }

 }
 
?>
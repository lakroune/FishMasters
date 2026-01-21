<?php
namespace app\models;

use config\Connexion;


class Categorie{
    private $idCat;
    private $nomCat;
    private $descriptionCat;

    public function __construct($idCat,$nomCat,$descriptionCat){
        $this->idCat=$idCat;
        $this->nomCat=$nomCat;
        $this->descriptionCat=$descriptionCat;
    }

    public function getId(){
        return $this->idCat;
    }
     public function getNom(){
        return $this->nomCat;
    }
     public function getDescription(){
        return $this->descriptionCat;
    }


     public function setId($id){
     $this->idCat=$id;
    }
     public function setNom($nom){
         $this->nomCat=$nom;
    }
     public function setDescription($description){
    $this->descriptionCat=$description;
    }


   public static function getCompetitionParCategorie($categorie_id) {
    try {
       
        $db = Connexion::connect()->getConnection();  

        
        $sql = "SELECT c.*, cat.nom_categorie 
                FROM competitions c
                JOIN categories cat ON c.categorie_id = cat.id
                WHERE c.categorie_id = :cat_id
                ";

        $stmt = $db->prepare($sql);
        $stmt->bindParam(':cat_id', $categorie_id, PDO::PARAM_INT);
        $stmt->execute();

      
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
        
    } catch (PDOException $e) {
        echo "Errore de ". $e->getMessage();
   
    }
}



}
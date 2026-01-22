<?php
namespace app\models;

use config\Connexion;
use PDOexception;
use pdo;


class Categorie{
    private $id_categorie;
    private $nom_categorie;
    private $descriptionCat;

    public function getId(){
        return $this->id_categorie;
    }
     public function getNom(){
        return $this->nom_categorie;
    }
     public function getDescription(){
        return $this->descriptionCat;
    }


     public function setId($id){
     $this->id_categorie=$id;
    }
     public function setNom($nom){
         $this->nom_categorie=$nom;
    }
     public function setDescription($description){
    $this->descriptionCat=$description;
    }


   public static function getCompetitionParCategorie($categorie_id) {
    try {
       
        $db = Connexion::connect()->getConnexion();

        
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


//getCategories

    public function getCategories()
    {
        try{

            $sql = "SELECT * FROM categories";

            $stmt = Connexion::connect()->getConnexion()->prepare($sql);

            $stmt->execute();

            return $stmt->fetchAll(PDO::FETCH_CLASS,self::class);

        }catch(PDOexception $e){
            return $e;
        }
    }

//

    public function getCategorieById($id)
    {
        try{

            $sql = "SELECT * FROM categories WHERE id_categorie = ?";

            $stmt = Connexion::connect()->getConnexion()->prepare($sql);

            $stmt->execute([
                $id
            ]);

            $stmt->setFetchMode(PDO::FETCH_CLASS,self::class);

            return $stmt->fetch();

        }catch(PDOexception $e){

            return $e;
            
        }
    }
}
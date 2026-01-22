<?php

namespace app\models;

use Exception;
use config\Connexion;
use PDO;
class Espece
{

    private int $id_espece;
    private string $nom_espece;
    private int $coefficient;
    private string $description;


    public function __construct($nom_espece,$coefficient,$description,$id_espece) {

    $this->nom_espece=$nom_espece;
    $this->coefficient=$coefficient;
    $this->description=$description;
    $this->id_espece=$id_espece;
    }

    public function __toString()
    {
        return "ghfebjfhh";
       // return "espece : id_espece = $this->id_espece, nom_espece = $this->nom_espece, coefficient = $this->coefficient, description = $this->description";
    }

    public function getIdEspece(): int
    {
        return $this->id_espece;
    }

    public function getNomEspece(): string
    {
        return $this->nom_espece;
    }

    public function getCoefficient(): int
    {
        return $this->coefficient;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function setIdEspece(int $id): void
    {
        if ($id < 0) {
            throw new Exception("L'id de l'espece doit être supérieur à 0");
        }

        $this->id_espece = $id;
    }

    public function setNomEspece(string $nom): void
    {
        if (empty($nom)) {
            throw new Exception("Le nom de l'espece ne doit pas être vide");
        }

        $this->nom_espece = $nom;
    }

    public function setCoefficient(int $coefficient): void
    {
        if ($coefficient < 0) {
            throw new Exception("Le coefficient doit être supérieur à 0");
        }

        $this->coefficient = $coefficient;
    }

    public function setDescription(string $description): void
    {
        if (empty($description)) {
            throw new Exception("La description de l'espece ne doit pas être vide");
        }

        $this->description = $description;
    }


    public function ajouter(): bool
{
    try {
       $db = Connexion::connect()->getConnexion(); 

        $sql = "INSERT INTO especes (nom_espece, coefficient, description)
                VALUES (:nom, :coef, :desc)";

        $stmt = $db->prepare($sql);

        return $stmt->execute([
            ':nom'  => $this->nom_espece,
            ':coef' => $this->coefficient,
            ':desc' => $this->description
        ]);

    } catch (Exception $e) {
        throw new Exception("Erreur lors de l'ajout de l'espèce : " . $e->getMessage());
    }
}


public static function afficher():array{
          $db = Connexion::connect()->getConnexion();
          $sql="SELECT * FROM especes";
             $stmt = $db->prepare($sql);
             $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

public static function supprimer($id){
    $db = Connexion::connect()->getConnexion();
    $sql="UPDATE  especes SET id_delete='1' WHERE id_espece=:id";
    $stmt = $db->prepare($sql);
    return $stmt->execute([':id'=>$id]);
}




public static function getEspeceParId($id)
{
    
        $db = Connexion::connect()->getConnexion();

        $sql = "SELECT * FROM especes 
                WHERE id_espece = :id AND id_delete = 0";

        $stmt = $db->prepare($sql);
        $stmt->execute([':id' => $id]);

        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        return $result ;

 
}


public function modifierEspece():bool
{
  
        $db = Connexion::connect()->getConnexion();

        $sql = "UPDATE especes 
                SET nom_espece = :nom,
                    coefficient = :coef,
                    description = :desc
                WHERE id_espece = :id ";

        $stmt = $db->prepare($sql);

        return $stmt->execute([
            ':nom'  => $this->nom_espece,
            ':coef' => $this->coefficient,
            ':desc' => $this->description,
            ':id' =>$this->id_espece
        ]);

   
}

}

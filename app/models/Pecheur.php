<?php

namespace app\models;

use config\Connexion;
use Exception;
use PDO;

class Pecheur extends User
{
    private string $photo_pecheur;
    private string $region;
    private string $type_peche_favorite;
    private ?int $id_equipe;
    public function __construct()
    {
        parent::__construct();
    }

    public function __toString()
    {
        return parent::__toString() . "pecheur : photo_pecheur = $this->photo_pecheur, region = $this->region, type_peche_favorite = $this->type_peche_favorite, id_equipe = $this->id_equipe";
    }


    public function getRegion(): string
    {
        return $this->region;
    }

    public function getTypePeche(): string
    {
        return $this->type_peche_favorite;
    }

    public function getIdEquipe(): int
    {
        return $this->id_equipe;
    }
    public function getPhotoPecheur(): string
    {
        return $this->photo_pecheur;
    }

    public function setPhotoPecheur(string $photo): void
    {
        if (empty($photo)) {
            throw new Exception("La photo de l'équipe ne doit pas être vide");
        }

        $this->photo_pecheur = $photo;
    }

    public function setRegion(string $region): void
    {
        if (empty($region)) {
            throw new Exception("La region de l'équipe ne doit pas être vide");
        }

        $this->region = $region;
    }

    public function setTypePeche(string $type): void
    {
        if (empty($type)) {
            throw new Exception("Le type de l'équipe ne doit pas être vide");
        }

        $this->type_peche_favorite = $type;
    }

    public function setIdEquipe(int $id): void
    {
        if ($id < 0) {
            throw new Exception("L'id de l'équipe doit être supérieur à 0");
        }

        $this->id_equipe = $id;
    }
    public static function getAllPecheur(): array
    {
        $db = Connexion::connect()->getConnexion();
        $query = "SELECT * FROM pecheurs";
        try {
            $stmt = $db->prepare($query);
        } catch (Exception $e) {
            throw new Exception("Une erreur est survenue lors de la requête SQL : " . $query . " : " . $e->getMessage());
        }
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_CLASS, Pecheur::class);
    }
    public function getPecheurById(int $id): ?Pecheur
    {
        $db = Connexion::connect()->getConnexion();
        $query = "SELECT * FROM pecheurs WHERE id_user = :id";
        try {
            $stmt = $db->prepare($query);
        } catch (Exception $e) {
            throw new Exception("Une erreur est survenue lors de la requête SQL : " . $query . " : " . $e->getMessage());
        }
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetchObject(Pecheur::class);
    }

    public  function creer(): bool
    {
        try {
            $db = Connexion::connect()->getConnexion();
            $sql = "INSERT INTO pecheur(nom_user, prenom_user, email, password_user, role_user, photo_pecheur, region, type_peche_favorite, id_equipe) VALUES (?,?,?,?,?,?,?,?,?)";
            $stmt = $db->prepare($sql);
            $stmt->execute([
                $this->nom_user,
                $this->prenom_user,
                $this->email,
                $this->password_user,
                $this->role_user,
                $this->photo_pecheur,
                $this->region,
                $this->type_peche_favorite,
                $this->id_equipe
            ]);
            return true;
        } catch (Exception $e) {
            return false;
        }
    }
   public static function searchPecheur($search)
    { $db = Connexion::connect()->getConnexion();
       $stmt = $db->prepare("SELECT * FROM pecheurs WHERE nom_user LIKE ?");
       $search = "%" . $search . "%";
       $stmt->execute([$search]);
     return $stmt->fetchAll(PDO::FETCH_CLASS, Pecheur::class);

    }


    public function editPecheur()
    {
        try{
         $db = Connexion::connect()->getConnexion();
      $sql = "UPDATE pecheurs 
       SET nom_user = :nom_user, prenom_user = :prenom_user, role_user = :role_user, photo_pecheur = :photo_pecheur,  region = :region, type_peche_favorite = :type_peche_favorite,  id_equipe = :id_equipe
       WHERE id_user = :id_user ";
       $stmt = $db->prepare($sql);
       $success = $stmt->execute([
            ':id_user' => $this->getIdUser(),
            ':nom_user' => $this->getNom(),
            ':prenom_user' => $this->getPrenom(),
            ':role_user' => $this->getRole(),
            ':photo_pecheur' => $this->getPhotoPecheur(),
            ':region' => $this->getRegion(),
            ':type_peche_favorite' => $this->getTypePeche(),
            ':id_equipe' => $this->getIdEquipe()
       ]);

       if($success && $stmt->rowCount() > 0){
         return true;
       } else{
        return false;
       }

    }catch(Exception $e){
        echo "something wrong" . $e->getMessage();
        return false;
    }
    }

    

       public function mettreAJour($id_user)
       { $db = Connexion::connect()->getConnexion();
         $sql = "SELECT * FROM pecheurs WHERE id_user = ?";
          $stmt = $db->prepare($sql);
          $stmt->execute([(int) $id_user]);
           $result = $stmt->fetch(PDO::FETCH_CLASS, Pecheur::class);

           if($result) {
                  $this->setId($result->id_user);
                  $this->setNom($result->nom_user);
                  $this->setPrenom($result->prenom_user);
                  $this->setRole($result->role_user);
                  $this->setPhotoPecheur($result->photo_pecheur);
                  $this->setRegion($result->region);
                  $this->setTypePeche($result->type_peche_favorite);
                 $this->setIdEquipe($result->id_equipe);

                 return $this;
           }

       }
}
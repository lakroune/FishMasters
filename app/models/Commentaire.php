<?php

namespace app\models;
use config\Connexion;
use PDO;

class Commentaire {
    private ?int $idCommentaire;
    private string $contenuCommentaire;
    private int $idUser;      
    private int $idTarget;    
    private $status;
   

    public function __construct(string $contenu, int $userId, int $targetId,$status, ?int $id = null) {
        $this->idCommentaire = $id;
        $this->contenuCommentaire = $contenu;
        $this->idUser = $userId;
        $this->idTarget = $targetId;
        $this->status=$status;
      
    }

  
    public function getId(): ?int { 
        return $this->idCommentaire; 
        }
    public function getContenu(): string {
         return $this->contenuCommentaire;
          }
    public function getUserId(): int { 
        return $this->idUser; 
        }
    public function getTargetId(): int {
         return $this->idTarget; 
         }
             public function getStatut() { return $this->statut; }

 
    public function setContenu(string $contenu): void {
        $this->contenuCommentaire = $contenu;
    }



    public function ajouter() {
        $db = Connexion::connect()->getConnexion();
        $sql = "INSERT INTO commentaires (contenu, id_user, id_target, statut) 
                VALUES (:contenu, :id_user, :id_target, 'pending')";
        $stmt = $db->prepare($sql);
        return $stmt->execute([
            ':contenu' => $this->contenuCommentaire,
            ':id_user' => $this->idUser,
            ':id_target' => $this->idTarget
        ]);
    }

   
    public function modifier() {
        $db = Connexion::connect()->getConnexion();
        $sql = "UPDATE commentaires SET contenu = :contenu WHERE id = :id";
        $stmt = $db->prepare($sql);
        return $stmt->execute([
            ':contenu' => $this->contenuCommentaire,
            ':id' => $this->idCommentaire
        ]);
    }


    public static function getCommentaireById($idcommentaire){
           $db = Connexion::connect()->getConnexion();
           $sql="SELECT * FROM commentaires WHERE id_commentaire=:id";
            $stmt = $db->prepare($sql);
            $stmt->execute([':id'->$idCommentaire]);
            return $stmt->fetch(PDO::FETCH_ASSOC);
    }

 
    public static function supprimer($id) {
        $db = Connexion::connect()->getConnexion();
        $sql = "DELETE FROM commentaires WHERE id = :id";
        $stmt = $db->prepare($sql);
        return $stmt->execute([':id' => $id]);
    }

  
    public static function approuver($id) {
        $db = Connexion::connect()->getConnexion();
        $sql = "UPDATE commentaires SET statut = 'approved' WHERE id = :id";
        $stmt = $db->prepare($sql);
        return $stmt->execute([':id' => $id]);
    }

   
    public static function desapprouver($id){
        $db = Connexion::connect()->getConnexion();
        $sql = "UPDATE commentaires SET statut = 'rejected' WHERE id = :id";
        $stmt = $db->prepare($sql);
        return $stmt->execute([':id' => $id]);
    }

 



}
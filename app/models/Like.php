<?php
 namespace App\models;
 use config\Connexion;
 use Exception;
 use PDO;
 
 class Like {
    private $id_like;
    private $id_fan;
    private $id_prise;
    private $id_competition;

   public function __construct(int $id_like, int $id_fan, int $id_prise, int $id_competition)
   { $this->id_like = $id_like;
     $this->id_fan = $id_fan;
     $this->id_prise = $id_prise;
     $this->id_competition = $id_competition;

   }
   
   //Getters
   public function getIdLike(): int {return $this->id_like;}
   public function getIdFan(): int {return $this->id_fan;}
   public function getIdPrise(): int {return $this->id_prise;}
   public function getIdCompetition(): int {return $this->id_competition;}


   //setters
  public function setIdLike(int $id_like)
   { 
       $this->id_like = $id_like;
   }

   public function setIdFan(int $id_fan)
   { 
       $this->id_fan = $id_fan;
   }

    public function setIdPrise(int $id_prise)
   { 
       $this->id_prise = $id_prise;
   }

    public function setIdCompetition(int $id_competition)
   { 
       $this->id_competition = $id_competition;
   }


    public function addLike()
    { try{
                $db = Connexion::connect()->getConnexion();
                $sql = "INSERT INTO likes (id_fan, id_prise, id_competition) VALUES (?,?,?)";
                $stmt = $db->prepare($sql);
                $stmt->execute([
                    $this->id_fan,
                    $this->id_prise,
                    $this->id_competition
                ]);
                return true;
            } catch (Exception $e){
                return false;
            }

    }


 





}




?>
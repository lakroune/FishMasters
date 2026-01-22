<?php

namespace app\models;

use config\Connexion;
use Exception;
use PDO;

Class Classement
{
    private $id_classment;
    private $type_classment;
    private $date_classment;
    private $id_competition;

    public function __set($proprty, $value)
    {
        $this->$proprty = $value ;
    }

    public function __get($proprty)
    {
        return $this->$proprty ;
    }

//addClassment

    public function addClassment() : bool
    {
        try{

            $sql = "INSERT INTO classment(type_classment, date_classement, id_competition)
                    VALUES (?, ?, ?)";

            $stmt = Connexion::connect()->getConnexion()->prepare($sql);

            $stmt->execute([
                $this->type_classment,
                $this->date_classment,
                $this->id_competition
            ]);

            return true ;

        }catch(exception $e){

            return false ;
        }
    }
    public function getClassementsGenerale()    :    array
    {
        $db = Connexion::connect()->getConnexion();
        $query = "SELECT c.* FROM classments c inner join competitions co on c.id_competition = co.id_competition";
        try {
            $stmt = $db->prepare($query);
        } catch (Exception $e) {
            throw new Exception("Une erreur est survenue lors de la requête SQL : " . $query . " : " . $e->getMessage());
        }
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            return $stmt->fetchAll(PDO::FETCH_CLASS, Classement::class);
        } else {
            return [];
        }
    }
    
}

?>
<?php

namespace app\models;

use config\Connexion;
use Exception;

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
}

?>
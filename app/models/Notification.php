<?php

namespace app\models;

use config\Connexion;
use Exception;

Class Notification
{
    private $id_note;
    private $contenu;
    private $date;
    private $id_fan;

    public function __set($proprty, $value)
    {
        $this->$proprty = $value;
    }

    public function __get($proprty)
    {
        return $this->$proprty;
    }

//createnotification

    public function creatNotification(): bool
    {
        try{

            $sql = "INSERT INTO notification(contenu, date_notification, id_fan)
                    VALUES (?, ?, ?)";
            $stmt = Connexion::connect()->getConnexion()->prepare($sql);
            
            $stmt->execute([
                $this->contenu,
                $this->date,
                $this->id_fan
                ]);

            return true;

        }catch(exception $e){

            return false;

        }
    }    

}

?>
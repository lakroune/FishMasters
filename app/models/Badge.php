<?php

    namespace app\models;

    use config\Connexion;
    use Exception;

Class Badge
{
    private $nom_badge;
    private $date_obtenu;
    private $id_fan;

    public function __set($proprty, $value)
    {
        $this->$proprty = $value ;
    }

    public function __get($proprty)
    {
        return $this->$proprty ;
    }

//addBadge

    public function addBadge()
    {
        try{

            $sql = "INSERT INTO badge(nom_badge, date_obtenu, id_fan)
                    VALUES (?, ?, ?)";

            $stmt = Connexion::connect()->getConnexion()->prepare($sql);
       
            $stmt->execute([
                $this->nom_badge,
                $this->date_obtenu,
                $this->id_fan
            ]);

            return true ;

        }catch(exception $e){

            return false ;

        }
    }

    
}

?>

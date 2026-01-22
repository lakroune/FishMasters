<?php

namespace app\models;

use config\Connexion;
use Exception;

class Score
{
    private $total_poids;
    private $total_points;
    private $nb_prises;
    private $id_pecheur;
    private $id_classement;

    public function __set($proprty, $value)
    {
        $this->$proprty = $value;
    }

    public function __get($proprty)
    {
        return $this->$proprty;
    }

    //addscore

    public function addScore()
    {
        try {

            $sql = "INSERT INTO score(total_poids, total_points, nb_prises, id_pecheur, id_classement)
                    VALUES (?, ?, ?, ?, ?)";

            $stmt = Connexion::connect()->getConnexion()->prepare($sql);

            $stmt->execute([
                $this->total_poids,
                $this->total_points,
                $this->nb_prises,
                $this->id_pecheur,
                $this->id_classement
            ]);

            return true;
        } catch (exception $e) {

            return false;
        }
    }

    //editscore

    // public function editScore()
    // {
    //     try{

    //         $sql = "UPDATE score
    //                 WHERE id_score = ?
    //                 SET ";

    //         $stmt = Connexion::connect()->getConnexion()->prepare($sql);


    //     }catch(exception $e){

    //         return false;

    //     }
    // }

    public function getScoreByClassement(int $id_classement): ?Score
    {
        $db = Connexion::connect()->getConnexion();
        $sql = "SELECT * FROM scores WHERE id_classement = :id_classement ";
        try {
            $stmt = $db->prepare($sql);
        } catch (Exception $e) {
            throw new Exception("Une erreur est survenue lors de la requête SQL : " . $sql . " : " . $e->getMessage());
        }
        $stmt->execute(['id_classement' => $id_classement]);
        return $stmt->fetchObject(Score::class);
    }
}

<?php

namespace app\models;

use app\models\Competition;
use app\models\Pecheur;
use Exception, PDO;
use config\Connexion;

class Prise
{
    private int $id_prise;
    private string $image_prise;
    private string $date_capture;
    private string $poids;
    private string $taille;
    private Pecheur $pecheur;
    private Espece $espece;
    private SpotPeche $spot;
    private PDO $pdo;

    public function __construct()
    {
        $this->pdo = Connexion::connect()->getConnexion();
    }

      public function __set(string $att, $val): void
    {
        if (!property_exists($this, $att)) {
            throw new Exception("Propriété introuvable : $att");
        }

        $this->$att = $val;
    }

    public function __get(string $att)
    {
        if (!property_exists($this, $att)) {
            throw new Exception("Propriété introuvable : $att");
        }

        return $this->$att;
    }



    public function getAll(): array
    {
        $stmt = $this->pdo->query("SELECT * FROM prises");
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $prises = [];

        foreach ($rows as $row) {
            $prise = new Prise();
            $pecheur = (new Pecheur())->find($row["id_pecheur"]);
            $espece = (new Espece())->find($row["id_espece"]);
            $spot = (new SpotPeche())->find($row["id_spot"]);
            $prise->id_prise = $row['id_prise'];
            $prise->image_prise = $row['image_prise'];
            $prise->date_capture = $row['date_capture'];
            $prise->poids = $row['poids'];
            $prise->taille = $row['taille'];
            $prise->pecheur = $pecheur;
            $prise->espece = $espece;
            $prise->spot = $spot;
            $prises[] = $prise;
        }

        return $prises;
    }

    
    public function find(int $id): ?Prise
    {
        $stmt = $this->pdo->prepare(
            "SELECT * FROM prises WHERE id_prise = :id"
        );
        $stmt->execute(['id' => $id]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$row) {
            return null;
        }

        $prise = new Prise();
        $pecheur = (new Pecheur())->find($row["id_pecheur"]);
        $espece = (new Espece())->find($row["id_espece"]);
        $spot = (new SpotPeche())->find($row["id_spot"]);
        $prise->id_prise = $row['id_prise'];
        $prise->image_prise = $row['image_prise'];
        $prise->date_capture = $row['date_capture'];
        $prise->poids = $row['poids'];
        $prise->taille = $row['taille'];
        $prise->pecheur = $pecheur;
        $prise->espece = $espece;
        $prise->spot = $spot;

        return $prise;
    }

    public function create(string $image_prise, string $date_capture, string $poids, string $taille, string $id_pecheur, string $id_espece, string $id_spot): bool
    {
        $stmt = self::$pdo->prepare(
            "INSERT INTO prises (image_prise, date_capture, poids, taille, id_pecheur, id_espece, id_spot) VALUES (:image_prise, :date_capture, :poids, :taille, :id_pecheur, :id_espece, :id_spot)"
        );
        return $stmt->execute([
            'image_prise' => $image_prise,
            'date_capture' => $date_capture,
            'poids' => $poids,
            'taille' => $taille,
            'id_pecheur' => $id_pecheur,
            'id_espece' => $id_espece,
            'id_spot' => $id_spot
        ]);
    }


  


public function getPecheurData(int $id_user)
{  $sql = "SELECT * FROM pecheurs WHERE id_user = i:d_user";
   $stmt = $this->pdo->prepare($sql);
    $stmt->execute(['id_user' => $id_user]);
    $results = $stmt->fetch(PDO::FETCH_CLASS, Pecheur::class);

    return $results;

}

public function getCompetitionData(int $id_competition)
{   $sql = "SELECT * FROM competitions WHERE id_competition = :id_competition";
    $stmt = $this->pdo->prepare($sql);
    $stmt->execute(['id_competition' => $id_competition]);
    $results = $stmt->fetch(PDO::FETCH_CLASS, Competition::class);

    return $results;

}

public function getPriseDatabyIdPecheurAndComptition ($id_user, $id_competition){
// todo : query to get this date
     $sql = "SELECT * FROM prises WHERE id_competition = :id_competition
     AND id_user = :id_user";
    $stmt = $this->pdo->prepare($sql);
    $stmt->execute([
             'id_user' => $id_user,
             'id_competition' => $id_competition   
    ]);
     return $stmt->fetchAll(PDO::FETCH_CLASS, Prise::class);

}

public function  getAllData($id_user, $id_competition)
{  $pecheur = $this->getPecheurData($id_user);
   $competition = $this->getCompetitionData($id_competition);
   $prises = $this->getPriseDatabyIdPecheurAndComptition($id_user, $id_competition); 
    
    $weights = array_map(fn($p) => $p->getPoids(), $prises);
    
   $results = [
        'pecheur' => $pecheur,
        'competition' => $competition,
        'prises' => $prises,
        'totalWeight' => array_sum( $weights),
        'biggestCatch' => !empty($weights) ? max($weights) : 0,
        'numberOfCatches' => count($prises)
   ];

   return $results;
}




}
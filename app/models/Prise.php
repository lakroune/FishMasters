<?php

namespace app\models;

use Exception, PDO;
use config\Connexion;

class Prise
{
    private int $id_prise;
    private string $image_prise;
    private string $date_capture;
    private string $poids;
    private string $taille;
    private ?int $id_pecheur;
    private ?int $approuve_par_admin = 0;
    private ?int $id_espece;
    private ?int $id_spot;
    private ?Pecheur $pecheur;
    private ?Espece $espece;
    private ?SpotPeche $spot;
    private PDO $pdo;

    public function __construct()
    {
        $this->pdo = Connexion::connect()->getConnexion();
    }


    public function getAll(): array
    {
        $stmt = $this->pdo->query("SELECT * FROM prises");
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $prises = [];

        foreach ($rows as $row) {
            $prise = new Prise();
            $pecheur = (new Pecheur())->getPecheurById($row["id_pecheur"]);
            $espece = (new Espece())->getEspeceParId($row["id_espece"]);
            $spot = (new SpotPeche())->getSpotPeche($row["id_spot"]);
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

    public static function getPriseByPecheur(int $id_pecheur): array
    {
        $prise = new Prise();
        $query = "SELECT * FROM prises WHERE id_pecheur=:id_pecheur";
        try {
            $stmt =  $prise->pdo->prepare($query);
        } catch (Exception $e) {
            throw new Exception("Une erreur est survenue lors de la requête SQL : " . $query . " : " . $e->getMessage());
        }
        $stmt->bindParam(':id_pecheur', $id_pecheur);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_CLASS, Prise::class);
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
        $pecheur = (new Pecheur())->getPecheurById($row["id_pecheur"]);
        $espece = (new Espece())->getEspeceParId($row["id_espece"]);
        $spot = (new SpotPeche())->getSpotPeche($row["id_spot"]);
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

    public function create(string $image_prise, float $poids, float $taille, int $id_pecheur, int $id_espece, int $id_spot): bool
    {
        $prise = new Prise();
        $stmt = $prise->pdo->prepare(
            "INSERT INTO prises (image_prise, poids, taille, id_pecheur, id_espece, id_spot) VALUES (:image_prise, :poids, :taille, :id_pecheur, :id_espece, :id_spot)"
        );
        return $stmt->execute([
            'image_prise' => $image_prise,
            'poids' => $poids,
            'taille' => $taille,
            'id_pecheur' => $id_pecheur,
            'id_espece' => $id_espece,
            'id_spot' => $id_spot
        ]);
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

    public function getCountPrise()
    {
        $sql = "SELECT * FROM prises";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        return count($stmt->fetchAll(PDO::FETCH_ASSOC));
    }
}

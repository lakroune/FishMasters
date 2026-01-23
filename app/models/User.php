<?php

namespace app\models;

use config\Connexion;
use Exception;
use PDO;


class  User
{
    protected int $id_user;
    protected string $nom_user;
    protected string $prenom_user;
    protected string $email;
    protected string $password_user;
    protected string $role_user;


    public function __construct() {}

    public function getIdUser(): int
    {
        return $this->id_user;
    }

    public function getNom(): string
    {
        return $this->nom_user;
    }

    public function getPrenom(): string
    {
        return $this->prenom_user;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getPassword(): string
    {
        return $this->password_user;
    }

    public function getRole(): string
    {
        return $this->role_user;
    }

    public function setId(int $id): void
    {
        if ($id < 0) {
            throw new Exception("L'id doit être supérieur à 0");
        }

        $this->id_user = $id;
    }

    public function setNom(string $nom): void
    {
        if (empty($nom)) {
            throw new Exception("Le nom ne doit pas être vide");
        }

        $this->nom_user = $nom;
    }

    public function setPrenom(string $prenom): void
    {
        if (empty($prenom)) {
            throw new Exception("Le prénom ne doit pas être vide");
        }

        $this->prenom_user = $prenom;
    }

    public function setEmail(string $email): void
    {
        $regex = '/^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$/';
        if (!preg_match($regex, $email)) {
            throw new Exception("L'email n'est pas au bon format");
        }

        $this->email = $email;
    }

    public function setPassword(string $password): void
    {
        if (strlen($password) < 8) {
            throw new Exception("Le mot de passe doit contenir au moins 8 caractères");
        }

        $this->password_user = $password;
    }

    public function setRole(string $role): void
    {
        if (!in_array($role, ['FAN', 'PECHEUR', 'ADMIN'])) {
            throw new Exception("Le role doit être FAN, PECHEUR ou ADMIN");
        }

        $this->role_user = $role;
    }
    public function __toString()
    {
        return "user  : id_user = $this->id_user, nom_user = $this->nom_user, prenom_user = $this->prenom_user, email = $this->email, password_user = $this->password_user, role_user = $this->role_user";
    }

   public function findbyEmail(string $email)
   { try {
            $db = Connexion::connect()->getConnexion();
            $sql = "SELECT * FROM users WHERE email = :email";
            $stmt = $db->prepare($sql);
            $stmt->execute([':email'=> $email]);
            return $stmt->fetch(PDO::FETCH_CLASS, 'User');
   }catch(Exception $e){
        return $e->getMessage();
   }

   }

}

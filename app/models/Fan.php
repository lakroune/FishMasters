<?php

namespace app\models;

use config\Connexion;
use Exception;

class Fan extends User
{
    public function __construct()
    {
        parent::__construct();
    }
    public function __toString()
    {
        return parent::__toString();
    }
    public function register(array $data): bool
    {
        $db = Connexion::connect()->getConnexion();
        $query = "INSERT INTO fans (nom_user, prenom_user, email, password_user, role_user) VALUES (:nom_user, :prenom_user, :email, :password_user, :role_user)";
        try {
            $stmt = $db->prepare($query);
        } catch (Exception $e) {
            throw new Exception("Une erreur est survenue lors de la requête SQL : " . $query . " : " . $e->getMessage());
        }
        $this->rempirer($data);
        $stmt->bindValue(':nom_user', $this->nom_user);
        $stmt->bindValue(':prenom_user', $this->prenom_user);
        $stmt->bindValue(':email', $this->email);
        $stmt->bindValue(':password_user', $this->password_user);
        $stmt->bindValue(':role_user', $this->role_user);
        return $stmt->execute();
    }
    private function rempirer(array $data)
    {
        foreach ($data as $key => $value) {
            $method = 'set' . ucfirst($key);
            if (method_exists($this, $method)) {
                $this->$method($value);
            }
        }
    }
}

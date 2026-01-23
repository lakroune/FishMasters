<?php
namespace app\models;
use config\Connexion;
use Exception;
use PDO;

class SearchResult {

    public function search($keyword) 
    {     
    
         $db = Connexion::connect()->getConnexion();

        $sql = "
            SELECT name, 'fisher' AS type FROM fishers WHERE name LIKE :keyword
            UNION ALL
            SELECT name, 'team' AS type FROM teams WHERE name LIKE :keyword
            UNION ALL
            SELECT name, 'competition' AS type FROM competitions WHERE name LIKE :keyword
            UNION ALL
            SELECT name, 'spot' AS type FROM fishing_spots WHERE name LIKE :keyword
        ";

        $stmt = $db->prepare($sql);
        $stmt->execute(['keyword' => "%$keyword%"]);

        return $stmt->fetchObject(SearchResult::class);

}

}



?>
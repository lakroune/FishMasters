<?php

namespace app\controllers;
use app\models\Competition;
use app\models\Equipe;
use app\models\Pecheur;
use app\models\SpotPeche;
use app\models\SearchResult;


class AboutController
{
        public function index()
        {
            require_once __DIR__ . '/../views/about.php';
        
        }

        public function searchAll()
        {  if(isset($_POST['submit'])){
                $key = $_POST['key'];
                $search = "%$key%"; 
            $pecheurs = Pecheur::searchPecheur($search);
            $equipes = Equipe::searchEquipe($search);
            $Competitions = Competition::searchCompetition($search);
            $spots = SpotPeche::searchSpot($search);
            $data['results'] = [
                 'pecheurs' => $pecheurs,
                 'equipes' => $equipes,
                 'competitions' => $Competitions,
                 'spots' => $spots
            ];  

              require_once __DIR__ . '/../views/about.php';
            
            
        }

        }
     
     public function showAll()
     {  $data = [
        'ficherMan' => Pecheur::getAllPecheur(),
        'team' => Equipe::all(),
        'Competition' => Competition::getAllCompetition(),
        'spot' =>  SpotPeche::getAllSpotPeche()
     ];
          var_dump($data);
      
          require_once __DIR__ . '/../views/about.php';
     }   
}
  
       

    
    

 


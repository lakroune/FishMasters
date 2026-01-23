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
    {     $searchType = new SearchResult();
          $data['results'] = [];

         if(isset($_POST['submit'])){
            $key = $_POST['key'];
            $search = "%$key%"; 
            $data['results'] = $searchType->search($search);   
        }
        $this->view('about', $data);

    }
  
       

    }
    

 


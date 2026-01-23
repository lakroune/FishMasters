<?php

namespace app\controllers;

class PecheurController
{
    /**
     * Afficher la page des pecheurs
     *
     * @return void
     */
    public function afficher()
    {
        require_once __DIR__ . '/../views/Pecheur.php';
    }


    /**
     * Afficher la page de modification des pecheurs
     * 
     * @return void
     */
    public function modifier()
    {
        require_once __DIR__ . '/../views/modifier_pecheur.php';
    }
}

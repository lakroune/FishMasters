<?php

namespace app\controllers;


class HomeController
{

    /**
     * Display the home page.
     */
    public function index()
    {
        require __DIR__ . '/../views/index.php';
    }
    
    /**
     * This function is called when no other route is matched.
     */
    public function default()
    {
        echo "Default";
    }
}

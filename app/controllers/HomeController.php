<?php

namespace app\controllers;


class HomeController
{

    /**
     * Display the home page.
     */
    public function index()
    {
       
        require_once __DIR__."/../views/Admin.php";
    }
    /**
     * This function is called when no other route is matched.
     */
    public function default()
    {
        echo "Default";
    }
}

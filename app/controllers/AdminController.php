<?php
    namespace app\controllers;



Class AdminController
{

    public function index()
    {
        require_once __DIR__ . '/../views/admin.php';
    }
    
    public function addComptition()
    {

    }
    public function default()
    {
        $this->index();
    }
}

?>
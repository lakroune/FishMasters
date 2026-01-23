<?php

namespace app\controllers;

class LogoutController
{
    public function index()
    {
        session_destroy();
        header('Location: ' . PATH_ROOT . '/index.php');
    }
    public function default()
    {
        $this->index();
    }
}

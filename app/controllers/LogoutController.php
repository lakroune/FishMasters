<?php

namespace app\controllers;

class LogoutController
{
    public function index()
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        session_unset();
        session_destroy();
        header('Location: ' . PATH_ROOT . '/');
        exit();
    }

    public function default()
    {
        $this->index();
    }
}

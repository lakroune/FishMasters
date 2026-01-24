<?php

namespace app\controllers;

class LogoutController
{
    public function index()
    {
        session_abort();
        session_destroy();
        header('Location: ' . PATH_ROOT . '/');
    }
    public function default()
    {
        $this->index();
    }
}

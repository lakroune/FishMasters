<?php

namespace app\controllers;

class ErrorController
{
    public function index()
    {
        require_once __DIR__ . '/../views/error.php';
    }
    public function default()
    {
        $this->index();
    }
}

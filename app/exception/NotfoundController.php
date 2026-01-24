<?php

namespace app\exception;

use Exception;

class NotfoundController extends Exception
{
    /**
     * Return a 404 response.
     */
    public function index()
    {
        header("location: " . PATH_ROOT . "/error/404");
    }
}

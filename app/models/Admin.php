<?php

namespace app\models;

class Admin extends User
{
    public function __construct()
    {
        parent::__construct();
    }
    public function __toString()
    {
        return parent::__toString();
    }
}

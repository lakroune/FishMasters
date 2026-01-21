<?php

namespace app\models;

class Fan extends User
{
    public function __construct() {}
    public function __toString()
    {
        return parent::__toString();
    }
}

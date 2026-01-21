<?php

namespace app\models;

Class Notification
{
    private $id_note;
    private $contenu;
    private $date;

    public function __set($proprty, $value)
    {
        $this->$proprty = $value;
    }

    public function __get($proprty)
    {
        return $this->$proprty;
    }

}

?>
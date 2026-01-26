<?php

namespace app\controllers;

use app\models\Prise;
use app\models\Like;

class LikeController
{


    public function index()
    {
        if (!isset($_SESSION['User'])) {
            header('Location: ' . PATH_ROOT . '/login');
            exit;
        }

        $id_fan = $_SESSION['User']->getIdUser();
        // $prisesAimees = Like::getLikedPrisesByUser($id_fan);
        
        require_once __DIR__ . '/../views/mes_likes.php';
    }


    public function toggle()
    {

        if (!isset($_SESSION['User'])) {
            header('Location: ' . PATH_ROOT . '/login');
            return;
        }

        $id_fan = $_SESSION['User']->getIdUser();
        $id_prise = $_POST['id_prise'];
        $id_competition = $_POST['id_competition'];
        if ((new Like(0, $id_fan, $id_prise, $id_competition))->addLike())
            header("Location: " . PATH_ROOT . "/");
        else
            header("Location: " . PATH_ROOT . "/");
        exit;
    }
}

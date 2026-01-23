<?php

namespace app\controllers;


class HomeController
{

    /**
     * Display the home page.
     */
    public function index()
    {
        if (isset($_SESSION['User'])):
            if ($_SESSION['User']->getRole() === "ADMIN"):
                require_once __DIR__ . '/../views/admin.php';
            elseif ($_SESSION['User']->getRole() === "PECHEUR"):
                require_once __DIR__ . '/../views/Profile_Pecheur.php';
            elseif ($_SESSION['User']->getRole() === "FAN"):
                require_once __DIR__ . '/../views/actualites.php';
            endif;
        else:
            require_once __DIR__ . '/../views/index.php';
        endif;
    }

    /**
     * This function is called when no other route is matched.
     */
    public function default()
    {
        echo "Default";
    }
}

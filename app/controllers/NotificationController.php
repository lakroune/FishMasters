<?php

namespace app\controllers;

use app\models\Notification;

class NotificationController
{

    public function index()
    {
        if (!isset($_SESSION['User']) and $_SESSION['User']->getRole() !== "FAN") {
            header('Location: ' . PATH_ROOT . '/login');
            exit;
        }

        $id_fan = $_SESSION['User']->getIdUser();

        // $notifications = Notification::getByUser($id_fan);
        // Notification::markAsRead($id_fan);

        require_once __DIR__ . '/../views/notifications.php';
    }
}

<?php

namespace app\controllers;

use app\models\Pecheur;
use app\models\Subscribe;

class SubscribeController
{
    private Subscribe $model;

    public function __construct()
    {
        $this->model = new Subscribe();
    }

    public function index()
    {
        if (!isset($_SESSION['User'])) {
            header('Location: ' . PATH_ROOT . '/login');
            exit();
        }

        $id_fan = $_SESSION['User']->getIdUser();
        $subscriptions = $this->model->getByUser($id_fan);
        foreach ($subscriptions as $subscription) {
            $pecheurs[] = (new Pecheur())->getPecheurById($subscription->getIdPecheur());
        }
        require_once __DIR__ . '/../views/mes_subscribes.php';
    }

    public function subscribe(int $id_user, int $id_competition)
    {
        if ($this->model->isSubscribed($id_user, $id_competition)) {
            return "User already subscribed.";
        }

        if ($this->model->create($id_user, $id_competition)) {
            return "Subscription successful!";
        }

        return "Failed to subscribe.";
    }


    public function unsubscribe(int $id_user, int $id_competition)
    {
        if ($this->model->delete($id_user, $id_competition)) {
            return "Unsubscribed successfully.";
        }

        return "Failed to unsubscribe.";
    }
    public function listUserSubscriptions(int $id_user): array
    {
        return $this->model->getByUser($id_user);
    }
}

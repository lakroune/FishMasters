<?php
class PerformanceController {

    private $model;

    public function __construct($model) {
        $this->model = $model;
    }

    public function showPerformance($id_user, $id_competition) {

        $data = $this->model->getAllData($id_user, $id_competition);

        require 'views/performance.php';
    }
}

?>
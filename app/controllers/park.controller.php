<?php
require_once './app/models/park.model.php';
require_once './app/views/park.view.php';

class ParkController {
    private $model;
    private $view;

    public function __construct() {
        $this->model = new ParkModel();
        $this->view = new ParkView();
    }
    public function showParks(){
        $parks = $this->model->getAll();
        $this->view->showParks($parks);
    }
}
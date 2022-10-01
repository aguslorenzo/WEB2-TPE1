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

    public function getPark($id){
        $park = $this->model->getPark($id);
        $this->view->showPark($park);

    }

    public function addPark(){
        //VALIDACIONES
        $name = $_POST['name'];
        $description = $_POST['description'];
        $price = $_POST['price'];
        $province = $_POST['province'];

        $this->model->insert($name, $description, $price, $province);

        header("Location: " . BASE_URL); 
    }
}
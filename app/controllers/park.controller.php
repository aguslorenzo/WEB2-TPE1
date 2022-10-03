<?php
require_once './app/models/park.model.php';
require_once './app/views/park.view.php';

class ParkController {
    private $model;
    private $provinceModel;
    private $view;

    public function __construct() {
        $this->model = new ParkModel();
        $this->view = new ParkView();
        $this->provinceModel = new ProvinceModel();
    }
    public function showParks(){
        $parks = $this->model->getAll();
        $this->view->showParks($parks);
    }

    public function getPark($id){
        $park = $this->model->getPark($id);
        $province = $this->provinceModel->getProvinceById($park->id_province_fk);
        $this->view->showPark($park, $province->name);

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

    public function deletePark($id){
        $this->model->deleteParkById($id);
        header("Location: " . BASE_URL);
    }
    public function editPark($id){
        //VALIDACIONES
        $name = $_POST['name'];
        $description = $_POST['description'];
        $price = $_POST['price'];
        $province = $_POST['province'];
        $this->model->editParkById($id, $name, $description, $price, $province);
        //falta llamar a vista card
    }
}
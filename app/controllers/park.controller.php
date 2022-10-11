<?php
require_once './app/models/park.model.php';
require_once './app/views/park.view.php';
require_once './app/helpers/auth.helper.php';

class ParkController {
    private $model;
    private $provinceModel;
    private $view;
    private $authHelper;

    public function __construct() {
        $this->model = new ParkModel();
        $this->view = new ParkView();
        $this->provinceModel = new ProvinceModel();
        $this->authHelper = new AuthHelper();
        
        
    }
    public function showParks(){
        session_start();
        $parks = $this->model->getAll();
        $provinces = $this->provinceModel->getAll();
        $this->view->showParks($parks, $provinces);
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
        if (empty($name)||empty($description)||empty($price)||empty($province)){
            $this->view->showError("Faltan datos obligatorios");
        }
        else if (!is_numeric($price)){
            $this->view->showError("Debe ingresar un número entero en este campo");
        }

        $this->model->insert($name, $description, $price, $province);

        header("Location: " . BASE_URL); 
    }

    public function deletePark($id){
        $this->authHelper->checkLoggedIn();
        $this->model->deleteParkById($id);
        header("Location: " . BASE_URL);
    }
    public function editPark($id){
        $provinces = $this->provinceModel->getAll();
        $this->getPark($id);
        $this->view->editPark($id, $provinces);
    }

    public function savePark($id){
        $name = $_POST['name'];
        $description = $_POST['description'];
        $price = $_POST['price'];
        $province = $_POST['province'];
        if (empty($name)||empty($description)||empty($price)||empty($province)){
            $this->view->showError("Faltan datos obligatorios");
            die;
        }
        else if (!is_numeric($price)){
            $this->view->showError("Debe ingresar un número entero en este campo");
        }
        $this->model->editParkById($id, $name, $description, $price, $province);
        $this->getPark($id);
    }
}
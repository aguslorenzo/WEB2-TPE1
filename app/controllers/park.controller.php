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
        session_start();
        $park = $this->model->getPark($id);
        if (!empty($park)){
            $province = $this->provinceModel->getProvinceById($park->id_province_fk);
            $this->view->showPark($park, $province->name);
        }
        else {
            $error = "Parque no encontrado";
            $this->view->showPark($park, null, $error);
        }
        
    }

    public function addPark(){
        session_start();
        $this->authHelper->checkLoggedIn();
        $name = $_POST['name'];
        $description = $_POST['description'];
        $price = $_POST['price'];
        $province = $_POST['province'];

        if (empty($name)||empty($description)||empty($price)||empty($province)){
            $this->view->showError("Faltan datos obligatorios");
            die();
        }
        /* else if (!is_numeric($price)){
            $this->view->showError("Debe ingresar un número entero en este campo");
            die();
        } */

        $this->model->insert($name, $description, $price, $province);

        header("Location: " . BASE_URL); 
    }

    public function deletePark($id){
        session_start();
        $this->authHelper->checkLoggedIn();
        $this->model->deleteParkById($id);
        header("Location: " . BASE_URL);
    }
    public function editPark($id){
        session_start();
        $this->authHelper->checkLoggedIn();
        $provinces = $this->provinceModel->getAll();
        $this->view->editPark($id, $provinces);
    }

    public function savePark($id){
        $name = $_POST['name'];
        $description = $_POST['description'];
        $price = $_POST['price'];
        $province = $_POST['province'];
        $park = $this->model->getPark($id);
        if (empty($park)){
            $this->view->showError("Parque no encontrado");
        }
        else {
            if (!empty($name)){
                $park->name = $name;
            }
            if (!empty($description)){
                $park->description = $description;
            }
            if ((!empty($price))){
                $park->price = $price;
            }
            if (!empty($province)){
                $park->id_province_fk = $province;
            }

            $this->model->editParkById($id, $park->name, $park->description, $park->price, $park->id_province_fk);
            $this->getPark($id);
        }
    }

    function showError(){
        $this->view->showError("Compruebe la ruta");
    }
}
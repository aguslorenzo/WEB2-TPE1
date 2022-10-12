<?php
require_once './app/models/province.model.php';
require_once './app/views/province.view.php';
require_once './app/helpers/auth.helper.php';

class ProvinceController {
    private $model;
    private $view;
    private $authHelper;

    public function __construct() {
        $this->model = new ProvinceModel();
        $this->view = new ProvinceView();
        $this->authHelper = new AuthHelper();
    }

    public function showProvinces(){
        session_start();
        $provinces = $this->model->getAll();
        $this->view->showProvinces($provinces);
    }

    public function getParksByProvince($id){
        $parks = $this->model->getParks($id);
        $province = $this->model->getProvinceById($id);
        $this->view->showParks($parks, $province);
    }

    public function addProvince(){
        $this->authHelper->checkLoggedIn();
        //VALIDACIONES
        $name = $_POST['name'];
        $capital = $_POST['name'];
        $weather = $_POST['name'];
        if (empty($name)||!is_string($name)||!is_string($capital)||!is_string($weather)){
            $this->view->showError("Faltan datos obligatorios");    
        }
        $this->model->insert($name, $capital, $weather);
        header("Location: " . BASE_URL . "provinces");
    }
    public function deleteProvince($id){
        $this->authHelper->checkLoggedIn();
        $this->model->deleteProvinceById($id);
        header("Location: " . BASE_URL . "provinces");
    }

    public function editProvince($id){
        $this->authHelper->checkLoggedIn();
        $this->getParksByProvince($id);
        $this->view->editProvince($id);
    }

    public function saveProvince($id){
        session_start();
        $name = $_POST['name'];
        $capital = $_POST['capital'];
        $weather = $_POST['weather'];
        if (empty($name)||empty($capital)||empty($weather)){
            $this->view->showError("Faltan datos obligatorios");
            die;
        }
        $this->model->editProvinceById($id, $name, $capital, $weather);
        $this->getParksByProvince($id);
    }
}
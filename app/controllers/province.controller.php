<?php
require_once './app/models/province.model.php';
require_once './app/views/province.view.php';

class ProvinceController {
    private $model;
    private $view;

    public function __construct() {
        $this->model = new ProvinceModel();
        $this->view = new ProvinceView();
    }

    public function showProvinces(){
        $provinces = $this->model->getAll();
        $this->view->showProvinces($provinces);
    }

    public function getParksByProvince($id){
        $parks = $this->model->getParks($id);
        $province = $this->model->getProvinceById($id);
        $this->view->showParks($parks, $province);
    }

    public function addProvince(){
        //VALIDACIONES
        $name = $_POST['name'];
        $capital = $_POST['name'];
        $weather = $_POST['name'];
        if (empty($name)||!is_string($name)||!is_string($capital)||!is_string($weather)){
            $this->view->showError("Faltan datos obligatorios");    
        }
        $this->model->insert($name, $capital, $weather);
        $this->showProvinces();
    }
    public function deleteProvince($id){
        $this->model->deleteProvinceById($id);
        $this->showProvinces();
    }

    public function editProvince($id){
        $this->view->editProvince($id);
    }

    public function saveProvince($id){
        $name = $_POST['name'];
        $capital = $_POST['capital'];
        $weather = $_POST['weather'];
        if (empty($name)||empty($capital)||empty($weather)){
            $this->view->showError("Faltan datos obligatorios");
        }
        $this->model->editProvinceById($id, $name, $capital, $weather);
        $this->getParksByProvince($id);
    }
}
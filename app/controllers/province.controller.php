<?php
require_once './app/models/province.model.php';
require_once './app/views/province.view.php';
require_once './app/helpers/auth.helper.php';

class ProvinceController {
    private $model;
    private $view;
    private $parkModel;
    private $authHelper;

    public function __construct() {
        $this->model = new ProvinceModel();
        $this->view = new ProvinceView();
        $this->parkModel = new ParkModel();
        $this->authHelper = new AuthHelper();
    }

    public function showProvinces(){
        session_start();
        $provinces = $this->model->getAll();
        $this->view->showProvinces($provinces);
    }

    public function getParksByProvince($provinceId){
        session_start();
        $parks = $this->parkModel->getParks($provinceId); //todos los parques de una provincia
        $province = $this->model->getProvinceById($provinceId);
        if (!empty($parks)){
            $this->view->showParks($parks, $province);
        }
        else {
            $error = "Parques no encontrados";
            $this->view->showParks(null, $province, $error);
        }
    }

    public function addProvince(){
        $this->authHelper->checkLoggedIn();
        $name = $_POST['name'];
        $capital = $_POST['capital'];
        $weather = $_POST['weather'];
        if (empty($name)||empty($capital)||empty($weather)){
            $this->view->showError("Faltan datos obligatorios");
            die();
        }
        
        $this->model->insert($name, $capital, $weather);
        header("Location: " . BASE_URL . "provinces");
    }

    public function deleteProvince($id){
        $this->authHelper->checkLoggedIn();
        try {
            $this->model->deleteProvinceById($id);
            header("Location: " . BASE_URL . "provinces");
        } catch (PDOException){
            $this->view->showError("No puede eliminar esta categoría porque existen parques pertenecientes a la misma.");
        }
    }

    public function editProvince($id){
        $this->authHelper->checkLoggedIn();
        $this->view->editProvince($id);
    }

    public function saveProvince($id){
        $name = $_POST['name'];
        $capital = $_POST['capital'];
        $weather = $_POST['weather'];
        $province = $this->model->getProvinceById($id);
        if (empty($province)){
            $this->view->showError("Provincia no encontrada");
        }
        else {
            if (!empty($name)){
                $province->name = $name;
            }
            if (!empty($capital)){
                $province->capital = $capital;
            }
            if (!empty($weather)){
                $province->weather = $weather;
            }

            $this->model->editProvinceById($id, $province->name, $province->capital, $province->weather);
            header("Location: " . BASE_URL . "province/$id" );
        }
    }
    function showError(){
        $this->view->showError("Compruebe la ruta");
    }
}
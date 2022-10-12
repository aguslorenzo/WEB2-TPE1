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
        $province = $this->model->getProvinceById($provinceId); //detalles de una provincia
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
        session_start();
        $this->authHelper->checkLoggedIn();
        /* $this->getParksByProvince($id); */
        $this->view->editProvince($id);
    }

    public function saveProvince($id){
        $name = $_POST['name'];
        $capital = $_POST['capital'];
        $weather = $_POST['weather'];
        if (empty($name)||empty($capital)||empty($weather)){
            $this->view->showError("Faltan datos obligatorios");
            die;
        }
        $this->model->editProvinceById($id, $name, $capital, $weather);
        /* $this->getParksByProvince($id); */
        header("Location: " . BASE_URL . "province/$id" );
    }
}
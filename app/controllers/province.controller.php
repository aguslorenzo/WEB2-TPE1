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
        $provinceName = $_POST['name'];
        $this->model->insert($provinceName);
        $this->showProvinces();
    }
    public function deleteProvince($id){
        $this->model->deleteProvinceById($id);
        $this->showProvinces();
    }
}
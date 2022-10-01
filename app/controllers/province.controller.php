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
        $this->view->showParks($parks);
    }
}
<?php
class ProvinceModel {
    private $db;

    public function __construct() {
        $this->db = new PDO('mysql:host=localhost;'.'dbname=parks;charset=utf8', 'root', '');
    }

    function getAll(){
        $query = $this->db->prepare("SELECT * FROM provinces");
        $query->execute();
        $provinces = $query->fetchAll(PDO::FETCH_OBJ);
        return $provinces;
    }

    function getParks($id){
        $query = $this->db->prepare("SELECT * FROM parks WHERE id_province_fk=$id");
        $query->execute();
        $parks = $query->fetchAll(PDO::FETCH_OBJ);
        return $parks;
    }
    function getProvinceById($id){
        $query = $this->db->prepare("SELECT name FROM provinces WHERE id=$id");
        $query->execute();
        $province = $query->fetch(PDO::FETCH_OBJ);
        return $province;
    }
}
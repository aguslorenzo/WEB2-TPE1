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
        $query = $this->db->prepare("SELECT * FROM parks WHERE id_province_fk=?");
        $query->execute([$id]);
        $parks = $query->fetchAll(PDO::FETCH_OBJ);
        return $parks;
    }
    function getProvinceById($id){
        $query = $this->db->prepare("SELECT * FROM provinces WHERE id=?");
        $query->execute([$id]);
        $province = $query->fetch(PDO::FETCH_OBJ);
        return $province;
    }

    function insert($name, $capital, $weather) {
        $query = $this->db->prepare("INSERT INTO provinces (name, capital, weather) VALUES (?, ?, ?)");
        $query->execute([$name, $capital, $weather]);
        
        return $this->db->lastInsertId();
        //en este caso me lleva a parques, deberia de llevarme a rpovincias no se como hacer eso
    }

    function deleteProvinceById($id){
        $query = $this->db->prepare("DELETE FROM provinces WHERE id=?");
        $query->execute([$id]);
    }
    function editProvinceById($id, $name, $capital, $weather){
        $query = $this->db->prepare("UPDATE provinces SET name=? , capital=? , weather=? WHERE id= ?");
        $query->execute([$name, $capital, $weather, $id]);
    }
}
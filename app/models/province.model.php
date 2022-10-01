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
        //mostrar nombre de la categoria a la q
        $query = $this->db->prepare("SELECT parks.name, parks.description, parks.price/* , provinces.name */
        FROM parks
        INNER JOIN provinces
        ON parks.id_province_fk = provinces.id
        WHERE provinces.id=$id");
        $query->execute();
        $parks = $query->fetchAll(PDO::FETCH_OBJ);
        if (empty($parks)){
            echo "no hay parques en esta provincia";
            die;
        }
        else {
            return $parks;
        }
    }
}
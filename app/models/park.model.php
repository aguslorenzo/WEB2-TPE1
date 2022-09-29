<?php

class ParkModel{
    private $db;

    public function __construct() {
        $this->db = new PDO('mysql:host=localhost;'.'dbname=parks;charset=utf8', 'root', '');
    }

    function getAll(){
        $query = $this->db->prepare('SELECT * FROM parks');
        $query->execute();
        $parks = $query->fetchAll(PDO::FETCH_OBJ);
        return $parks;
    }
}
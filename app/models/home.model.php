<?php

class HomeModel {
    private $db;

    public function  __construct() {
        $this->db = new PDO('mysql:host=localhost;'.'dbname=db_tpe;charset=utf8', 'root', '');
      
    }

    function getAllPelisHome() {
        $query = $this->db->prepare("SELECT pelis.id, pelis.nombre, pelis.estreno, pelis.puntuacion, pelis.director, pelis.fk_estudio, estudio.nombre_estudio FROM pelis INNER JOIN estudio ON pelis.fk_estudio = estudio.id_nombre_fk");
        $query->execute();
        $pelis = $query->fetchAll(PDO::FETCH_OBJ); // devuelve un arreglo de objetos
        
        return $pelis;
    }

}
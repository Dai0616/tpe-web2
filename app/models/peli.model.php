<?php

class PeliModel {
    private $db;

    public function  __construct() {
        $this->db = new PDO('mysql:host=localhost;'.'dbname=db_tpe;charset=utf8', 'root', '');
      
    }

    function getAllPelis() {
        $query = $this->db->prepare("SELECT pelis.id, pelis.nombre, pelis.estreno, pelis.puntuacion, pelis.director, pelis.fk_estudio, pelis.imagen, estudio.nombre_estudio, estudio.id_nombre_fk  FROM pelis INNER JOIN estudio ON pelis.fk_estudio = estudio.id_nombre_fk");
        $query->execute();
        $pelis = $query->fetchAll(PDO::FETCH_OBJ); // devuelve un arreglo de objetos
        
        return $pelis;
    }

    public function getRegisterById($id){
        $query = $this->db->prepare("SELECT * FROM pelis where `id`=$id");
        $query->execute();
        $peliRegister = $query->fetchAll(PDO::FETCH_OBJ);
        return $peliRegister;
    }

    public function insertPeli($pelicula, $estreno, $puntuacion, $director, $id_nombre_fk, $imagen = null) {
            $pathImg = null;
            if ($imagen)
            $pathImg = $this->uploadImage($imagen);
            
        $query = $this->db->prepare("INSERT INTO pelis (nombre, estreno, puntuacion, director, fk_estudio, imagen) VALUES (?, ?, ?, ?, ?, ?)");
        $query->execute([$pelicula, $estreno, $puntuacion, $director, $id_nombre_fk, $pathImg]);

        return $this->db->lastInsertId();
    }
    private function uploadImage($image){
        $target = 'img/peliculas/' . uniqid() . '.jpg';
        move_uploaded_file($image, $target);//funcion por defecto para mover archivos de una carpeta a otra
        return $target;
    }
    public function insertEditPeli($pelicula, $estreno, $puntuacion, $director, $id_nombre_fk, $id){
        
        $query = $this->db->prepare("UPDATE `pelis` SET nombre=?, estreno=?, puntuacion=?, director=?, fk_estudio=? WHERE id=?");
        $query->execute([$pelicula, $estreno, $puntuacion, $director, $id_nombre_fk, $id]);
}


    function deletePeliById($id) {
        $query = $this->db->prepare('DELETE FROM pelis WHERE id = ?');
        $query->execute([$id]);
    
    }
    public function getFilter($id){
        $query = $this->db->prepare("SELECT * FROM pelis WHERE fk_estudio= ?"); 
        $query->execute([$id]);

        $filter = $query->fetchAll(PDO::FETCH_OBJ);
        return $filter;
    }

}


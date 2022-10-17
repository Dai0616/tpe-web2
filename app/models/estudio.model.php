<?php

class EstudioModel{
  
    private $db;

    public function  __construct() {
        $this->db = new PDO('mysql:host=localhost;'.'dbname=db_tpe;charset=utf8', 'root', '');
      
    }

    function getAllEstudios(){
        $query = $this->db->prepare ("SELECT * FROM estudio");
        $query->execute();

        $estudios = $query->fetchAll(PDO::FETCH_OBJ);

        return $estudios;
    }
    public function getNameById($id){
        $query = $this->db->prepare("SELECT `nombre_estudio`FROM `estudio` WHERE `id_nombre_fk`= ?");
        $query->execute([$id]);
        $name = $query->fetch(PDO::FETCH_OBJ);
        return $name;
    }
    public function getRegisterEstudioById($id){
        $query = $this->db->prepare("SELECT * FROM estudio");
        $query->execute();
        $estudioRegister = $query->fetchAll(PDO::FETCH_OBJ);
        return $estudioRegister;
    }
    public function getRegisterEstudioById2($id){
        $query = $this->db->prepare("SELECT * FROM estudio where `id_nombre_fk`=$id");
        $query->execute();
        $estudioRegister = $query->fetchAll(PDO::FETCH_OBJ);
        return $estudioRegister;
    }
    function insertEstudio($nombre_estudio, $creacion, $historia, $imagen = null) { 
        $pathImg = null;
        if ($imagen)
        $pathImg = $this->uploadImage($imagen);

        $query = $this->db->prepare("INSERT INTO estudio (nombre_estudio, creacion, historia, imagen) VALUES (?, ?, ?, ?)");
         $query->execute([$nombre_estudio, $creacion, $historia, $pathImg]);
         
         return $this->db->lastInsertId();
     }
     private function uploadImage($image){
        $target = 'img/estudios/' . uniqid() . '.jpg';
        move_uploaded_file($image, $target);//funcion por defecto para mover archivos de una carpeta a otra
        return $target;
    }

     public function insertEditEstudio($nombre_estudio, $creacion, $historia, $id){
        $this->authHelper->checkLoggedIn();
        $query = $this->db->prepare("UPDATE `estudio` SET nombre_estudio=?, creacion=?, historia=? WHERE id_nombre_fk=?");
        $query->execute([$nombre_estudio, $creacion, $historia, $id]);
}
     function deleteEstudioById($id) {
        $query = $this->db->prepare('DELETE FROM estudio WHERE id_nombre_fk = ?');
        $query->execute([$id]);
        header("Location: " . BASE_URL. 'listaEstudios');
    }
}
<?php
require_once './app/models/peli.model.php';
require_once './app/views/peli.view.php';
require_once './app/helpers/auth.helper.php';

class peliController {
    private $model;
    private $view;
    private $modelEstudio;//nueva variable

    public function __construct() {
        $this->model = new PeliModel();
        $this->view = new PeliView();
        $this->modelEstudio = new EstudioModel();
        $authHelper = new AuthHelper();
        $authHelper->checkLoggedIn();
    }

    public function showPelis() {
        $pelis = $this->model->getAllPelis();
        $modelEstudio = $this->modelEstudio->getAllEstudios();
        $this->view->showPelis($pelis, $modelEstudio);
    }

   function addPeli() {
        // TODO: validar entrada de datos

        $pelicula = $_POST['pelicula'];
        $estreno = $_POST['estreno'];
        $puntuacion = $_POST['puntuacion'];
        $director = $_POST['director'];
        $id_nombre_fk = $_POST ['id_nombre_fk'];
        //agrego la imagen
        if ($_FILES['input_name']['type'] =="image/jpg" ||
        $_FILES['input_name']['type'] =="image/jpeg"||
        $_FILES['input_name']['type'] =="image/png" ){
        $this->model->insertPeli($pelicula, $estreno, $puntuacion, $director, $id_nombre_fk, $_FILES['input_name']['tmp_name']);
        }
        else{
            $id = $this->model->insertPeli($pelicula, $estreno, $puntuacion, $director, $id_nombre_fk);
        }

        header('Location: ' . BASE_URL. 'listaPelis');
    }
    function  showEditPeli($id){
        $pelis = $this->model->getRegisterById($id);
        $estudios = $this->modelEstudio->getRegisterEstudioById($id);
        $this->view->showEditPelis($pelis, $estudios);
}

function insertEditPeli($id){
    if((isset($_POST['pelicula'])&&isset($_POST['estreno'])&&isset($_POST['puntuacion'])&&isset($_POST['director'])&&isset($_POST['id_nombre_fk']))&&!empty($_POST['pelicula'])&&!empty($_POST['estreno'])&&!empty($_POST['puntuacion'])&&!empty($_POST['director'])&&!empty($_POST['id_nombre_fk'])){      
        $pelicula = $_POST['pelicula'];
        $estreno = $_POST['estreno'];
        $puntuacion = $_POST['puntuacion'];
        $director = $_POST['director'];
        $id_nombre_fk = $_POST['id_nombre_fk'];


        $this->model->insertEditPeli($pelicula, $estreno, $puntuacion, $director, $id_nombre_fk, $id);
        header('Location: ' . BASE_URL. 'listaPelis');
    }
}
   
    function deletePeli($id) {
        $this->model->deletePeliById($id);
        header('Location: ' . BASE_URL. 'listaPelis');
    }

}


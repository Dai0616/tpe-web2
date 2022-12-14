<?php
require_once './app/models/peli.model.php';
require_once './app/views/peli.view.php';
require_once './app/models/estudio.model.php';
require_once './app/helpers/auth.helper.php';

class peliController {
    private $model;
    private $view;
    private $modelEstudio;//nueva variable

    public function __construct() {
        $this->model = new PeliModel();
        $this->view = new PeliView();
        $this->modelEstudio = new EstudioModel();
        if (session_status() != PHP_SESSION_ACTIVE) {
            session_start();
        }
       }

    public function showPelis() {
        $pelis = $this->model->getAllPelis();
        $modelEstudio = $this->modelEstudio->getAllEstudios();
        $this->view->showPelis($pelis, $modelEstudio);
    }
    
    public function showDetalle($id){
        $detalle= $this->modelEstudio->getRegisterEstudioById2($id);
        $modelEstudio = $this->modelEstudio->getAllEstudios();
        $this->view->showDetalle($detalle, $modelEstudio);
    }

   function addPeli() {
        $authHelper = new AuthHelper();
        $authHelper->checkLoggedIn();
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
        $authHelper = new AuthHelper();
        $authHelper->checkLoggedIn();
        $pelis = $this->model->getRegisterById($id);
        $estudios = $this->modelEstudio->getRegisterEstudioById($id);
        $this->view->showEditPelis($pelis, $estudios);
}

function insertEditPeli($id){
    $authHelper = new AuthHelper();
    $authHelper->checkLoggedIn();
    if((isset($_POST['pelicula'])&&isset($_POST['estreno'])&&isset($_POST['puntuacion'])&&isset($_POST['director'])&&isset($_POST['categoria']))&&!empty($_POST['pelicula'])&&!empty($_POST['estreno'])&&!empty($_POST['puntuacion'])&&!empty($_POST['director'])&&!empty($_POST['categoria'])){      
        $pelicula = $_POST['pelicula'];
        $estreno = $_POST['estreno'];
        $puntuacion = $_POST['puntuacion'];
        $director = $_POST['director'];
        $categoria = $_POST['categoria'];


        $this->model->insertEditPeli($pelicula, $estreno, $puntuacion, $director, $categoria, $id);
        header('Location: ' . BASE_URL. 'listaPelis');
     }
}
   
    function deletePeli($id) {
        $authHelper = new AuthHelper();
        $authHelper->checkLoggedIn();
        $this->model->deletePeliById($id);
        header('Location: ' . BASE_URL. 'listaPelis');
    }

    public function filterCategory($id){
        $name = $this->modelEstudio->getNameById($id);
        $filters = $this->model->getFilter($id);
        $estudios = $this->modelEstudio->getAllEstudios();
        $this->view->showFilter($filters, $name, $estudios);
    }

}


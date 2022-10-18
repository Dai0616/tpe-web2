<?php
require_once './app/models/estudio.model.php';
require_once './app/views/estudio.view.php';
require_once './app/helpers/auth.helper.php';

class EstudioController{
   private $model;
   private $view; 

   public function __construct() {
    $this->model = new EstudioModel();
    $this->view = new EstudioView();
    
    if (session_status() != PHP_SESSION_ACTIVE) {
        session_start();
    } 
    }

public function showEstudios() {
     $estudios = $this->model->getAllEstudios();
     $this->view->showEstudios($estudios);
    }

function addListaEstudio() {
        // TODO: validar entrada de datos
        $authHelper = new AuthHelper();
        $authHelper->checkLoggedIn();
        $nombre_estudio = $_POST['nombre_estudio'];
        $creacion = $_POST['creacion'];
        $historia = $_POST['historia'];
        //agrego la imagen
        if ($_FILES['input_name']['type'] =="image/jpg" ||
        $_FILES['input_name']['type'] =="image/jpeg"||
        $_FILES['input_name']['type'] =="image/png" ){
        $this->model->insertEstudio($nombre_estudio, $creacion, $historia, $_FILES['input_name']['tmp_name']);
        }
        else{
            $id = $this->model->insertEstudio($nombre_estudio, $creacion, $historia);
        }
        
        header("Location: " . BASE_URL. 'listaEstudios');
    
    }
    function  showEditEstudio($id){
        $authHelper = new AuthHelper();
        $authHelper->checkLoggedIn();
        $estudios = $this->model->getRegisterEstudioById2($id);
        $this->view->showEditEstudio($estudios);
        
    }
    function insertEditEstudio($id){
        // if((isset($_POST['nombre_estudio'])&&isset($_POST['creacion'])&&isset($_POST['historia']))&&!empty($_POST['nombre_estudio'])&&!empty($_POST['creacion'])&&!empty($_POST['historia'])){      
            $authHelper = new AuthHelper();
            $authHelper->checkLoggedIn();
            $nombre_estudio = $_POST['nombre_estudio'];
            $creacion = $_POST['creacion'];
            $historia = $_POST['historia'];
    
            $this->model->insertEditEstudio($nombre_estudio, $creacion, $historia, $id);
            header("Location: " . BASE_URL. 'listaEstudios');
        
    
}
    function deleteEstudio($id) {
        $authHelper = new AuthHelper();
        $authHelper->checkLoggedIn();
        $this->model->deleteEstudioById($id);
    }
}
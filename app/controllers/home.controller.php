<?php
require_once './app/models/home.model.php';
require_once './app/views/home.view.php';

class HomeController {
    private $model;
    private $view;

    public function __construct() {
        $this->model = new HomeModel();
        $this->emodel = new EstudioModel();
        $this->view = new HomeView();
    }

    public function showPelisHome() {
        $pelis = $this->model->getAllPelisHome();
        $estudios = $this->emodel->getAllEstudios();
        $this->view->showPelisHome($pelis, $estudios);
    }

}
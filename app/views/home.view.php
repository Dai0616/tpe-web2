<?php
require_once './libs/smarty/libs/Smarty.class.php';

class HomeView {

    private $smarty;

    public function __construct() {
        $this->smarty = new Smarty(); // inicializo Smarty
    }
    function showPelisHome($pelis, $estudios) {
        // asigno variables al tpl smarty
        $this->smarty->assign('estudios', $estudios); 
         $this->smarty->assign('pelis', $pelis);

 
         // mostrar el tpl
         $this->smarty->display('homeview.tpl');
     }

    }
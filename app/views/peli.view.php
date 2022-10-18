<?php
require_once './libs/smarty/libs/Smarty.class.php';

class PeliView {

    private $smarty;

    public function __construct() {
        $this->smarty = new Smarty(); // inicializo Smarty
    }
    function showPelis($pelis, $estudios) {
       // asigno variables al tpl smarty 
        $this->smarty->assign('estudios', $estudios);
        $this->smarty->assign('pelis', $pelis);

        // mostrar el tpl
        $this->smarty->display('peliview.tpl');
    }
    function showEditPelis($pelis, $estudios){
        $this->smarty->assign('estudios', $estudios); 
        $this->smarty->assign('pelis', $pelis);
        
        $this->smarty->display('showEditPelis.tpl');
    }
    function showFilter($filters, $name, $estudios){
        $this->smarty->assign('name', $name); 
        $this->smarty->assign('filters', $filters);
        $this->smarty->assign('estudios', $estudios);
        $this->smarty->display('filterView.tpl');
    }
   function showDetalle($detalle, $estudios){
    $this->smarty->assign('detalle', $detalle);
    $this->smarty->assign('estudios', $estudios);
    $this->smarty->display('showDetail.tpl');
   }
}

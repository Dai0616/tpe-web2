<?php
require_once './libs/smarty/libs/Smarty.class.php';

class EstudioView{
    private $smarty;

    public function __construct(){
        $this->smarty = new Smarty();
    }

function showEstudios($estudios) {
    
        // asigno variables al tpl smarty
         $this->smarty->assign('count', count($estudios)); 
         $this->smarty->assign('estudios', $estudios);
 
         // mostrar el tpl
         $this->smarty->display('estudioview.tpl');
     }

     function showEditEstudio($estudios){
        $this->smarty->assign('estudios', $estudios); 
        $this->smarty->display('showEditEstudio.tpl');
    }
} 

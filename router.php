<?php
require_once './app/controllers/peli.controller.php';
require_once './app/controllers/estudio.controller.php';
require_once './app/controllers/auth.controller.php';

define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');

$action ='listaPelis'; // acción por defecto
if (!empty($_GET['action'])) {
    $action = $_GET['action'];
}

// parsea la accion Ej: dev/juan --> ['dev', juan]
$params = explode('/', $action);


// tabla de ruteo
switch ($params[0]) {
     case 'login':
         $authcontroller = new AuthController();
         $authcontroller-> showFormLogin();
         break;
     case 'validate':
         $authController = new AuthController();
         $authController->validateUser();
         break;
     case 'logout':
         $authController = new AuthController();
         $authController->logout();
         break;
     case 'filter':
         $id = $params[1];
         $pcontroller = new PeliController();
          $pcontroller->filterCategory($id);
         break;
    case 'listaPelis':
        $pcontroller = new PeliController();
        $pcontroller->showPelis();
        break;
    case 'listaEstudios':
        $econtroller = new EstudioController();
        $econtroller->showEstudios();
        break;
    case 'detalle':
        $id = $params[1];
        $pcontroller  = new PeliController();
        $pcontroller ->showDetalle($id);  
        break;
    case 'addPeli':
        $pcontroller = new PeliController();
        $pcontroller->addPeli();
        break;
    case 'addListaEstudio':
        $econtroller = new EstudioController();
        $econtroller->addListaEstudio();
        break;
    case 'showEditPeli':
        $id = $params[1];
        $pcontroller  = new PeliController();
        $pcontroller ->showEditPeli($id);  
        break;
    case 'editPeli':
        $id = $params[1];
        $pcontroller  = new PeliController();
        $pcontroller ->insertEditPeli($id);  
        break;
    case 'showEditEstudio':
            $id = $params[1];
            $econtroller = new EstudioController();
            $econtroller->showEditEstudio($id);  
             break;
     case 'editEstudio':
            $id = $params[1];
            $econtroller = new EstudioController();
            $econtroller ->insertEditEstudio($id);  
             break;
    case 'deletePeli':
        // obtengo el parametro de la acción
        $id = $params[1];
        $pcontroller = new PeliController();
        $pcontroller->deletePeli($id);
        break;
     case 'deleteEstudio':
         // obtengo el parametro de la acción
         $id = $params[1];
         $econtroller = new EstudioController();
         $econtroller->deleteEstudio($id);
         break;
    default:
        echo('404 Page not found');
        break;
}


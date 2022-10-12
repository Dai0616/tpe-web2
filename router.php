<?php
require_once './app/controllers/home.controller.php';
require_once './app/controllers/peli.controller.php';
require_once './app/controllers/estudio.controller.php';
require_once './app/controllers/auth.controller.php';

define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');

$action ='home'; // acción por defecto
if (!empty($_GET['action'])) {
    $action = $_GET['action'];
}

// parsea la accion Ej: dev/juan --> ['dev', juan]
$params = explode('/', $action);


// tabla de ruteo
switch ($params[0]) {
     case 'home':
         $hcontroller = new HomeController();
         $hcontroller->showPelisHome();
         break;
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
    case 'listaPelis':
        $pcontroller = new PeliController();
        $pcontroller->showPelis();
        break;
    case 'listaEstudios':
        $econtroller = new EstudioController();
        $econtroller->showEstudios();
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
        $pController  = new PeliController();
        $pController ->showEditPeli($id);  
        break;
    case 'editPeli':
        $id = $params[1];
        $pController  = new PeliController();
        $pController ->insertEditPeli($id);  
        break;
    case 'showEditEstudio':
            $id = $params[1];
            $eController = new EstudioController();
            $eController->showEditEstudio($id);  
             break;
     case 'editEstudio':
            $id = $params[1];
            $eController = new EstudioController();
            $eController ->insertEditEstudio($id);  
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


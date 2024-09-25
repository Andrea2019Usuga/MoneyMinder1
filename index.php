<?php
require 'app/Core/DB.php';
require 'app/Controllers/UserController.php';
require 'app/Controllers/IngresoController.php';
require 'app/Controllers/GastosController.php';
require 'app/Controllers/MetasDeAhorroController.php';
require 'app/Controllers/TipsDeAhorroController.php';
require 'app/Controllers/ConfiguracionController.php';

define('VIEWS_PATH', __DIR__ . '/app/Views');
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

switch ($uri) {
    case '/':
        $controller = new UserController();
        $controller->index();
        break;

    case '/MoneyMinder/index.php/login':
        $controller = new UserController();
        $controller->login();
        break;

    case '/MoneyMinder/index.php/inicio':
        $controller = new UserController();
        $controller->createUser();
        break;

    case '/MoneyMinder/index.php/crearCuenta':
        $controller = new UserController();
        $controller->crearCuenta();
        break;

    case '/MoneyMinder/index.php/inicioSesion':
        $controller = new UserController();
        $controller->mostrarInicioSesion(); // Función que muestra la interfaz de inicio de sesión
        break;

    case '/MoneyMinder/index.php/menuPrincipalIngresos':
        $controller = new UserController();
        $controller->mostrarMenuPrincipalIngresos(); // Nueva función en el controlador
        break;

     case '/MoneyMinder/index.php/requestReset':
        $controller = new UserController();
        $controller->requestReset();
        break;

     case '/MoneyMinder/index.php/agregarIngreso':
        $controller = new UserController();
        $controller->mostrarAgregarIngreso(); // Función que muestra la interfaz para agregar ingresos
        break;
      
     case '/MoneyMinder/index.php/gastos':
        $controller = new GastosController();
        $controller->showGastos();  // Se carga la función para mostrar gastos
        break;   
     
     case '/MoneyMinder/index.php/metasDeAhorro': 
        $controller = new MetasDeAhorroController();
        $controller->showMetasAhorro();  // Método para mostrar la página de metas de ahorro
        break;

     case '/MoneyMinder/index.php/tipsDeAhorro':
        $controller = new TipsDeAhorroController();
        $controller->showTipsAhorro();  // Método para mostrar la pagina de tips de ahorro
        break;   

     case '/MoneyMinder/index.php/configuracionCambiarContrasena':
        $controller = new ConfiguracionController();
        $controller->showConfiguracion();  // Método para motrar la pagina de configuracion cambiar contraseña
        break;

     case '/MoneyMinder/index.php/configuracionCambiarContrasena':
        $controller = new ConfiguracionController();
        $controller->showCambiarContrasena(); // Método que mostrará la página de cambiar contraseña
        break;

     

     case '/MoneyMinder/index.php/eliminarCuenta':
        $controller = new ConfiguracionController();
        $controller->showEliminarCuenta();  // Método para mostrar la vista de eliminar cuenta
        break;
           
     case '/MoneyMinder/index.php/soporteyAyuda':
        $controller = new ConfiguracionController();
        $controller->showSoporteAyuda();  // Método para mostrar la vista de Soporte y Ayuda
        break;      
        
     case '/MoneyMinder/index.php/editarPerfil':
        $controller = new UserController();
        $controller->editarPerfil();  // Metodo para mostrar la pagina de editar peril 
        break;

     case '/MoneyMinder/index.php/cerrarSesion':
        $controller = new UserController();
        $controller->logout();  // Función para cerrar sesión
        break;
    

    default:
        $controller = new UserController();
        $controller->index();
        break;
}



if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'];

    switch ($action) {
        case 'login':
            header("Location: /MoneyMinder/index.php/inicioSesion");
            exit();

        case 'register':
            header("Location: /MoneyMinder/index.php/crearCuenta");
            exit();

        default:
            header("Location: /MoneyMinder/index.php");
            exit();
    }
}
?>

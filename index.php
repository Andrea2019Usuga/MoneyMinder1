<?php
require 'app/Core/DB.php';
require 'app/Controllers/UserController.php';

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

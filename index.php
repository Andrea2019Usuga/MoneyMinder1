<?php
require 'app/Core/DB.php';
require 'app/Controllers/UserController.php';

define('VIEWS_PATH', __DIR__ . '/app/Views');

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

$controller = new UserController();

switch ($uri) {
    case '/':
        $controller->index();
        break;
    case '/MoneyMinder/index.php/prueba':
        $controller->prueba();
        break;
    case '/MoneyMinder/index.php/inicioSesion':
        $controller->mostrarInicioSesion();
        break;

    case '/MoneyMinder/index.php/crearCuenta':
        $controller->crearCuenta();
        break;

    case '/MoneyMinder/index.php/menuPrincipalIngresos':
        $controller->mostrarMenuPrincipalIngresos();
        break;

    case '/MoneyMinder/index.php/agregarIngreso':
        $controller->agregarIngreso();
        break;

    case '/MoneyMinder/index.php/guardarIngreso':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $controller->guardarIngreso();
        } else {
            // Manejar solicitud GET si es necesario
            echo "Método no permitido.";
        }
        break;

    default:
        $controller->index();
        break;
}

// Manejar solicitudes POST de formularios
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'] ?? '';

    switch ($action) {
        case 'login':
            header("Location: /MoneyMinder/index.php/inicioSesion");
            exit();

        case 'register':
            header("Location: /MoneyMinder/index.php/crearCuenta");
            exit();

        case 'setIngreso':
                // Llama al método setIngreso del controlador para manejar la inserción
                $controller->setIngreso();
                break;
                
        default:
            header("Location: /MoneyMinder/index.php");
            exit();
    }
}
?>

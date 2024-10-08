<?php
require 'app/Core/DB.php';
require 'app/Controllers/UserController.php';

define('VIEWS_PATH', __DIR__ . '/app/Views');


$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

$controller = new UserController();

// Manejar solicitudes GET (rutas visibles en el navegador)
switch ($uri) {
    case '/':
        $controller->index();
        break;
    case '/MoneyMinder/index.php/login':
        $controller->inicioSesion();
        break;
    case '/MoneyMinder/index.php/inicioSesion':
        $controller->mostrarInicioSesion();
        break;
    case '/MoneyMinder/index.php/crearCuenta':
        $controller->crearCuenta();
        break;
    case '/MoneyMinder/index.php/crearUsuario':
        $controller->createUser();
        break;
    case '/MoneyMinder/index.php/recuperarClave':
        $controller->recuperarClave();
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
            echo "Método no permitido.";
        }
        break;
        case '/MoneyMinder/index.php/eliminarIngreso':
            $controller->eliminarIngreso();
            break;

        case '/MoneyMinder/index.php/editarIngreso':
                if (isset($_GET['id'])) {
            $controller->editarIngreso($_GET['id']); // Pasar el ID al controlador
            } else {
                echo "ID no especificado.";
            }
            break;
            
        case '/MoneyMinder/index.php/actualizarIngreso':
            $controller->actualizarIngreso();
            break;
     
    case '/MoneyMinder/index.php/gastos':
        $controller->mostrarGastos();
        break;       

    case '/MoneyMinder/index.php/agregarGasto':
        $controller->agregarGasto();
        break; 
    
    case '/MoneyMinder/index.php/guardarGasto':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $controller->guardarGasto();
            } else {
                echo "Método no permitido.";
            }
            break;
        case '/MoneyMinder/index.php/eliminarGasto':
                $controller->eliminarGasto();
                break;
    
        case '/MoneyMinder/index.php/editarGasto':
                    if (isset($_GET['id'])) {
                $controller->editarGasto($_GET['id']); // Pasar el ID al controlador
                } else {
                    echo "ID no especificado.";
                }
                break;
                
        case '/MoneyMinder/index.php/actualizarGasto':
                $controller->actualizarGasto();
                break;    

    case '/MoneyMinder/index.php/tipsAhorro':
            $controller->mostrartipsAhorro(); 
            break;      


    case '/MoneyMinder/index.php/editarPerfil':
        $controller->editarPerfil();
        break;
    case '/MoneyMinder/index.php/cerrarSesion':  
        $controller->cerrarSesion(); 
        break;
    case '/MoneyMinder/index.php/metasDeAhorro':
        $controller->metasDeAhorro();
        break; 
    case '/MoneyMinder/index.php/agregarMetaAhorro':
        $controller->agregarMetaAhorro();
        break;
    case '/MoneyMinder/index.php/eliminarMetaAhorro':
        $controller->eliminarMetaAhorro();
        break;
    case '/MoneyMinder/index.php/editarMetaAhorro':
        if (isset($_GET['id'])) {
            $controller->editarMetaAhorro($_GET['id']); // Pasar el ID al controlador
        } else {
            echo "ID no especificado.";
        }
        break;

    case '/MoneyMinder/index.php/actualizarMetaAhorro':
        $controller->actualizarMetaAhorro();
        break;
    
    case '/MoneyMinder/index.php/guardarMetaAhorro':
        $controller->guardarMetaAhorro();
        break;

        case '/MoneyMinder/index.php/cambiarContrasena':
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                // Si es una solicitud POST, intentar cambiar la contraseña
                $controller->cambiarContrasena(); // Cambiado a $controller
            } else {
                // Redirigir a la vista de configuración para cambiar la contraseña
                $controller->mostrarConfiguracionCambiarContrasena(); // Cambiado a $controller
            }
            break;
        case '/MoneyMinder/index.php/configuracionCambiarContrasena':
            // Mostrar la vista para cambiar la contraseña
            $controller->mostrarConfiguracionCambiarContrasena(); // Cambiado a $controller
            break;

        case '/MoneyMinder/index.php/eliminarCuenta':
            $controller->mostrarEliminarCuenta();
            break;
        
        case '/MoneyMinder/index.php/eliminarCuentaConfirm':
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $controller->eliminarCuenta(); // Llama al método que maneja la eliminación
            } else {
                echo "Método no permitido.";
            }
            break;

    case '/MoneyMinder/index.php/preguntasFrecuentes':   
            $controller->mostrarpreguntasFrecuentes();  
            break; 
            
    default:
        $controller->index();  // Mantén solo un default
        break;
}


// Manejar solicitudes POST de formularios
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'] ?? '';
    $action = $_POST['action'] ?? '';

    switch ($action) {
        case 'login':
            echo "entr al login";
            $controller->inicioSesion();
            break;
        case 'register':
            header("Location: /MoneyMinder/index.php/crearCuenta");
            exit();
        default:
            echo "entro al default";
            echo ($action);
            exit();
    }
}
?>

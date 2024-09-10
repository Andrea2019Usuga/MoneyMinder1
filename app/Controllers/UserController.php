<?php
require_once 'C:/xampp/htdocs/MoneyMinder/app/Models/UsersModel.php';
require_once 'C:/xampp/htdocs/MoneyMinder/app/Core/DB.php'; // Usa require_once para evitar múltiples inclusiones

class UserController
{
    private $model;

    // Constructor para inicializar el modelo con la conexión a la base de datos
    public function __construct() {
        session_start(); // Iniciar la sesión
        $dbConnection = DB::getInstance(); // Obtén la conexión a la base de datos
        $this->model = new UsersModel($dbConnection); // Pasa la conexión al modelo de usuarios
        $this->verificarSesion(); // Verificar la sesión
    }

    // Función para redireccionar a la pantalla principal
    public function index() {
        require VIEWS_PATH . '/paginaPrincipal.php';
        exit();
    }

    // Función para mostrar la página principal
    public function showHomePage() {
        require VIEWS_PATH . '/paginaPrincipal.php'; 
    }

    // Redireccionar al inicio de sesión
    public function redirectToLogin() {
        header("Location: /MoneyMinder/index.php/inicioSesion");
        exit();
    }

    // Redireccionar al registro
    public function redirectToRegister() {
        header("Location: /MoneyMinder/index.php/crearCuenta");
        exit();
    }

    // Función para manejar el inicio de sesión
    public function inicioSesion() {
        $this->login();
    }

    public function login() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $correo = $_POST['email'];
            $password = $_POST['password'];
            $recordar = isset($_POST['recordar']);

            // Verificar si el usuario existe en la base de datos
            $usuario = $this->model->getById($correo, $password);

            if ($usuario) {
                // Inicio de sesión exitoso
                $_SESSION['usuario_id'] = $usuario['id'];

                if ($recordar) {
                    // Crear un token único
                    $token = bin2hex(random_bytes(16));
                    // Guardar el token en la base de datos
                    $this->model->guardarToken($usuario['id'], $token);
                    // Establecer cookie con el token
                    setcookie('remember_token', $token, time() + (86400 * 30), "/", "", true, true);
                }

                // Redirigir al panel de control
                header("Location: /MoneyMinder/index.php/menuPrincipalIngresos");
                exit();
            } else {
                // Usuario o contraseña incorrectos
                echo '<script type="text/javascript">
                    alert("USUARIO O CONTRASEÑA INCORRECTOS");
                    window.location.href="/MoneyMinder/index.php/inicioSesion";
                    </script>';
                exit();
            }
        }
    }

    // Función para verificar si hay una sesión activa o una cookie válida
    public function verificarSesion() {
        if (isset($_SESSION['usuario_id'])) {
            return true;
        } elseif (isset($_COOKIE['remember_token'])) {
            $usuario = $this->model->obtenerPorToken($_COOKIE['remember_token']);
            if ($usuario) {
                $_SESSION['usuario_id'] = $usuario['id'];
                return true;
            }
        }
        return false;
    }

    // Función para cerrar sesión
    public function logout() {
        session_destroy();
        if (isset($_COOKIE['remember_token'])) {
            setcookie('remember_token', '', time() - 3600, '/');
        }
        header('Location: /MoneyMinder/index.php/inicioSesion');
        exit();
    }

    // Función para cargar la vista de crear cuenta
    public function crearCuenta() {
        require VIEWS_PATH . '/crearCuenta.php';
    }

    // Función para crear un nuevo usuario
    public function createUser() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Recibir los datos del formulario
            $nombre = $_POST["nombre"];
            $apellido = $_POST["apellido"];
            $fechanacimiento = $_POST["fecha-nacimiento"];
            $correo = $_POST["correo"];
            $clave = $_POST["contrasena"];

            // Llamar al modelo para crear el usuario
            $resultado = $this->model->createUser($nombre, $apellido, $fechanacimiento, $correo, $clave);

            // Verificar si el usuario fue creado exitosamente
            if ($resultado) {
                // Redirigir al menú principal de ingresos si la creación fue exitosa
                header("Location: /MoneyMinder/index.php/menuPrincipalIngresos");
                exit();
            } else {
                // Mostrar un mensaje de error si la creación falló
                echo '<script type="text/javascript">
                    alert("Error al crear la cuenta. Inténtalo de nuevo.");
                    window.location.href="/MoneyMinder/index.php/crearCuenta";
                    </script>';
                exit();
            }
        }
    }

    // Funciones para mostrar las vistas
    public function mostrarInicioSesion() {
        require VIEWS_PATH . '/inicioSesion.php';
    }

    public function mostrarMenuPrincipalIngresos() {
        require VIEWS_PATH . '/menuPrincipalIngresos.php';
    }

    public function mostrarAgregarIngreso() {
        require_once VIEWS_PATH . '/agregarIngreso.php'; 
    }
    

}
?>

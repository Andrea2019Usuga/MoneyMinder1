<?php
require_once 'C:/xampp/htdocs/MoneyMinder/app/Models/UsersModel.php';
require_once 'C:/xampp/htdocs/MoneyMinder/app/Models/IngresoModel.php';
require_once 'C:/xampp/htdocs/MoneyMinder/app/Core/DB.php';

class UserController
{
    private $model;

    // Constructor para inicializar el modelo con la conexión a la base de datos
    public function __construct() {
        session_start();
        $dbConnection = DB::getInstance();
        $this->model = new UsersModel($dbConnection);
        $this->verificarSesion(); // Verificar sesión en el constructor
    }

    // Redirigir a la pantalla principal
    public function index() {
        require VIEWS_PATH . '/paginaPrincipal.php';
        exit();
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

    // Manejar el inicio de sesión
    public function inicioSesion() {
        echo "llego a inicio de sesion";
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $correo = $_POST['email'];
            $password = $_POST['password'];
            $recordar = isset($_POST['recordar']);

            // Verificar si el usuario existe en la base de datos
            $usuario = $this->model->getById($correo, $password);
            print_r($usuario);
            if (empty($usuario)) {
                echo '<script type="text/javascript">
                        alert("USUARIO O CONTRASEÑA INCORRECTOS");
                        window.location.href="/MoneyMinder/index.php/inicioSesion";
                      </script>';
                exit();
            } else {
                //almacenamos en una variable de sesion el nombre y el id del usuario
                $_SESSION['usuario_id'] = $usuario['id'];
                $_SESSION['nombre_usuario'] = $usuario['nombre'];
                header("Location: /MoneyMinder/index.php/menuPrincipalIngresos");
                exit();
            }
        }
    }

    public function verificarSesion() {
        // Verificar si existe una sesión de usuario
        if (isset($_SESSION['usuario_id'])) {
            return true;
        } 
        // Verificar si existe una cookie remember_token
        elseif (isset($_COOKIE['remember_token'])) {
            $usuario = $this->model->obtenerPorToken($_COOKIE['remember_token']);
            if ($usuario) {
                $_SESSION['usuario_id'] = $usuario['id'];
                return true;
            }
        }
        // Si no hay sesión ni cookie válida, retornar false
        return false;
    }

    // Cargar la vista de git add . ingreso
    public function agregarIngreso() {
        require VIEWS_PATH . '/agregarIngreso.php';
    }

    // Guardar el ingreso en la base de datos
    public function guardarIngreso() {
        if ($this->verificarSesion()) {
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $nombre = $_POST['nombre-ingreso'];
                $monto = $_POST['monto'];
                $dia = $_POST['dia'];
                $mes = $_POST['mes'];
                $anio = $_POST['año'];
                $fecha = "$anio-$mes-$dia";

                // Validar campos vacíos
                if (empty($nombre) || empty($monto) || empty($dia) || empty($mes) || empty($anio)) {
                    echo "Todos los campos son obligatorios.";
                    return;
                }

                // Validar que el monto sea numérico
                if (!is_numeric($monto)) {
                    echo "El monto debe ser un número válido.";
                    return;
                }

                // Obtener el ID del usuario autenticado desde la sesión
                $usuario_id = $_SESSION['usuario_id'];

                // Instanciar el modelo y guardar el ingreso usando la conexión existente
                $ingresoModel = new IngresoModel($this->model->getDB());

                if ($ingresoModel->guardarIngreso($usuario_id, $nombre, $monto, $fecha)) {
                    header('Location: /MoneyMinder/index.php/menuPrincipalIngresos');
                    exit();
                } else {
                    echo "Error al guardar el ingreso.";
                }
            }
        } else {
            $this->redirectToLogin();
        }
    }

    // Función para obtener los ingresos
    public function getAllIngresos() {
        $query = $this->model->getDB()->prepare("SELECT * FROM ingresos");
        $query->execute();
        return $query->get_result()->fetch_all(MYSQLI_ASSOC);
    }

    public function eliminarIngreso() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['id'];
            $ingresoModel = new IngresoModel($this->model->getDB());
            if ($ingresoModel->eliminarIngreso($id)) {
                header('Location: /MoneyMinder/index.php/menuPrincipalIngresos');
                exit();
            } else {
                echo "Error al eliminar el ingreso.";
            }
        }
    }
    
    


    // Editar ingreso
    public function editarIngreso($id) {
        // Obtener el ingreso por ID utilizando el modelo
        $ingresoModel = new IngresoModel($this->model->getDB()); // Usa la conexión a la base de datos
        $ingreso = $ingresoModel->getIngresoById($id);
        
        // Verificar si se encontró el ingreso
        if ($ingreso) {
            // Cargar la vista de edición con los datos del ingreso
            require VIEWS_PATH . '/editarIngreso.php';
        } else {
            // Mostrar un mensaje si no se encuentra el ingreso
            echo "Ingreso no encontrado.";
        }
    }

    public function actualizarIngreso() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['id'];
            $nombre = $_POST['nombre'];
            $monto = $_POST['monto'];
            $fecha = $_POST['fecha'];
    
            // Validar campos vacíos
            if (empty($nombre) || empty($monto) || empty($fecha)) {
                echo "Todos los campos son obligatorios.";
                return;
            }
    
            $ingresoModel = new IngresoModel($this->model->getDB());
            if ($ingresoModel->updateIngreso($id, $nombre, $monto, $fecha)) {
                header("Location: /MoneyMinder/index.php/menuPrincipalIngresos");
                exit();
            } else {
                echo "Error al actualizar el ingreso.";
            }
        } else {
            echo "Método no permitido.";
        }
    }
    

    // Cargar la vista de crear cuenta
    public function crearCuenta() {
        require VIEWS_PATH . '/crearCuenta.php';
    }

    public function recuperarClave() {
        require VIEWS_PATH . '/restablecerContrasena.php';
    }

    // Crear un nuevo usuario
    public function createUser() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nombre = $_POST["nombre"];
            $apellido = $_POST["apellido"];
            $fechanacimiento = $_POST["fecha-nacimiento"];
            $correo = $_POST["correo"];
            $clave = $_POST["contrasena"];

            $resultado = $this->model->createUser($nombre, $apellido, $fechanacimiento, $correo, $clave);

            if ($resultado) {
                echo '<script type="text/javascript">
                        alert("USUARIO CREADO CORRECTAMENTE EN EL SISTEMA");
                        window.location.href="/MoneyMinder/index.php/crearCuenta";
                      </script>';
                header("Location: /MoneyMinder/index.php/inicioSesion");
                exit();
            } else {
                echo '<script type="text/javascript">
                        alert("Error al crear la cuenta. Inténtalo de nuevo.");
                        window.location.href="/MoneyMinder/index.php/crearCuenta";
                      </script>';
                exit();
            }
        }
    }

    public function prueba() {
        echo "esto es una prueba";
    }

    // Mostrar la vista de inicio de sesión
    public function mostrarInicioSesion() {
        require VIEWS_PATH . '/inicioSesion.php';
    }

    // Mostrar menú principal de ingresos
    public function mostrarMenuPrincipalIngresos() {
        $ingresoModel = new IngresoModel($this->model->getDB()); // Obtener la conexión a la base de datos
        $ingresos = $ingresoModel->getIngresosByUserId($_SESSION['usuario_id']); // Obtener ingresos por el usuario actual

        require VIEWS_PATH . '/menuPrincipalIngresos.php'; // Cargar la vista y pasarle los ingresos
    }

    // Editar perfil
    public function editarPerfil() {
        require VIEWS_PATH . '/editarPerfil.php'; // Ajusta la ruta según tu estructura
    }

    public function actualizarPerfil() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nombre = $_POST['nombre'];
            $apellido = $_POST['apellido'];
            $correo = $_POST['correo'];
            $fechaNacimiento = $_POST['fecha-nacimiento'];
    
            // Validar que los campos no estén vacíos
            if (empty($nombre) || empty($apellido) || empty($correo) || empty($fechaNacimiento)) {
                echo "Todos los campos son obligatorios.";
                return;
            }
    
            // Actualizar el perfil en la base de datos
            $usuario_id = $_SESSION['usuario_id'];
            $this->model->actualizarPerfil($usuario_id, $nombre, $apellido, $correo, $fechaNacimiento);
    
            // Redirigir a una página de éxito
            header('Location: /MoneyMinder/index.php/menuPrincipalIngresos');
            exit();
        }
    }
    
}
?>

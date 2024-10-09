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
        $this->ingresoModel = new IngresoModel($dbConnection);  // Aquí instancias IngresoModel
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
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $correo = $_POST['email'];
            $password = $_POST['password'];
            $recordar = isset($_POST['recordar']);

            // Verificar si el usuario existe en la base de datos
            $usuario = $this->model->getById($correo, $password);
            if (empty($usuario)) {
                echo '<script type="text/javascript">
                        alert("USUARIO O CONTRASEÑA INCORRECTOS");
                        window.location.href="/MoneyMinder/index.php/inicioSesion";
                      </script>';
                exit();
            } else {
                // Almacenamos en una variable de sesión el nombre y el id del usuario
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

    public function mostrarInicioSesion() {
        // Lógica para mostrar el formulario de inicio de sesión
        include 'app/Views/inicioSesion.php'; // Suponiendo que tienes una vista de inicio de sesión
    }

    // Método para enviar correo para recordar contraseña
    public function recordarClave() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $correo = $_POST["email"];
            $resultado = $this->model->sendPassword($correo);

            if ($resultado) {
                $para      = "$correo";
                $titulo    = "SU CONTRASEÑA PARA ACCEDER AL SISTEMA ES";
                $mensaje   = "Estimado usuario, su contrasena para acceder al sistema es ".$resultado['contrasena'];
                $cabeceras = "From: appmoneyminder@gmail.com";

                if (mail($para, $titulo, $mensaje, $cabeceras)) {
                    header("Location: /MoneyMinder/index.php/inicioSesion");
                    exit();
                } else {
                    echo "fallo el envio de correo";
                }
            } else {
                echo '<script type="text/javascript">
                        alert("El correo ingresado no existe en la base de datos");
                        window.location.href="/MoneyMinder/index.php/crearCuenta";
                      </script>';
                exit();
            }
        }
    }

    // Método en el controlador que muestra el menú principal
    public function menuPrincipalIngresos() {
        if ($this->verificarSesion()) {
            $ingresos = $this->ingresoModel->obtenerTodosLosIngresos();  // Obtener los ingresos
            require_once VIEWS_PATH . '/menuPrincipalIngresos.php';  // Cargar la vista
        } else {
            $this->redirectToLogin();
        }
    }

    public function mostrarMenuPrincipalIngresos() {
        if (isset($_SESSION['usuario_id'])) {
            $usuario_id = $_SESSION['usuario_id'];
            $ingresos = $this->ingresoModel->getIngresosByUserId($usuario_id);
            require_once VIEWS_PATH . '/menuPrincipalIngresos.php';  // Asegúrate de incluir la vista aquí
        } else {
            header("Location: /MoneyMinder/index.php");  // Redirigir si no hay sesión
            exit();
        }
    }

    // Cargar la vista de agregar ingreso
    public function agregarIngreso() {
        require VIEWS_PATH . '/agregarIngreso.php';
    }

    public function obtenerIngresos($usuario_id) {
        return $this->ingresoModel->getIngresosByUserId($usuario_id);
    }
   
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
    
                $usuario_id = $_SESSION['usuario_id'];  // Obtener ID del usuario desde la sesión
    
                // Guardar ingreso en la base de datos
                if ($this->ingresoModel->guardarIngreso($usuario_id, $nombre, $monto, $fecha)) {
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

    // Eliminar ingreso
    public function eliminarIngreso($id) {
        $stmt = $this->db->prepare("DELETE FROM ingresos WHERE id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        if ($stmt->execute()) {
            return $stmt->rowCount() > 0;  // Retorna verdadero si se eliminó al menos una fila
        }
        return false;  // Retorna falso en caso de error
    }

    // Editar ingreso
    public function editarIngreso($id) {
        $ingresoModel = new IngresoModel($this->model->getDB());
        $ingreso = $ingresoModel->getIngresoById($id);  // Obtener el ingreso por ID

        // Si el ingreso existe, cargar la vista de edición
        if ($ingreso) {
            require VIEWS_PATH . '/editarIngreso.php';
        } else {
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

    // Editar perfil
    public function editarPerfil() {
        if (isset($_SESSION['usuario_id'])) {
            $userId = $_SESSION['usuario_id'];
            $usuario = $this->model->getUserById($userId); 
            require VIEWS_PATH . '/editarPerfil.php'; // Cargar la vista
        } else {
            header('Location: /MoneyMinder/index.php');
            exit();
        }
    }

    public function guardarCambiosPerfil() {
        // Validar los datos del formulario
        $nombre = $_POST['nombre'];
        $email = $_POST['email'];
        // Otros campos...
    
        // Guardar los cambios en la base de datos (puedes usar un modelo para esto)
        $userModel = new UserModel();
        $userModel->actualizarPerfil($nombre, $email);
    
        // Redirigir al inicio de sesión después de guardar los cambios
        header("Location: /MoneyMinder/index.php/inicioSesion");
        exit();
    }
    
    public function actualizarPerfil() {
        if (isset($_SESSION['usuario_id'])) {
            $userId = $_SESSION['usuario_id']; // El id del usuario
            $nombre = $_POST['nombre']; // Recoge el nombre
            $apellido = $_POST['apellido']; // Recoge el apellido
            $correo_electronico = $_POST['correo_electronico']; // Recoge el correo
            $fecha_nacimiento = $_POST['fecha-nacimiento']; // Recoge la fecha de nacimiento
            
            // Llamar a la función updateUser con los 5 parámetros
            if ($this->model->updateUser($userId, $nombre, $apellido, $correo_electronico, $fecha_nacimiento)) {
                $_SESSION['nombre_usuario'] = $nombre; // Actualizar el nombre en la sesión
                header("Location: /MoneyMinder/index.php/inicioSesion");
                exit();
            } else {
                echo "Error al actualizar el perfil.";
            }
        }
    }

    // Cerrar sesión
    public function cerrarSesion() {
        session_destroy(); // Destruir la sesión
        setcookie('remember_token', '', time() - 3600); // Eliminar la cookie
        header("Location: /MoneyMinder/index.php/inicioSesion");
        exit();
    }

    // Acción para cambiar contraseña
    public function cambiarContrasena() {
        // Lógica para mostrar la vista de cambiar contraseña
        include 'views/cambiarContrasena.php';
    }

    // Acción para eliminar cuenta
    public function eliminarCuenta() {
        // Lógica para mostrar la vista de eliminar cuenta
        include 'views/eliminarCuenta.php';
    }

    // Acción para mostrar la ayuda
    public function soporteYayuda() {
        // Lógica para mostrar la vista de soporte
        include 'views/soporteYayuda.php';
    }
}
?>

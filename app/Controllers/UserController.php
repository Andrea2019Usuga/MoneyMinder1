<?php
require_once 'C:/xampp/htdocs/MoneyMinder/app/Models/UsersModel.php';
require_once 'C:/xampp/htdocs/MoneyMinder/app/Core/DB.php'; // Usa require_once para evitar múltiples inclusiones

class UserController
{
    private $model;

    // Constructor para inicializar el modelo con la conexión a la base de datos
    public function __construct() {
        $dbConnection = DB::getInstance(); // Obtén la conexión a la base de datos
        $this->model = new UsersModel($dbConnection); // Pasa la conexión al constructor de UsersModel
    }

    // Función para redireccionar a la pantalla de inicio de sesión
    public function index()
    {
        require VIEWS_PATH . '/paginaPrincipal.php';
        exit(); // Detiene la ejecución del script
    }

    // Función pública para mostrar la página principal
    public function showHomePage() {
        include VIEWS_PATH . '/paginaPrincipal.php'; // Asegúrate de usar la ruta correcta
    }

    // Función para redirigir a la página de inicio de sesión
    public function redirectToLogin() {
        header("Location: /MoneyMinder/index.php/inicioSesion"); // Usa una ruta relativa al directorio raíz del servidor
        exit();
    }

    // Función para redirigir a la página de creación de cuenta
    public function redirectToRegister() {
        header("Location: /MoneyMinder/index.php/crearCuenta"); // Usa una ruta relativa al directorio raíz del servidor
        exit();
    }

    // Función para manejar el inicio de sesión
    public function inicioSesion()
    {
        $this->login();
    }

    public function login() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $correo = $_POST['email'];
            $password = $_POST['password'];
            $recordar = isset($_POST['recordar']);
    
            // Verificamos si el usuario existe en la base de datos
            $usuario = $this->model->getById($correo, $password);
    
            if ($usuario && password_verify($password, $usuario['contraseña'])) {
                // Inicio de sesión exitoso
                $_SESSION['usuario_id'] = $usuario['id'];
    
                if ($recordar) {
                    // Crear un token único
                    $token = bin2hex(random_bytes(16));
    
                    // Guardar el token en la base de datos
                    $this->model->guardarToken($usuario['id'], $token);
    
                    // Establecer cookie con el token
                    setcookie('remember_token', $token, time() + (86400 * 30), "/"); // Expira en 30 días
                }
    
                // Redirigir al usuario al panel de control
                header("Location: /MoneyMinder/index.php/menuPrincipalIngresos");
                exit();
            } else {
                // Redirigir a la página de inicio de sesión con un mensaje de error
                echo '<script type="text/javascript">
                alert("USUARIO O CONTRASEÑA INCORRECTOS");
                window.location.href="/MoneyMinder/index.php/inicioSesion";
                </script>';
                exit();
            }
        }
    }
    
    public function verificarSesion() {
        if (isset($_SESSION['usuario_id'])) {
            // El usuario ya está autenticado
            return true;
        } elseif (isset($_COOKIE['remember_token'])) {
            // Verificar el token de la cookie
            $usuario = $this->usuarioModel->obtenerPorToken($_COOKIE['remember_token']);
            if ($usuario) {
                // Iniciar sesión automáticamente
                $_SESSION['usuario_id'] = $usuario['id'];
                return true;
            }
        }
        // Redirigir al inicio de sesión si no está autenticado
        header('Location: /MoneyMinder/index.php/inicioSesion');
        exit();
    }
    
    public function logout() {
        // Destruir la sesión
        session_destroy();
    
        // Eliminar la cookie
        if (isset($_COOKIE['remember_token'])) {
            setcookie('remember_token', '', time() - 3600, '/');
        }
    
        // Redirigir al usuario al inicio de sesión
        header('Location: /MoneyMinder/index.php/inicioSesion');
        exit();
    }
    

    // Función para crear una nueva cuenta
    public function crearCuenta()
    {
        require VIEWS_PATH . '/crearCuenta.php';
    }

    // Función para manejar la creación de un nuevo usuario en el sistema
    public function createUser()
    {
        // Recibir los datos del formulario
        $nombre = $_POST["nombre"];
        $apellido = $_POST["apellido"];
        $fechanacimiento = $_POST["fecha-nacimiento"];
        $correo = $_POST["correo"];
        $clave = $_POST["contrasena"];

        // Lógica para guardar los datos en la base de datos
        $resultado = $this->model->createUser($nombre, $apellido, $fechanacimiento, $correo, $clave);
        
        // Verificar si el usuario fue creado exitosamente
        if ($resultado) {
            header("Location: /MoneyMinder/index.php/menuPrincipalIngresos");
            exit();
        } else {
            // Mostrar mensaje de error y redirigir de nuevo a crear cuenta
            echo '<script type="text/javascript">
                alert("Error al crear la cuenta. Inténtalo de nuevo.");
                window.location.href="/MoneyMinder/index.php/crearCuenta";
                </script>';
            exit();
        }
    }

    // Función para editar un usuario en el sistema
    public function editUser()
    {
        // Lógica para editar un usuario
    }

    // Función para eliminar un usuario en el sistema
    public function deleteUser()
    {
        // Lógica para eliminar un usuario
    }

    // Función para mostrar la interfaz de inicio de sesión
    public function mostrarInicioSesion()
    {
        require VIEWS_PATH . '/inicioSesion.php';
    }

    // Nueva función para mostrar el menú principal de ingresos
    public function mostrarMenuPrincipalIngresos()
    {
        require VIEWS_PATH . '/menuPrincipalIngresos.php';
    }

    // Nueva función para mostrar la vista de restablecer contraseña
    public function restablecerContrasena()
    {
        require VIEWS_PATH . '/restablecerContrasena.php';
    }

    public function requestReset() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $_POST['email'];
            $user = $this->model->findUserByEmail($email);
    
            if ($user) {
                $token = bin2hex(random_bytes(4)); // Genera un token de 8 dígitos (4 bytes)
                $this->model->storeResetToken($email, $token);
    
                // Envía el correo electrónico con el enlace para restablecer la contraseña
                $resetLink = "http://localhost/MoneyMinder/index.php/restablecerContrasena?token=$token";
                $mailSent = mail($email, "Restablecer contraseña", "Usa este enlace para restablecer tu contraseña: $resetLink");
    
                if ($mailSent) {
                    // Redirige a la página de anuncio restablecer contraseña
                    header('Location: /MoneyMinder/index.php/anuncioRestablecerContrasena');
                    exit();
                } else {
                    // Muestra un mensaje de error si el correo no se envió
                    echo '<script>alert("Error al enviar el correo de restablecimiento.");</script>';
                    header('Location: /MoneyMinder/index.php/restablecerContrasena');
                    exit();
                }
            } else {
                // Muestra un mensaje de error si el correo no está registrado
                echo '<script>alert("El correo electrónico no está registrado.");</script>';
                header('Location: /MoneyMinder/index.php/restablecerContrasena');
                exit();
            }
        }
    }
    

    // Nueva función para mostrar la vista de anuncio restablecer contraseña
    public function anuncioRestablecerContrasena() {
        include VIEWS_PATH . '/anuncioRestablecerContrasena.php';
    }
}
?>
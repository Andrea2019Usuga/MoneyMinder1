    <?php
    require_once 'C:/xampp/htdocs/MoneyMinder/app/Models/UsersModel.php';
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
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $correo = $_POST['email'];
                $password = $_POST['password'];
                $recordar = isset($_POST['recordar']);

                // Verificar si el usuario existe en la base de datos
                $usuario = $this->model->getById($correo, $password);

                if ($usuario) {
                    $_SESSION['usuario_id'] = $usuario['id'];

                    // Si el usuario seleccionó la opción "Recordar sesión"
                    if ($recordar) {
                        $token = bin2hex(random_bytes(16));
                        $this->model->guardarToken($usuario['id'], $token);
                        setcookie('remember_token', $token, time() + (86400 * 30), "/", "", true, true);
                    }

                    header("Location: /MoneyMinder/index.php/menuPrincipalIngresos");
                    exit();
                } else {
                    echo '<script type="text/javascript">
                            alert("USUARIO O CONTRASEÑA INCORRECTOS");
                            window.location.href="/MoneyMinder/index.php/inicioSesion";
                        </script>';
                    exit();
                }
            }
        }

        public function verificarSesion() {
            return true;

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

        // Cargar la vista de agregar ingreso
        public function agregarIngreso() {
            require VIEWS_PATH . '/agregarIngreso.php';
        }
        
        // Función para manejar la inserción de un nuevo ingreso
    public function setIngreso() {
        // Verifica si se ha enviado el formulario y se han recibido todos los datos necesarios
        if (isset($_POST['id'], $_POST['nombre'], $_POST['monto'], $_POST['fecha'])) {
            // Asigna los valores del formulario a variables
            $id = $_POST['id'];
            $nombre = $_POST['nombre'];
            $monto = $_POST['monto'];
            $fecha = $_POST['fecha'];

            // Llama al método del modelo para insertar los datos en la base de datos
            $resultado = $this->model->setIngresoById($id, $nombre, $monto, $fecha);

            // Aquí puedes manejar el resultado de la inserción si es necesario
        }
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

                    // Instanciar el modelo y guardar el ingreso
                    $ingresoModel = new IngresoModel();
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
            $query = $this->db->prepare("SELECT * FROM ingresos");
            $query->execute();
            return $query->get_result()->fetch_all(MYSQLI_ASSOC);
        }

        // Eliminar ingreso
        public function eliminarIngreso($id) {
            $result = $this->ingresoModel->deleteIngreso($id);
        
            if ($result) {
                header('Location: /MoneyMinder/index.php?action=ingresos');
            } else {
                echo "Error al eliminar el ingreso.";
            }
        }

        // Editar ingreso
        public function editarIngreso($id) {
            $ingreso = $this->ingresoModel->getIngresoById($id);
        
            if ($ingreso) {
                require 'views/editarIngreso.php';
            } else {
                echo "Ingreso no encontrado.";
            }
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

        // Cargar la vista de crear cuenta
        public function crearCuenta() {
            require VIEWS_PATH . '/crearCuenta.php';
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
                    header("Location: /MoneyMinder/index.php/menuPrincipalIngresos");
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
            $usuario = $this->model->getAll();
        }

        // Mostrar la vista de inicio de sesión
        public function mostrarInicioSesion() {
            require VIEWS_PATH . '/inicioSesion.php';
        }

        // Mostrar la vista del menú principal de ingresos
        public function mostrarMenuPrincipalIngresos() {
        // $ingresoModel = new IngresoModel(); 
        // $ingresos = $ingresoModel->getAllIngresos();
            require VIEWS_PATH . '/menuPrincipalIngresos.php';
        }
    }
    ?>

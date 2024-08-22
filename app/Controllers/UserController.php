<?php
require 'app/Models/UsersModel.php';

class UserController
{
    // Función para redireccionar a la pantalla de inicio de sesión
    public function index()
    {
        require VIEWS_PATH . '/paginaPrincipal.php';
        exit(); // Detiene la ejecución del script
    }
    
    // Función pública para mostrar la página principal
    public function showHomePage() {
        // Renderiza la vista de la página principal
        include 'views/paginaPrincipal.php';
    }

    // Función para redirigir a la página de inicio de sesión
    public function redirectToLogin() {
        header("Location: inicioSesion.php");
        exit();
    }

    // Función para redirigir a la página de creación de cuenta
    public function redirectToRegister() {
        header("Location: crearCuenta.php");
        exit();
    }
    
    // Función para manejar el inicio de sesión
    public function inicioSesion()
    {
        // Llama al método login para manejar la lógica de inicio de sesión
        $this->login();
    }

    // Función para manejar la lógica de inicio de sesión
    public function login()
    {
        $email = $_POST["email"];
        $password = $_POST["password"];
        $validacionUsuario = UsersModel::getById($email, $password);
        print_r($validacionUsuario);

        if (isset($validacionUsuario)) {
            require VIEWS_PATH . '/menuPrincipalIngresos.php';
        } else {
            echo '<script type="text/javascript">
            alert("USUARIO O CONTRASENA INCORRECTOS");
            window.location.href="http://localhost/MoneyMinder/index.php";
            </script>';
            exit(); // Asegúrate de detener la ejecución del script
        }
    }

    // Función para crear una nueva cuenta
    public function crearCuenta()
    {
        require VIEWS_PATH . '/crearCuenta.php';
    }

    // Función para manejar la creación de un nuevo usuario en el sistema
    public function createUser()
    {
        $nombre = $_POST["nombre"];
        $apellido = $_POST["apellido"];
        $fechanacimiento = $_POST["fecha-nacimiento"];
        $correo = $_POST["correo"];
        $clave = $_POST["contrasena"];
        // Aquí puedes agregar la lógica para guardar los datos del nuevo usuario en la base de datos
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
        // Renderiza la vista de la interfaz de inicio de sesión
        require VIEWS_PATH . '/inicioSesion.php';
    }
}

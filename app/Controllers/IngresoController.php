<?php

require_once 'C:/xampp/htdocs/MoneyMinder/app/Core/DB.php'; // Usa require_once para evitar múltiples inclusiones
require_once 'C:/xampp/htdocs/MoneyMinder/app/Models/IngresoModel.php';


class IngresoController {

    private $model;

    public function __construct($databaseConnection) {
        $this->model = new IngresoModel($databaseConnection);
    }

    // Mostrar la vista del formulario para agregar ingreso
    public function mostrarAgregarIngreso() {
        include VIEWS_PATH . '/agregarIngreso.php';
    }

    // Manejar el formulario enviado
    public function agregarIngreso() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nombre_ingreso = $_POST['nombre_ingreso'];
            $monto = $_POST['monto'];
            $dia = $_POST['dia'];
            $mes = $_POST['mes'];
            $año = $_POST['año'];

            // Crear fecha en formato DD-MM-YYYY
            $fecha = "$año-$mes-$dia";

            // Agregar el ingreso a la base de datos
            $this->model->agregarIngreso($nombre_ingreso, $monto, $fecha);

            // Redirigir al menú principal de ingresos
            header('Location: /MoneyMinder/index.php/menuPrincipalIngresos');
            exit;
        }
    }

    // Mostrar el menú principal de ingresos
    public function mostrarMenuPrincipalIngresos() {
        $ingresos = $this->model->obtenerIngresos();
        include VIEWS_PATH . '/menuPrincipalIngresos.php';
    }
}
?>

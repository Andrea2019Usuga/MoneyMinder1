<?php

class IngresoModel {

    private $db;

    public function __construct($databaseConnection) {
        $this->db = $databaseConnection;
    }

    public function agregarIngreso($nombre_ingreso, $monto, $fecha) {
        $stmt = $this->db->prepare("INSERT INTO ingresos (nombre_ingreso, monto, fecha) VALUES (?, ?, ?)");
        return $stmt->execute([$nombre_ingreso, $monto, $fecha]);
    }

    public function obtenerIngresos() {
        $stmt = $this->db->query("SELECT * FROM ingresos ORDER BY fecha DESC");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>

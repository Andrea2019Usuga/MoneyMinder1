<?php

class MetasAhorroModel {
    private $db;

    // Constructor que recibe la conexión a la base de datos
    public function __construct($db) {
        $this->db = $db;
    }

    // Método para guardar una nueva meta de ahorro
    public function guardarMetaAhorro($usuario_id, $nombre, $montoAhorrar, $montoActual, $fechaInicio, $fechaFin) {
        $query = "INSERT INTO metas_ahorro (usuario_id, nombre, monto_ahorrar, monto_actual, fecha_inicio, fecha_fin) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $this->db->prepare($query);
        return $stmt->execute([$usuario_id, $nombre, $montoAhorrar, $montoActual, $fechaInicio, $fechaFin]);
    }

    // Método para obtener todas las metas de ahorro por usuario
    public function getMetasPorUsuario($usuario_id) {
        $query = "SELECT * FROM metas_ahorro WHERE usuario_id = :usuario_id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':usuario_id', $usuario_id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


    // Método para obtener una meta de ahorro específica por su ID
    public function obtenerMetaPorId($id) {
        $sql = "SELECT * FROM metas_ahorro WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function getMetaAhorroById($id) {
        $sql = "SELECT * FROM metas_ahorro WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC); // Retorna la meta de ahorro en forma de array asociativo
    }
    
    // Método para actualizar una meta de ahorro
    public function updateMetaAhorro($id, $nombre, $monto_ahorrar, $monto_actual, $fecha_inicio, $fecha_fin) {
        try {
            $stmt = $this->db->prepare("UPDATE metas_ahorro SET nombre = :nombre, monto_ahorrar = :monto_ahorrar, monto_actual = :monto_actual, fecha_inicio = :fecha_inicio, fecha_fin = :fecha_fin WHERE id = :id");
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->bindParam(':nombre', $nombre);
            $stmt->bindParam(':monto_ahorrar', $monto_ahorrar);
            $stmt->bindParam(':monto_actual', $monto_actual);
            $stmt->bindParam(':fecha_inicio', $fecha_inicio);
            $stmt->bindParam(':fecha_fin', $fecha_fin);
            
            return $stmt->execute();
        } catch (PDOException $e) {
            // Manejo de errores
            echo "Error: " . $e->getMessage();
            return false;
        }
    }

    // Método para eliminar una meta de ahorro por ID
    public function eliminarMetaAhorro($id) {
        $stmt = $this->db->prepare("DELETE FROM metas_ahorro WHERE id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->rowCount() > 0; // Retorna true si se eliminó alguna fila
    }
}
?>

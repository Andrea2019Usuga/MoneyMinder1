<?php

class GastoModel {
    private $db;

    // Constructor que recibe la conexión a la base de datos
    public function __construct($db) {
        $this->db = $db;
    }

    // Método para guardar un gasto en la base de datos
    public function guardarGasto($usuario_id, $nombre, $monto, $fecha) {
        $query = "INSERT INTO gastos (usuario_id, nombre, monto, fecha) VALUES (?, ?, ?, ?)";
        $stmt = $this->db->prepare($query);
        return $stmt->execute([$usuario_id, $nombre, $monto, $fecha]);
    }

    //sujeto a cambios 20-09-2024
    public function getGastosByUserId($userId) {
        $stmt = $this->db->prepare("SELECT * FROM gastos WHERE usuario_id = :userId");
        $stmt->bindParam(':userId', $userId, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public function getGastoById($id) {
        $stmt = $this->db->prepare("SELECT * FROM gastos WHERE id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    
    public function updateGasto($id, $nombre, $monto, $fecha) {
        try {
            $stmt = $this->db->prepare("UPDATE gastos SET nombre = :nombre, monto = :monto, fecha = :fecha WHERE id = :id");
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->bindParam(':nombre', $nombre);
            $stmt->bindParam(':monto', $monto);
            $stmt->bindParam(':fecha', $fecha);
            
            $stmt->execute();
    
            // Verificar si la fila fue afectada
            if ($stmt->rowCount() > 0) {
                return true;
            } else {
                return false; // No se actualizó ninguna fila (puede ser porque el ID no existe)
            }
        } catch (PDOException $e) {
            // Manejo de errores: puedes registrar el error o mostrarlo
            echo "Error: " . $e->getMessage();
            return false;
        }
    }
    
    public function eliminarGasto($id) {
        $stmt = $this->db->prepare("DELETE FROM gastos WHERE id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        print_r($stmt);
        print($id);
        return $stmt;
    }
    

}

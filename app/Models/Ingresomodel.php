<?php

class IngresoModel {
    private $db;

    // Constructor que recibe la conexión a la base de datos
    public function __construct($db) {
        $this->db = $db;
    }

    // Método para guardar un ingreso en la base de datos
    public function guardarIngreso($usuario_id, $nombre, $monto, $fecha) {
        $query = "INSERT INTO ingresos (usuario_id, nombre, monto, fecha) VALUES (?, ?, ?, ?)";
        $stmt = $this->db->prepare($query);
        return $stmt->execute([$usuario_id, $nombre, $monto, $fecha]);
    }

    //sujeto a cambios 20-09-2024
    public function getIngresosByUserId($userId) {
        $stmt = $this->db->prepare("SELECT * FROM ingresos WHERE usuario_id = :userId");
        $stmt->bindParam(':userId', $userId, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
     // Método para obtener todos los ingresos de la base de datos
     public function getAllIngresos() {
        // Usamos la conexión de la base de datos
        $db = Database::getConnection();
        
        // Consulta SQL para obtener los ingresos
        $query = "SELECT * FROM ingresos ORDER BY fecha DESC";  // Suponiendo que tienes la columna 'fecha'
        
        // Ejecutamos la consulta
        $stmt = $db->query($query);
        
        // Retornamos los resultados
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getIngresoById($id) {
        $stmt = $this->db->prepare("SELECT * FROM ingresos WHERE id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    
    public function updateIngreso($id, $nombre, $monto, $fecha) {
        try {
            $stmt = $this->db->prepare("UPDATE ingresos SET nombre = :nombre, monto = :monto, fecha = :fecha WHERE id = :id");
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
    
    public function eliminarIngreso($id) {
        $stmt = $this->db->prepare("DELETE FROM ingresos WHERE id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        print_r($stmt);
        print($id);
        return $stmt;
    }
    

}

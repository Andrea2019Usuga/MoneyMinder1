<?php
class UsersModel
{
    private $db;

    // Constructor para inicializar la conexión a la base de datos
    public function __construct($db) {
        $this->db = $db;
    }

    // Método para obtener todos los usuarios de la base de datos
    public function getAll() {
        $stmt = $this->db->prepare('SELECT * FROM usuarios');
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Método para obtener un usuario por correo electrónico y contraseña
    public function getById($email, $password) {
        $stmt = $this->db->prepare('SELECT * FROM usuarios WHERE correo_electronico = :email');
        $email = filter_var($email, FILTER_VALIDATE_EMAIL);
        $stmt->bindParam(':email', $email);
        $stmt->execute();

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($password, $user['contraseña'])) {
            echo "$user";
            return $user;
        } else {
            return null;
        }
    }

    // Método para crear un nuevo usuario en la base de datos
    public function createUser($nombre, $apellido, $fechanacimiento, $correo, $clave) {
        try {
            // Cifrar la contraseña antes de almacenarla
            $hashedPassword = password_hash($clave, PASSWORD_DEFAULT);

            // Sentencia SQL para insertar un nuevo usuario
            $stmt = $this->db->prepare('INSERT INTO usuarios (nombre, apellido, fecha_nacimiento, correo_electronico, contraseña)
                                        VALUES (:nombre, :apellido, :fecha_nacimiento, :correo, :contrasena)');

            // Vincular los parámetros
            $stmt->bindParam(':nombre', $nombre);
            $stmt->bindParam(':apellido', $apellido);
            $stmt->bindParam(':fecha_nacimiento', $fechanacimiento);
            $stmt->bindParam(':correo', $correo);
            $stmt->bindParam(':contrasena', $hashedPassword); // Guardamos la contraseña cifrada

            // Ejecutar la consulta y verificar si tuvo éxito
            return $stmt->execute();
        } catch (Exception $e) {
            // En caso de error, retornar false
            return false;
        }
    }

    // Método para buscar un usuario por correo electrónico
    public function findUserByEmail($email) {
        $stmt = $this->db->prepare("SELECT * FROM usuarios WHERE correo_electronico = :email");
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Método para guardar el token de "Recordar sesión"
    public function guardarToken($usuarioId, $token) {
        $stmt = $this->db->prepare("UPDATE usuarios SET remember_token = :token WHERE id = :id");
        $stmt->bindParam(':token', $token);
        $stmt->bindParam(':id', $usuarioId);
        $stmt->execute();
    }

    // Método para obtener un usuario por token
    public function obtenerPorToken($token) {
        $stmt = $this->db->prepare("SELECT * FROM usuarios WHERE remember_token = :token");
        $stmt->bindParam(':token', $token);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function getIngresoById($id) {
        $query = $this->db->prepare("SELECT * FROM ingresos WHERE id = ?");
        $query->bind_param('i', $id);
        $query->execute();
        return $query->get_result()->fetch_assoc();
    }
    
    public function deleteIngreso($id) {
        $query = $this->db->prepare("DELETE FROM ingresos WHERE id = ?");
        $query->bind_param('i', $id);
        return $query->execute();
    }
    
    public function setIngresoById($id, $nombre, $monto, $fecha) {
        $query = $this->db->prepare("INSERT INTO ingresos (id, nombre, monto, fecha) VALUES (?, ?, ?, ?)");
        $query->bind_param('isds', $id, $nombre, $monto, $fecha);
        if ($query->execute()) {
            return true; 
        } else {
            return false; 
        }
    }
    
    
}

?>

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
            return $user;
        } else {
            return null;
        }
    }

    // Método para crear un nuevo usuario en la base de datos
    public function createUser($nombre, $apellido, $fechanacimiento, $correo, $clave) {
        $hashedPassword = password_hash($clave, PASSWORD_DEFAULT);
        $stmt = $this->db->prepare('INSERT INTO usuarios (nombre, apellido, fecha_nacimiento, correo_electronico, contraseña)
                                    VALUES (:nombre, :apellido, :fecha_nacimiento, :correo, :contrasena)');
        $stmt->bindParam(':nombre', $nombre);
        $stmt->bindParam(':apellido', $apellido);
        $stmt->bindParam(':fecha_nacimiento', $fechanacimiento);
        $stmt->bindParam(':correo', $correo);
        $stmt->bindParam(':contrasena', $hashedPassword);

        return $stmt->execute();
    }

    // Método para buscar un usuario por correo electrónico
    public function findUserByEmail($email) {
        $stmt = $this->db->prepare("SELECT * FROM usuarios WHERE correo_electronico = :email");
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Método para almacenar el token de restablecimiento de contraseña
    public function storeResetToken($email, $token) {
        $stmt = $this->db->prepare("UPDATE usuarios SET reset_token = :token, reset_token_expiry = DATE_ADD(NOW(), INTERVAL 15 MINUTE) WHERE correo_electronico = :email");
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':token', $token);
        return $stmt->execute();
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
}
?>

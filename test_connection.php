<?php
// Configura los datos de tu conexión
$host = 'localhost'; // O el nombre de host de tu servidor de base de datos
$dbname = 'moneyminder';
$username = 'root';
$password = '';

try {
    // Crear una nueva instancia de PDO para la conexión
    $db = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    // Establecer el modo de error de PDO a excepción
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "¡Conexión exitosa a la base de datos!";
} catch (PDOException $e) {
    echo "Error de conexión: " . $e->getMessage();
}
?>
    
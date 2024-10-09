<?php
// app/Core/DB.php
class DB
{
    private static $instance = null;

    /**
     * Conexión con nuestra base de datos
     */
    public static function getInstance()
    {
        if (!self::$instance) {
            self::$instance = new PDO('mysql:host=localhost;dbname=moneyminder', 'root', '');
        }
        return self::$instance;
    }
}
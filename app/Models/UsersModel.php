<?php
class UsersModel
{
    public static function getAll()
    {
        $db = DB::getInstance();
        // Sentencia preparada para prevenir inyección SQL
        $stmt = $db->prepare('SELECT * FROM usuarios');
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public static function getById($id,$password)
    {
        $db = DB::getInstance();

        // Sentencia preparada para prevenir inyección SQL
        $stmt = $db->prepare('SELECT * FROM usuarios WHERE correo_electronico = :id and contraseña= :password');

        // Sanitizamos la entrada
        $id = filter_var($id, FILTER_VALIDATE_EMAIL);
        $password = filter_var($password, FILTER_VALIDATE_INT);


        // Vinculamos el parámetro :id 
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':password', $password);

        $stmt->execute();
        // Obtenemos el post
        $requestBD = $stmt->fetch();

        // Retornamos instancia de Post o null si no existe
        if ($requestBD) {
            return $requestBD;
        } else {
            return null;
        }
    }

    //Funcion que se encarga de insertar un nuevo usuario en la base de datos
    public static function createUser($nombre,$apellido,$fechanacimiento,$correo,$clave)
    {
        $db = DB::getInstance();
        //$stmt = $db->prepare('INSERT INTO usuarios ('id', 'nombre', 'apellido', 'fecha_nacimiento', 'correo_electronico', 'contrasena') 
       // values ("", :nombre, :apellido, :fecha_nacimiento, :correo_electronico, :contrasena');

    }

}
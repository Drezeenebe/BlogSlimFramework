<?php
namespace App\Models;

class UsuariosModels extends MysqlModel{
    static $tabla = 'usuarios';

    public static function create($user){
        $query = "INSERT INTO usuarios
        SET 
        nombre='{$user['nombre']}',
        email='{$user['email']}',
        password=sha1('12345678'),
        fecha_creacion=NOW()";
        self::execute($query);
    }
    
}

?>
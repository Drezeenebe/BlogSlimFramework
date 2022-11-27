<?php
namespace App\Models;

class UsuariosModel extends MysqlModel{
    static $tabla = 'usuarios';

    public static function create($user){
        $query = "INSERT INTO usuarios
        SET 
        nombre='{$user['nombre']}',
        email='{$user['email']}',
        password=sha1('12345678'),
        fecha_creacion=NOW()";
        if(self::execute($query)){
            return self::select("WHERE email='{$user['email']}'");
        }
        return 'Error al ingresar';
    }
    
}

?>
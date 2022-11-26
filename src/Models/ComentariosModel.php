<?php
namespace App\Models;

class ComentariosModel extends MysqlModel{
    static $tabla = 'comentarios';

    public static function getComentarios($id_post){
        $query = "SELECT * FROM comentarios 
        INNER JOIN usuarios on usuarios.id = comentarios.fk_usuario
        WHERE fk_post=$id_post";
        return self::execute($query);
    }

}

?>
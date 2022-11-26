<?php

namespace App\Models;

use PDO;

class MysqlModel
{
    protected static $tabla = '';
    public static function select($where='')
    {
        $consulta = "SELECT * FROM ".static::$tabla." $where ORDER BY 1 DESC";
        return self::execute($consulta);

    }

    public static function one($id)
    {
        $consulta = "SELECT * FROM ".static::$tabla." 
        WHERE id=$id";
        $resultados=self::execute($consulta);
        return $resultados[0] ?? NULL;

    }

    protected static function execute($query)
    {
        $cnx = new PDO('mysql:host=localhost;dbname=blog_slim;charset=utf8mb4', 'root', '');
        $cnx->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $stm = $cnx->prepare($query);
        $resultados = $stm->execute();
        $filas = [];
        while ($r = $stm->fetch(
            PDO::FETCH_ASSOC
        )) {
            $filas[] = $r;
        }

        return $filas;
    }
}

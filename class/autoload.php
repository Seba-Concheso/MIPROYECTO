<?php


class autoload
{

    static public function autocarga($clase)
    {
        $class = array();
        $class['productos'] = "../class/productos.php";
        $class['categorias'] = "../class/categorias.php";
        $class['base_datos'] = "../class/base_datos.php";

        if (isset($class[$clase])) {
            include($class[$clase]);
        } else {
            echo "La clase $clase no existe";
            die();
        }
    }
}

//llamar a una funcion de php 

spl_autoload_register('autoload::autocarga');

/* Sebastián Concheso */
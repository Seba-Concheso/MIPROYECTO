<?php  /* @Sebastián Concheso */


class autoload
{

    static public function autocarga($class)
    {
        $classArr = array();
        $from = __DIR__ . DIRECTORY_SEPARATOR;
        $classArr['productos'] = $from . "productos.php";
        $classArr['categorias'] = $from . "categorias.php";
        $classArr['base_datos'] = $from . "base_datos.php";

        if (isset($classArr[$class])) {
            if (file_exists($classArr[$class])) include $classArr[$class];
        } else {
            throw new Exception("La clase " . $classArr[$class] . " no existe");
            // echo "La clase $clase no existe";
            // die();
        }
    }
}

//llamar a una funcion de php 

spl_autoload_register('autoload::autocarga');

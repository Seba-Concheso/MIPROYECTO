<?php


class base_datos {
        //Es privada xq no quiero que nadi entre acá
    private $conexion;

    function __construct() { 
        //link de conexion a la base de datos
    $conexion = new PDO('mysql:host=localhost:3306;port=3306 ; dbname=MIPROYECTO', 'root', '');

    if($conexion){
        $this->conexion = $conexion;
    }else{
        echo "no se puede conectar a la base de datos";
    }
}

public function listar($table_name) {
    $sql = "SELECT * FROM $table_name";
    $resource = $this->conexion->query($sql);
    if(!$resource){
        echo "error en la consulta";
        echo "<pre>";
        print_r($resource);
        echo "</pre>";
    }else{
        $result = $resource->fetchAll(PDO::FETCH_ASSOC); //FETCH_ASSOC: devuelve un array indexado por los nombres de las columnas del conjunto de resultados
        return $result;
    }
    }
}
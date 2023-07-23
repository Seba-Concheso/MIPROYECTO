<?php  /* @Sebastián Concheso */

// try {
//     $conector = new PDO("mysql:dbname=miproyecto;host=localhost:3306", "root", "");
//     echo "Conectado a la base de datos<br>";
// } catch (Exception $e) {
//     echo "Error de conexión a la base de datos<br>";
//     echo $e->getMessage();
//     exit;
// }



class base_datos
{
    //Es privada xq no quiero que nadi entre acá
    private $conexion;

    function __construct($driver, $database, $host, $user, $pass)
    {
        //link de conexion a la base de datos
        $conexion = new PDO($driver . ':dbname=' . $database . ';host=' . $host, $user, $pass);

        if ($conexion) {
            $this->conexion = $conexion;
        } else {
            echo "no se puede conectar a la base de datos";
        }
    }

    function select($tabla, $filtros = null, $arr_prepare = null, $orden = null, $limit = null)
    {
        $sql = "SELECT * FROM " . $tabla;
        if ($filtros != null) {
            $sql .= " WHERE " . $filtros;
        }
        if ($orden != null) {
            $sql .= " ORDER BY " . $orden;
        }
        if ($limit != null) {
            $sql .= " LIMIT " . $limit;
        }
        $resource = $this->conexion->prepare($sql);
        $resource->execute($arr_prepare);
        if (!$resource) {
            echo "error en la consulta";
            echo "<pre>";
            print_r($resource);
            echo "</pre>";
        } else {
            $result = $resource->fetchAll(PDO::FETCH_ASSOC); //FETCH_ASSOC: devuelve un array indexado por los nombres de las columnas del conjunto de resultados
            return $result;
        }
    }

    function insert($tabla, $campos, $valores, $arr_prepare = null)
    {
        $sql = "INSERT INTO " . $tabla . " (" . implode(", ", $campos) . ") VALUES (" . implode(",", $valores) . ")";
        $resource = $this->conexion->prepare($sql);
        $resource->execute($arr_prepare);
        if ($resource) {
            $this->conexion->lastInsertId();
            return $resource->fetchAll(PDO::FETCH_ASSOC);
        } else {
            echo "error en la consulta";
            throw new Exception("Error al insertar");
        }
    }

    function delete($tabla, $filtros = null, $arr_prepare = null)
    {
        $sql = "DELETE FROM " . $tabla . " WHERE " . $filtros;
        $resource = $this->conexion->prepare($sql);
        $resource->execute($arr_prepare);
        if ($resource) {
            return $resource->fetchAll(PDO::FETCH_ASSOC);
        } else {
            echo "error en la consulta";
            throw new Exception("Error al eliminar");
        }
    }

    function update($tabla, $campos, $filtros, $valor, $arr_prepare = null)
    {
        $sql = "UPDATE " . $tabla . " SET " . $campos . ' = ' . $valor . " WHERE " . $filtros;
        $resource = $this->conexion->prepare($sql);
        $resource->execute($arr_prepare);
        if ($resource) {
            return $resource->fetchAll(PDO::FETCH_ASSOC);
        } else {
            echo "error en la consulta";
            throw new Exception("Error al actualizar");
        }
    }


    public function listar($table_name)
    {
        $sql = "SELECT * FROM $table_name";
        $resource = $this->conexion->query($sql);
        if (!$resource) {
            echo "error en la consulta";
            echo "<pre>";
            print_r($resource);
            echo "</pre>";
        } else {
            $result = $resource->fetchAll(PDO::FETCH_ASSOC); //FETCH_ASSOC: devuelve un array indexado por los nombres de las columnas del conjunto de resultados
            return $result;
        }
    }
}

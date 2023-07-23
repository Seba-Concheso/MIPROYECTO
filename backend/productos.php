<?php


//********************************************************************Controlador**********************************************


//de esta manera cargo todas las clases con esa sola línea de código
include '../class/autoload.php';

if (isset($_POST['accion']) && $_POST['accion'] == 'guardar') {
    $producto = new productos();
    $producto->nombre = $_POST['nombre_producto'];
    $producto->precio = $_POST['precio'];
    $producto->categoria = $_POST['categoria_id'];
    $producto->descripcion = $_POST['descripcion'];
    $prducto->imagen = $_POST['imagen'];
    if ($producto->guardar()) {
        llamarListado();
        echo "guardado";
    } else {
        echo "error al guardar";
    }
}
if (isset($_GET['accion']) && $_GET['accion'] == 'agregar') {
    include '../backend/view/productos.html';
    die();
}



$productos = productos::listar();
include './view/listas_productos.html';


/* Sebastián Concheso */

<?php


//********************************************************************Controlador**********************************************


//de esta manera cargo todas las clases con esa sola línea de código
include '../class/autoload.php';

if (isset($_POST["accion"]) && $_POST["accion"] == "guardar") {
    $producto = new productos();
    $producto->nombre = $_POST['nombre_producto'];
    $producto->precio = $_POST['precio'];
    $producto->categoria = $_POST['categoria_id'];
    $producto->descripcion = $_POST['descripcion'];
    // $prducto->imagen = $_FILES['imagen'];
    $producto->guardar();
    llamarListado();
    // echo "guardado";
    die();
}
if (isset($_GET['accion']) && $_GET['accion'] == 'agregar') {
    include './view/productos.html';
    die();
} else {
    llamarListado();
}


function llamarListado()
{
    $productos = productos::listar();
    include './view/listas_productos.html';
}
// $productos = productos::listar();
// include './view/listas_productos.html';


/* Sebastián Concheso */

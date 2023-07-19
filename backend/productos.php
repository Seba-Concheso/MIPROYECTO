<?php
//de esta manera cargo todas las clases con esa sola línea de código
include '../class/autoload.php';
include './view/productos.html';


$categorias = categorias::listar();

if (isset($_POST['accion']) && $_POST['accion'] == 'guardar') {
    $producto = new productos();
    $producto->nombre = $_POST['nombre'];
    $producto->precio = $_POST['precio'];
    $producto->categoria = $_POST['categoria_id'];
    if ($producto->guardar()) {
        llamarListado();
        echo "guardado";
    } else {
        echo "error al guardar";
    }
}
if (isset($_GET['accion']) && $_GET['accion'] == 'agregar') {
    // include '../backend/view/productos.html';
} else {

    llamarListado();
}


function llamarListado()
{
    $productos = productos::listar();
    include 'view/lista_productos.html';
}


/* Sebastián Concheso */

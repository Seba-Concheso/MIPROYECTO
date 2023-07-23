

<?php  /* @Sebastián Concheso */

//*********************************Controlador********************************************* */

include '../class/autoload.php';

if (isset($_POST['accion']) && $_POST["accion"] == "guardar") {
    $mycategoria = new categorias();
    $mycategoria->nombre_categoria = $_POST['nombre_categoria'];
    $mycategoria->guardar();
    llamarListado();
    die();
}
if (isset($_GET['accion']) && $_GET['accion'] == 'agregar') {
    include './view/categorias.html';
    die();
} else {

    llamarListado();
}


function llamarListado()
{
    $categorias = categorias::listar();
    //ojo xq si lo pones arriba no está definido el objeto categorias
    include './view/listas_categorias.html';
}

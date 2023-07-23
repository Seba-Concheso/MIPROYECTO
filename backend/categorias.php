

<?php  /* @Sebastián Concheso */

//*********************************Controlador********************************************* */

include '../class/autoload.php';

if (isset($_POST['accion']) && $_POST["accion"] == "guardar") {
    $mycategoria = new categorias();
    $mycategoria->nombre_categoria = $_POST['nombre_categoria'];
    if ($mycategoria->guardar()) {
        llamarListado();
    } else {
        echo "error al guardar";
    }
}
if (isset($_GET['accion']) && $_GET['accion'] == 'agregar') {
    include '../backend/view/categorias.html';
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

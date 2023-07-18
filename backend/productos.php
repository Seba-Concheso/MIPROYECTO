<?php
//de esta manera cargo todas las clases con esa sola línea de código
include '../class/autoload.php';



$categorias = categorias::listar();



include '../view/productos.html';


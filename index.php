<?php
// Código para el servidor
include './class/autoload.php';




$productos = productos::listar();
include './views/home.html';

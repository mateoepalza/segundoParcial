<?php 
require_once "logica/Producto.php";
require_once "logica/Tienda.php";

if ($_GET['pid']) {
    $pid = base64_decode($_GET['pid']);
    include $pid;
}

?>
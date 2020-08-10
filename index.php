<?php 

require_once "logica/Producto.php";
require_once "logica/Tienda.php";

if(isset($_GET["pid"])){
    $pid = base64_decode($_GET["pid"]);    
}

include_once "presentacion/Main/header.php";
include_once "Presentacion/Main/nav.php";
if(isset($pid)){
	include $pid;
}else{
	include "presentacion/Main/Bienvenido.php";
}

include_once "presentacion/Main/footer.php";

?>
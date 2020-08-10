<nav class="navbar navbar-dark  navbar-expand-lg" style="background-color: #323D4E !important">
    <a class="navbar-brand" href="#"><a class="nav-link" href="index.php?pid=<?php echo base64_encode("presentacion/Main/bienvenido.php")?>"><img src="img/logo.png" width="40px"></a></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="index.php?pid=<?php echo base64_encode("presentacion/Producto/crearProducto.php")?>">Crear producto</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="index.php?pid=<?php echo base64_encode("presentacion/Producto/listarProducto.php")?>">Consultar producto</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="index.php?pid=<?php echo base64_encode("presentacion/Tienda/crearTienda.php")?>">Crear Tienda</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="index.php?pid=<?php echo base64_encode("presentacion/Tienda/listarTienda.php")?>">Consultar Tienda</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="index.php?pid=<?php echo base64_encode("presentacion/TiendaProductos/crearInventario.php")?>">Crear inventario</a>
            </li>
        </ul>
    </div>
</nav>
<div id="alert-ajax">

</div>
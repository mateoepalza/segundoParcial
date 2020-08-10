<?php

if(isset($_POST['sent'])){
    $idProducto = $_POST['producto'];
    $idTienda = $_POST['tienda'];
    $cantidad = $_POST['cantidad'];
    
    $inventario = new TiendaProducto($idProducto, $idTienda, $cantidad);
    $res = $inventario -> insertar();

    if ($res == 1) {
        $msj = "El inventario se ha creado satisfactoriamente";
        $class = "alert-success";
    } else {
        $msj = "Ocurrió algo inesperado, intente de nuevo.";
        $class = "alert-danger";
    }
    include "presentacion/Main/alert.php";
}

$produc = new Producto();
$resProd = $produc -> getAll();

$resTienda = $tiend = new Tienda();
$resTienda = $tiend -> getAll();
?>

<div class="container  mb-5">
    <div class="row justify-content-center mt-5">
        <div class="col-11 col-md-12 col-lg-9 col-xl-9 form-bg">
            <div class="card">
                <div class="card-body" >
                    <form novalidate class="needs-validation" action="index.php?pid=<?php echo base64_encode("presentacion/TiendaProductos/crearInventario.php") ?>" method="POST" enctype="multipart/form-data">
                        <div class="form-title">
                            <h1>Invcentario sede</h1>    
                        </div>
                        <div class="form-group">
                            <label>Seleccione la sede</label>
                            <select class="form-control" name="tienda" required>
                                <option selected value="" disabled>- Seleccione -</option>
                                <?php
                                foreach ($resTienda as $tie) {
                                    echo "<option value=" . $tie -> getIdTienda() . ">" . $tie->getNombre() . "</option>";
                                }
                                ?>
                            </select>
                            <div class="invalid-feedback">
                                Por favor seleccione una tienda.
                            </div>
                            <div class="valid-feedback">
                                ¡Enhorabuena!
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Seleccione el producto</label>
                            <select class="form-control" name="producto" required>
                                <option selected value="" disabled>- Seleccione -</option>
                                <?php
                                foreach ($resProd as $prod) {
                                    echo "<option value=" . $prod->getIdProducto() . ">" . $prod->getNombre() . "</option>";
                                }
                                ?>
                            </select>
                            <div class="invalid-feedback">
                                Por favor seleccione un producto.
                            </div>
                            <div class="valid-feedback">
                                ¡Enhorabuena!
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Ingrese la cantidad</label>
                            <input class="form-control" name="cantidad" type="text" placeholder="Ingrese la cantidad" required>
                            <div class="invalid-feedback">
                                Por favor ingrese la cantidad.
                            </div>
                            <div class="valid-feedback">
                                ¡Enhorabuena!
                            </div>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-primary w-100" name="sent" type="submit">Crear Inventario</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
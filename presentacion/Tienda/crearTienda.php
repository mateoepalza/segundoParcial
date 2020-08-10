<?php

if (isset($_POST['crearTienda'])) {

    $nombre = $_POST['nombre'];
    $precio = $_POST['direcc'];

    $tienda = new Tienda("",$nombre, $precio);
    $res = $tienda -> insertar();

    if ($res == 1) {
        $msj = "El tienda se ha creado satisfactoriamente";
        $class = "alert-success";
    } else {
        $msj = "Ocurrió algo inesperado, intente de nuevo.";
        $class = "alert-danger";
    }
    include "presentacion/Main/alert.php";
}
?>
<div class="container mt-5 mb-5">

    <div class="row justify-content-center mt-5">
        <div class="col-11 col-md-12 col-lg-9 col-xl-8 form-bg">
            <div class="card">
                <div class="card-body">
                    <form class="needs-validation" novalidate action="index.php?pid=<?php echo base64_encode("presentacion/Tienda/crearTienda.php") ?>" method="POST">
                        <div class="form-title">
                            <h1>Crear Tienda</h1>
                        </div>
                        
                        <div class="form-group">
                            <label>Nombre</label>
                            <input class="form-control" name="nombre" type="text" placeholder="Ingrese el nombre" required>
                            <div class="invalid-feedback">
                                Por favor ingrese el nombre.
                            </div>
                            <div class="valid-feedback">
                                ¡Enhorabuena!
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Precio</label>
                            <input class="form-control" name="direcc" type="text" placeholder="Ingrese la direccion" required>
                            <div class="invalid-feedback">
                                Por favor ingrese la direccion.
                            </div>
                            <div class="valid-feedback">
                                ¡Enhorabuena!
                            </div>
                        </div>
                        <div>
                            <button class="btn btn-primary w-100" name="crearTienda" type="submit"> Crear Tienda </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
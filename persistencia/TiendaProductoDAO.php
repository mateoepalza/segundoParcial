<?php 

require_once "Persistencia/Conexion.php";
require_once "Persistencia/TiendaProductoDAO.php";

class TiendaProductoDAO{
    private $idProducto;
    private $idTienda;
    private $cantidad;

    public function TiendaProductoDAO($idProducto = "", $idTienda = "", $cantidad = ""){
        $this -> idProducto = $idProducto;
        $this -> idTienda = $idTienda;
        $this -> cantidad = $cantidad;
    }
    
    /* 
    *   methods
    */

    public function insertar(){
        return "INSERT INTO tiendaproducto (FK_idProducto, FK_idTienda, cantidad ) values ('" . $this -> idProducto ."', '" . $this -> idTienda  ."', '" . $this -> cantidad  ."')";
    }

    public function consultarReporte(){
        return "SELECT Producto.nombre, TiendaProducto.cantidad
                FROM TiendaProducto
                INNER JOIN producto ON FK_idProducto = idProducto
                where FK_idTienda = " .  $this -> idTienda;
    }
    public function consultarReporteProducto(){
        return "SELECT Tienda.nombre, TiendaProducto.cantidad 
                FROM TiendaProducto INNER JOIN Tienda ON FK_idTienda= idtienda 
                where FK_idProducto = " .  $this -> idProducto;
    }
    
    
}
?>
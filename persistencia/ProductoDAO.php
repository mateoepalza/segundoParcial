<?php 

require_once "Persistencia/Conexion.php";
require_once "Persistencia/ProductoDAO.php";

class ProductoDAO{
    private $idProducto;
    private $nombre;
    private $precio;


    public function ProductoDAO($idProducto = "", $nombre = "", $precio = ""){
        $this -> idProducto = $idProducto;
        $this -> nombre = $nombre;
        $this -> precio = $precio;
    }
    
    /* 
    *   methods
    */

    public function getInfo(){
        return "SELECT idProducto, nombre, precio
                FROM Producto
                WHERE idProducto = ". $this -> idProducto;
    }

    public function getAll(){
        return "SELECT idProducto, nombre
                FROM Producto";
    }

    public function insertar(){
        return "INSERT INTO Producto (nombre, precio) 
                VALUES ('" . $this -> nombre ."', '" . $this -> precio  ."')";
    }

    public function filtroPaginado($str, $pag, $cant){
        return "SELECT idProducto, nombre, precio 
                FROM Producto 
                WHERE nombre like '%". $str ."%' OR precio like '%" . $str . "%'
                LIMIT " . (($pag - 1)*$cant) . ", " . $cant;
    }

    public function filtroCantidad($str){
        return "SELECT count(*) 
                FROM Producto
                WHERE nombre like '%". $str ."%'  OR precio like '%" . $str . "%'";
    }
    
}
?>
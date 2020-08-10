<?php 

require_once "Persistencia/Conexion.php";
require_once "Persistencia/TiendaProductoDAO.php";

class TiendaProducto{
    private $idProducto;
    private $idTienda;
    private $cantidad;
    private $TiendaProductoDAO;
    private $Conexion;

    public function TiendaProducto($idProducto = "", $idTienda = "", $cantidad = ""){
        $this -> idProducto = $idProducto;
        $this -> idTienda = $idTienda;
        $this -> cantidad = $cantidad;
        $this -> TiendaProductoDAO = new TiendaProductoDAO($idProducto, $idTienda, $cantidad);
        $this -> Conexion = new Conexion();
    }
    /*
    *   Getters
    */
    public function getIdProducto(){
        return $this -> idProducto;
    }

    public function getIdTienda(){
        return $this -> idTienda;
    }

    public function getCantidad(){
        return $this -> cantidad;
    }

    

    /*
    *   Setters
    */
    
    public function setIdProducto($idProducto){
        $this -> idProducto = $idProducto;
    }

    public function setidTienda($idTienda){
        $this -> idTienda = $idTienda;
    }

    public function setCantidad($cantidad){
        $this -> cantidad = $cantidad;
    }
    /* 
    *   methods
    */

    public function insertar(){
        $this -> Conexion -> abrir();
        $this -> Conexion -> ejecutar( $this -> TiendaProductoDAO -> insertar());
        $res = $this -> Conexion -> filasAfectadas();
        $this -> Conexion -> cerrar();
        return $res;
    }

    public function consultarReporte(){
        $this -> Conexion -> abrir();
        //echo $this -> TiendaProductoDAO -> consultarReporte();
        $this -> Conexion -> ejecutar( $this -> TiendaProductoDAO -> consultarReporte());
        $resList = array();
        while($res = $this -> Conexion -> extraer()){
            array_push($resList, new TiendaProducto($res[0], "", $res[1]));
        }
        $this -> Conexion -> cerrar();

        return $resList;
    }

    public function consultarReporteProducto(){
        $this -> Conexion -> abrir();
        //echo $this -> TiendaProductoDAO -> consultarReporte();
        $this -> Conexion -> ejecutar( $this -> TiendaProductoDAO -> consultarReporteProducto());
        $resList = array();
        while($res = $this -> Conexion -> extraer()){
            array_push($resList, new TiendaProducto("", $res[0], $res[1]));
        }
        $this -> Conexion -> cerrar();

        return $resList;
    }
    
}
?>
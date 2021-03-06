<?php 

require_once "Persistencia/Conexion.php";
require_once "Persistencia/ProductoDAO.php";

class Producto{
    private $idProducto;
    private $nombre;
    private $precio;
    private $ProductoDAO;
    private $Conexion;

    public function Producto($idProducto = "", $nombre = "", $precio = ""){
        $this -> idProducto = $idProducto;
        $this -> nombre = $nombre;
        $this -> precio = $precio;
        $this -> ProductoDAO = new ProductoDAO($idProducto, $nombre, $precio);
        $this -> Conexion = new Conexion();
    }
    /*
    *   Getters
    */
    public function getIdProducto(){
        return $this -> idProducto;
    }

    public function getNombre(){
        return $this -> nombre;
    }

    public function getPrecio(){
        return $this -> precio;
    }

    

    /*
    *   Setters
    */
    
    public function setIdProducto($idProducto){
        $this -> idProducto = $idProducto;
    }

    public function setNombre($nombre){
        $this -> nombre = $nombre;
    }

    public function setPrecio($precio){
        $this -> precio = $precio;
    }
    /* 
    *   methods
    */

    public function getAll(){
        $this -> Conexion -> abrir();
        $this -> Conexion -> ejecutar( $this -> ProductoDAO -> getAll());
        $resList = array();
        while($res = $this -> Conexion -> extraer()){
            array_push($resList, new Producto($res[0], $res[1]));
        }
        $this -> Conexion -> cerrar();

        return $resList;
    }

    
    public function getInfo(){
        $this -> Conexion -> abrir();
        $this -> Conexion -> ejecutar($this -> ProductoDAO -> getInfo());
        $res = $this -> Conexion -> extraer();
        $this -> nombre = $res[1];
        $this -> precio = $res[2];
        $this -> Conexion -> cerrar();
    }

    public function insertar(){
        $this -> Conexion -> abrir();
        $this -> Conexion -> ejecutar( $this -> ProductoDAO -> insertar());
        $res = $this -> Conexion -> filasAfectadas();
        $this -> Conexion -> cerrar();
        return $res;
    }

    /*
     * Función que busca por paginación, filtro de palabra y devuelve la información en un array
     */
    public function filtroPaginado($str, $pag, $cant){
        $this -> Conexion -> abrir();
        $this -> Conexion -> ejecutar( $this -> ProductoDAO -> filtroPaginado($str, $pag, $cant));
        $resList = Array();
        while($res = $this -> Conexion -> extraer()){
            array_push($resList, $res);
        }
        $this -> Conexion -> cerrar();

        return $resList;
    }

    /*
     * Busca la cantidad de registros con filtro de palabra
     */
    public function filtroCantidad($str){
        $this -> Conexion -> abrir();
        $this -> Conexion -> ejecutar( $this -> ProductoDAO -> filtroCantidad($str));
        $res = $this -> Conexion -> extraer();
        $this -> Conexion -> cerrar();

        return $res[0];
    }
    
}
?>
<?php 

require_once "Persistencia/Conexion.php";
require_once "Persistencia/TiendaDAO.php";

class Tienda{
    private $idTienda;
    private $nombre;
    private $direccion;
    private $TiendaDAO;
    private $Conexion;

    public function Tienda($idTienda = "", $nombre = "", $direccion = ""){
        $this -> idTienda = $idTienda;
        $this -> nombre = $nombre;
        $this -> direccion = $direccion;
        $this -> TiendaDAO = new TiendaDAO($idTienda, $nombre, $direccion);
        $this -> Conexion = new Conexion();
    }
    /*
    *   Getters
    */
    public function getIdTienda(){
        return $this -> idTienda;
    }

    public function getNombre(){
        return $this -> nombre;
    }

    public function getDireccion(){
        return $this -> direccion;
    }

    

    /*
    *   Setters
    */
    
    public function setIdTienda($idTienda){
        $this -> idTienda = $idTienda;
    }

    public function setNombre($nombre){
        $this -> nombre = $nombre;
    }

    public function setDireccion($direccion){
        $this -> direccion = $direccion;
    }
    /* 
    *   methods
    */
    public function insertar(){
        $this -> Conexion -> abrir();
        $this -> Conexion -> ejecutar( $this -> TiendaDAO -> insertar());
        $res = $this -> Conexion -> filasAfectadas();
        $this -> Conexion -> cerrar();
        return $res;
    }
    
    /*
     * Función que busca por paginación, filtro de palabra y devuelve la información en un array
     */
    public function filtroPaginado($str, $pag, $cant){
        $this -> Conexion -> abrir();
        $this -> Conexion -> ejecutar( $this -> TiendaDAO -> filtroPaginado($str, $pag, $cant));
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
        $this -> Conexion -> ejecutar( $this -> TiendaDAO -> filtroCantidad($str));
        $res = $this -> Conexion -> extraer();
        $this -> Conexion -> cerrar();

        return $res[0];
    }
    
}
?>
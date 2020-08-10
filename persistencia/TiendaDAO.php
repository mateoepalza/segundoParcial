<?php 

require_once "Persistencia/Conexion.php";
require_once "Persistencia/TiendaDAO.php";

class TiendaDAO{
    private $idTienda;
    private $nombre;
    private $direccion;

    public function TiendaDAO($idTienda = "", $nombre = "", $direccion = ""){
        $this -> idTienda = $idTienda;
        $this -> nombre = $nombre;
        $this -> direccion = $direccion;
    }
    
    /* 
    *   methods
    */

    public function insertar(){
        return "INSERT INTO Tienda (nombre, direccion) 
                VALUES ('" . $this -> nombre ."', '" . $this -> direccion  ."')";
    }
    
    public function filtroPaginado($str, $pag, $cant){
        return "SELECT idTienda, nombre, direccion 
                FROM Tienda 
                WHERE nombre like '%". $str ."%' OR direccion like '%" . $str . "%'
                LIMIT " . (($pag - 1)*$cant) . ", " . $cant;
    }

    public function filtroCantidad($str){
        return "SELECT count(*) 
                FROM Tienda
                WHERE nombre like '%". $str ."%'  OR direccion like '%" . $str . "%'";
    }
}
?>
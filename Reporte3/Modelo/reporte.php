<?php
class Modelo{


    private $Modelo;
    private $db;
    private $index;

    public function __construct(){
        $this->Modelo = array();
        try {
            $this->db = new PDO('mysql:host=localhost;dbname=digital', 'root', '');
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Error de conexión a la base de datos: " . $e->getMessage());
        }
    }


    public function mostrar($tabla, $condicion){
        $consul="select * from ".$tabla." where ".$condicion.";";
        $resu=$this->db->query($consul);
        while($filas = $resu->FETCHALL(PDO::FETCH_ASSOC)) {
            $this->index[]=$filas;
            return $this->index;
        }
        
    }
    
}

?>
 
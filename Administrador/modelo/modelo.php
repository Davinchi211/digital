<?php

//clase modelo, en este caso, una sola clase modelo puede funcionar para todas las tablas
class Modelo{
    private $modelo;
    private $db;

    public function __construct(){
        $this->modelo = array();
        $this->db = new PDO('mysql:host=localhost;dbname=digital',"root","");
    }


    public function insertar($tabla, $data){
        $consulta = "insert into ".$tabla." values(null," .$data. ")";
        $resultado=$this->db->query($consulta);
        if($resultado){
            return true;
        }else{
            return false;
        }
    }

    public function mostrar($tabla){
        $consul="select * from ".$tabla;
        $resu=$this->db->query($consul);
        
        while($filas = $resu->FETCHALL(PDO::FETCH_ASSOC)) {
            $this->index[]=$filas;
            return $this->index;
        }  
    }

    public function conteoTotal($tabla){
        $consul="select count(*) as conteo from ".$tabla;
        $resu=$this->db->query($consul);
        $resultado = $resu->fetch(PDO::FETCH_ASSOC);

        return $resultado['conteo'];
    }


    public function actualizar($tabla, $data, $condicion){
        $consulta="update ".$tabla." set ". $data ." where ".$condicion;
        $resultado=$this->db->query($consulta);
        if ($resultado) {
          return true;
        }
        else {
            return false;
        }
    }

    public function eliminar($tabla, $condicion){
        $eli="delete from ".$tabla." where ".$condicion;
        $res=$this->db->query($eli);
        if ($res) {
            return true;
        }
        else {
            return false;
        }
    }
 
}

?>
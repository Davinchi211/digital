<?php
class Modelo{
    private $Modelo;
    private $db;
    private $index;


    public function __construct(){
        $this->Modelo = array();
        $this->db=new PDO('mysql:host=localhost;dbname=digital',"root","");
    }
 
    public function insertar($tabla, $data){
        $consulta="insert into ".$tabla." values(". $data .")";
        $resultado=$this->db->query($consulta);
        if ($resultado) {
            return true;
        }
        else {
            return false;
        }
    }

    public function mostrar($tabla, $condicion){
        $consul="select * from ".$tabla." where ".$condicion.";";
        $resu=$this->db->query($consul);
        while($filas = $resu->FETCHALL(PDO::FETCH_ASSOC)) {
            $this->index[]=$filas;
        }
        
        return $this->index;
    }

    public function actualizar($tabla, $data, $condicion){
        $consulta="update ".$tabla." set ". $data ." where ".$condicion;
        echo "consulta= " . $consulta;
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
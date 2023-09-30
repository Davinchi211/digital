<?php
    require_once("Modelo/materia.php");
    
    class materiaController{
        private $model;
        function __construct(){
        $this->model=new Modelo();
        }
    
    static function index(){
        $materia = new Modelo();
        $dato=$materia->mostrar("materia","1");
        require_once("Vista/materia/index.php");
    }
        // INSERTAR
    static function nuevo(){
        require_once("vista/materia/nuevo.php");
        require_once("Vista/materia/index.php");
    }

//aqui nos quedamos
    static function guardar(){
        $idmateria = $_REQUEST['idMateria'];
        $nombre = $_REQUEST['nombre'];
        $descripcion = $_REQUEST['descripcion'];
        

        $data = "".$idmateria.",'".$nombre."','".$descripcion."'";

        $materia = new Modelo();
        $dato = $materia->insertar("materia",$data);
        header("location:".urlmateria);
        }

        static function editar(){
            $id=$_REQUEST['id'];
            $materia = new Modelo();
            $dato=$materia->mostrar("materia","id=".$id);
            require_once("vista/materia/editar.php");
        }

        static function canceler(){
            header("location:".urlmateria);
        }


        static function update(){
            $idMateria = $_REQUEST['idMateria'];
            $nombre = $_REQUEST['nombre'];
            $descripcion = $_REQUEST['descripcion'];
            


            $data = "nombre='$nombre', descripcion='$descripcion'";
            $condicion = "id=".$idMateria;
            $materia = new Modelo();
            $dato = $materia->actualizar("materia",$data,$condicion);
            header("location:".urlmateria);
        }



 // ELIMINAR
        static function eliminar(){
            $idMateria = $_REQUEST['id'];
            $condicion = "id=".$idMateria;
            $materia = new Modelo();
            $dato = $materia->eliminar("materia",$condicion);
            header("location:".urlmateria);
        }
    }



    



?>
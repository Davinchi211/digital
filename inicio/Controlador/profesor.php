<?php
    require_once("Modelo/profesor.php");
    
    class profesorController{
        private $model;
        function __construct(){
        $this->model=new Modelo();
        }
    
    static function index(){
        $estudiante = new Modelo();
        $dato=$estudiante->mostrar("maestro","1");
        require_once("Vista/profesor/index.php");
    }
        // INSERTAR
    static function nuevo(){
        require_once("vista/profesor/nuevo.php");
        require_once("Vista/profesor/index.php");
    }

//aqui nos quedamos
    static function guardar(){
        $idProfesor = $_REQUEST['idProfesor'];
        $nombre = $_REQUEST['nombre'];
        $apellido = $_REQUEST['apellido'];
        $genero = $_REQUEST['genero'];

        $data = "".$idProfesor.",'".$nombre."','".$apellido."','".$genero."'";

        $profesor = new Modelo();
        $dato = $profesor->insertar("maestro",$data);
        header("location:".urlprofesor);
        }

        static function editar(){
            $id=$_REQUEST['id'];
            $estudiante = new Modelo();
            $dato=$estudiante->mostrar("maestro","id=".$id);
            require_once("vista/profesor/editar.php");
        }

        static function canceler(){
            header("location:".urlprofesor);
        }


        static function update(){
            $idProfesor = $_REQUEST['idProfesor'];
            $nombre = $_REQUEST['nombre'];
            $apellido = $_REQUEST['apellido'];
            $genero = $_REQUEST['genero'];


            $data = "nombre = '$nombre', apellido='$apellido', genero='$genero'";
            $condicion = "ID=".$idProfesor;
            $profesor = new Modelo();
            $dato = $profesor->actualizar("maestro",$data,$condicion);
            header("location:".urlprofesor);
        }



 // ELIMINAR
        static function eliminar(){
            $idProfesor = $_REQUEST['id'];
            $condicion = "id=".$idProfesor;
            $profesor = new Modelo();
            $dato = $profesor->eliminar("maestro",$condicion);
            header("location:".urlprofesor);
        }
    }



    



?>
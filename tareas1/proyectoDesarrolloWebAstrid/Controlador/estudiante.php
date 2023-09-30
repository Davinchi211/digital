<?php
    require_once("Modelo/estudiante.php");
    
    class estudianteController{
        private $model;
        function __construct(){
        $this->model=new Modelo();
        }
    
    static function index(){
        $estudiante = new Modelo();
        $dato=$estudiante->mostrar("estudiantes","1");
        require_once("Vista/estudiante/index.php");
    }
        // INSERTAR
    static function nuevo(){
        require_once("vista/estudiante/nuevo.php");
        require_once("Vista/estudiante/index.php");
    }

    static function guardar(){
        $nombre = $_REQUEST['nombre'];
        $apellido = $_REQUEST['apellido'];
        $fecha = $_REQUEST['fechanac'];

        $data = "'".$nombre."','".$apellido."','".$fecha."'";
        $estudiante = new Modelo();
        $dato = $estudiante->insertar("estudiantes",$data);
        header("location:".urlestudiante);
        }

        static function editar(){
            $id=$_REQUEST['id'];
            $estudiante = new Modelo();
            $dato=$estudiante->mostrar("estudiantes","ID=".$id);
            require_once("vista/estudiante/editar.php");
        }


        static function update(){
            $id = $_REQUEST['id'];
            $nombre = $_REQUEST['nombre'];
            $apellido = $_REQUEST['apellido'];
            $fecha = $_REQUEST['fechanac'];


            $data = "Nombres = '$nombre', Apellidos='$apellido', FechaNacimiento='$fecha'";
            $condicion = "ID=".$id;
            $estudiante = new Modelo();
            $dato = $estudiante->actualizar("estudiantes",$data,$condicion);
            header("location:".urlestudiante);
        }



 // ELIMINAR
        static function eliminar(){
            $id = $_REQUEST['id'];
            $condicion = "ID=".$id;
            $estudiante = new Modelo();
            $dato = $estudiante->eliminar("estudiantes",$condicion);
            header("location:".urlestudiante);
        }
    }



    



?>
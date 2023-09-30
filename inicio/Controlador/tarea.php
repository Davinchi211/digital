<?php
    require_once("Modelo/tarea.php");
    
    class tareaController{
        private $model;
        function __construct(){
        $this->model=new Modelo();
        }
    
    static function index(){
        $estudiante = new Modelo();
        $dato=$estudiante->mostrar("tarea","1");
        require_once("Vista/tarea/index.php");
    }
        // INSERTAR
    static function nuevo(){
        require_once("vista/tarea/nuevo.php");
        require_once("Vista/tarea/index.php");
    }

//aqui nos quedamos
    static function guardar(){
        $idTarea = $_REQUEST['idTarea'];
        $nombre = $_REQUEST['nombre'];
        $descripcion = $_REQUEST['descripcion'];
        $fecha= $_REQUEST['fecha'];
        $puntos = $_REQUEST['puntos'];
        $materia= $_REQUEST['materia'];
        $maestro = $_REQUEST['maestro'];

        $data = "".$idTarea.",'".$nombre."','".$descripcion."','".$fecha."','".$puntos."','".$materia."','".$maestro."'";

        $tarea = new Modelo();
        $dato = $tarea->insertar("tarea",$data);
        header("location:".urltarea);
        }

        static function editar(){
            $id=$_REQUEST['id'];
            $tarea = new Modelo();
            $dato=$tarea->mostrar("tarea","id_tarea=".$id);
            require_once("vista/tarea/editar.php");
        }

        static function canceler(){
            header("location:".urltarea);
        }


        static function update(){
            $idTarea = $_REQUEST['idTarea'];
            $nombre = $_REQUEST['nombre'];
            $descripcion = $_REQUEST['descripcion'];
            $fecha= $_REQUEST['fecha'];
            $puntos = $_REQUEST['puntos'];
            $materia= $_REQUEST['materia'];
            $maestro = $_REQUEST['maestro'];

            $data = "nombre = '$nombre', descripcion='$descripcion', fecha='$fecha' , puntos='$puntos', materia='$materia', maestro='$maestro'";
            $condicion = "id_tarea=".$idTarea;
            $tarea = new Modelo();
            $dato = $tarea->actualizar("tarea",$data,$condicion);
            header("location:".urltarea);
        }



 // ELIMINAR
        static function eliminar(){
            $idMateria = $_REQUEST['id'];
            $condicion = "id_tarea=".$idMateria;
            $tarea = new Modelo();
            $dato = $tarea->eliminar("tarea",$condicion);
            header("location:".urltarea);
        }
    }



    



?>
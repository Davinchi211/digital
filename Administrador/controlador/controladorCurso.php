<?php
    require_once("modelo/modelo.php");

    class ControladorCurso{
        private $model;
        function __construct(){
        $this->model=new Modelo();
        }

        //función que muestra los datos
        static function index(){
            $alumno = new Modelo();
            $dato=$alumno->mostrar("curso");
            require_once("vista/cursos/indexCurso.php");
        }

        //este sirve para mostrar los cursos en la caja de seleccion <select>
        static function index2(){
            $alumno = new Modelo();
            $dato=$alumno->mostrar("curso");
            return $dato;
        }
        //mostrar los ususarios 
        static function index3(){
            $usuario = new Modelo();
            $data = $usuario->mostrar("users");
            return $data;
        }

        static function resultadoConteo(){
            $resultado = new Modelo();
            $dato = $resultado->conteoTotal("curso");
            return $dato;
        }

        static function nuevo(){
            require_once("vista/agregarCurso.php");
        }

        static function guardar(){
            $nombre = $_REQUEST['curso'];
            $descripcion = $_REQUEST['descripcion'];
            $fecha = $_REQUEST['fecha'];
            $data = "'".$nombre."','".$descripcion."','".$fecha."'";
            $curso = new Modelo();
            $dato = $curso->insertar("curso",$data);
            header("location: Curso.php");
        }

        static function editar(){
            $id = $_REQUEST['cursoId'];
            $nombre = $_REQUEST['cursoNombre'];
            $descripcion = $_REQUEST['cursoDescripcion'];
            $fecha = $_REQUEST['cursoFecha'];
            $data = "nombre_curso='".$nombre."', descripcion='".$descripcion."', fecha_ini='".$fecha."'";
            $condicion = "id_curso=".$id;
            $curso = new Modelo();
            $dato = $curso->actualizar("curso",$data,$condicion);
            header("location: Curso.php");
        }

        static function eliminar(){
            $id = $_REQUEST['cursoID'];
            $condicion = "id_curso=".$id;
            $curso = new Modelo();
            $dato = $curso->eliminar("curso",$condicion);
            header("location: curso.php");
        }
    }

?>
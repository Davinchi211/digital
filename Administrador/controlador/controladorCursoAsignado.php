<?php
    require_once("modelo/modelo.php");

    class ControladorCursoAsignado{
        private $model;
        function __construct(){
        $this->model=new Modelo();
        }

        //función que muestra los datos
        static function index(){
            $curso = new Modelo();
            $dato=$curso->mostrar("cursoasignado");
            require_once("vista/cursoAsignado/indexCursoAsignado.php");
        }

        static function resultadoConteo(){
            $resultado = new Modelo();
            $dato = $resultado->conteoTotal("cursoAsignado");
            return $dato;
        }

        static function nuevo(){
            require_once("/administrador/vista/agregarCursoAsignado.php");
        }

        static function guardar(){
            $usuario = $_REQUEST['usuario'];
            $curso = $_REQUEST['curso'];
            $data = $usuario.",".$curso;
            $curso = new Modelo();
            $dato = $curso->insertar("cursoasignado",$data);
            header("location: CursoAsignado.php");
        }

        static function editar(){
            $id = $_REQUEST['id_asignacion'];
            $usuario = $_REQUEST['usuario'];
            $curso = $_REQUEST['curso'];
            $data = "id_user=".$usuario.", id_curso=".$curso;
            $condicion = "id_curso_asignado=".$id;
            $curso = new Modelo();
            $dato = $curso->actualizar("cursoasignado",$data,$condicion);
            header("location: CursoAsignado.php");
        }

        static function eliminar(){
            $id = $_REQUEST['ID'];
            $condicion = "id_curso_asignado=".$id;
            $curso = new Modelo();
            $dato = $curso->eliminar("cursoAsignado",$condicion);
            header("location: cursoAsignado.php");
        }
    }

?>
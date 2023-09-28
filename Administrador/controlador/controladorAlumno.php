<?php
//archivo para el controlador alumno
    require_once("modelo/modelo.php");

    class ControladorAlumno{
        private $model;
        function __construct(){
        $this->model=new Modelo();
        }

        //función que muestra los datos
        static function index(){
            $alumno = new Modelo();
            $dato=$alumno->mostrar("alumno");
            require_once("vista/alumnos/indexAlumno.php");
        }

        //muestra el conteo de registros totales
        static function resultadoConteo(){
            $resultado = new Modelo();
            $dato = $resultado->conteoTotal("alumno");
            return $dato;
        }


        static function guardar(){
            $nombre = $_REQUEST['nombre'];
            $apellido = $_REQUEST['apellido'];
            $correo = $_REQUEST['correo'];
            $nacimiento = $_REQUEST['nacimiento'];
            $id_curso = $_REQUEST['id_curso'];
            $estado = $_REQUEST['estado_asistencia'];
            $data = "'".$nombre."','".$apellido."','".$correo."','".$nacimiento."','".$id_curso."','".$estado."'";
            $alumno = new Modelo();
            $dato = $alumno->insertar("alumno",$data);
            header("location: Alumno.php");
        }


        static function editar(){
            $id = $_REQUEST['alumnoId'];
            $nombre = $_REQUEST['alumnoNombre'];
            $apellido = $_REQUEST['alumnoApellido'];
            $correo = $_REQUEST['alumnoCorreo'];
            $nac = $_REQUEST['alumnoNac'];
            $asig = $_REQUEST['alumnoAsig'];
            $estado = $_REQUEST['alumnoEstado'];
            $data = "nombre='".$nombre."', apellido='".$apellido."', correo='".$correo."', fecha_nac='".$nac."
                    ', id_curso_asignado=".$asig.", estado_asistencia=".$estado;
            $condicion = "id_alumno=".$id;
            $alumno = new Modelo();
            $dato = $alumno->actualizar("alumno",$data,$condicion);
            header("location: Alumno.php");
        }

        static function eliminar(){
            $id = $_REQUEST['alumnoID'];
            $condicion = "id_alumno=".$id;
            $alumno = new Modelo();
            $dato = $alumno->eliminar("alumno",$condicion);
            header("location: Alumno.php");
        }

    }

?>
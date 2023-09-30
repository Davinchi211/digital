<?php

    require_once("Modelo/reporte.php");

    class reporteController {
        private $model;

        function __construct(){
            $this->model = new Modelo();
        }

        static function index(){
            $controller = new reporteController(); // Creamos una instancia del controlador
            $dato = $controller->model->mostrar("reporte_asistencia","1");
            require_once("Vista/index.php");
        }
}
 
?>


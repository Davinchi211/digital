<?php
require_once("config.php");
require_once("Controlador/reporte.php");
if(isset($_GET['m'])):
    $metodo = $_GET['m'];
    if(method_exists("reporteController",$metodo)):
        reporteController::{$metodo}();
    endif;
else:
    reporteController::index();
endif;
?>

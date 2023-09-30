<?php
require_once("config.php");
require_once("Controlador/estudiante.php");
if(isset($_GET['m'])):
    $metodo = $_GET['m'];
    if(method_exists("estudianteController",$metodo)):
        estudianteController::{$metodo}();
    endif;
else:
    estudianteController::index();
endif;
?>

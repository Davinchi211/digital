<?php
require_once("config.php");
require_once("Controlador/materia.php");
if(isset($_GET['m'])):
    $metodo = $_GET['m'];
    if(method_exists("materiaController",$metodo)):
        materiaController::{$metodo}();
    endif;
else:
    materiaController::index();
endif;
?>

<?php
require_once("config.php");
require_once("Controlador/profesor.php");
if(isset($_GET['m'])):
    $metodo = $_GET['m'];
    if(method_exists("profesorController",$metodo)):
        profesorController::{$metodo}();
    endif;
else:
    profesorController::index();
endif;
?>

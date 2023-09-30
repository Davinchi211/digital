<?php
require_once("config.php");
require_once("Controlador/tarea.php");
if(isset($_GET['m'])):
    $metodo = $_GET['m'];
    if(method_exists("tareaController",$metodo)):
        tareaController::{$metodo}();
    endif;
else:
    tareaController::index();
endif;
?>

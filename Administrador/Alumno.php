<?php
require_once("config.php");
require_once("controlador/controladorAlumno.php");
if(isset($_GET['m'])):
    $metodo = $_GET['m'];
    if(method_exists("ControladorAlumno",$metodo)):
        ControladorAlumno::{$metodo}();
    endif;
else:
    ControladorAlumno::index();
endif;
?>
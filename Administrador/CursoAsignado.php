<?php
require_once("config.php");
require_once("controlador/ControladorCursoAsignado.php");
if(isset($_GET['m'])):
    $metodo = $_GET['m'];
    if(method_exists("ControladorCursoAsignado",$metodo)):
        ControladorCursoAsignado::{$metodo}();
    endif;
else:
    ControladorCursoAsignado::index();
endif;
<?php
require_once("config.php");
require_once("controlador/controladorCurso.php");
if(isset($_GET['m'])):
    $metodo = $_GET['m'];
    if(method_exists("ControladorCurso",$metodo)):
        ControladorCurso::{$metodo}();
    endif;
else:
    ControladorCurso::index();
endif;
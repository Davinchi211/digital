<?php
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }    
    $con = connection();
    //Valida al presionar el botón
    if($_SERVER["REQUEST_METHOD"]== "POST" && isset($_POST["g_asistencia"])){
        //variable de sesion para el botón
        $_SESSION["g_asistencia"] = true;

        //Guardar el valor del id por c/alumno
        //según el valor del check
        $alumno_asis = $_POST['asistencia'];

        //Recorrer el listado por el check del id_alumno y actualizar el estado_asistencia
        foreach($alumno_asis as $id_alumno){
            $sql3 = "UPDATE alumno SET estado_asistencia='1' WHERE id_alumno='$id_alumno'";
            if ($con->query($sql3) !== TRUE) {
                echo "Error al actualizar la asistencia: " . $con->error;
            }
        }

        //Guardar asistencia 
        $username = "prueba_usuario"; //se utiliza sesion para capturar al usuario
        $fecha = date("Y-m-d");
        foreach($alumno_asis as $id_alumno){
            $sql4 = "INSERT INTO asistencia (id_alumno,fecha_asistencia,user) VALUES ('$id_alumno','$fecha','$username')";
            $pr = $con->prepare($sql4);
            $pr->execute();
        }
    }
    /*se usará en listado asistencia 
    $orinDate = date_create($_POST['fecha_cont']);
    $fech_cont = date_format($orinDate, 'Y-m-d'); */
?>
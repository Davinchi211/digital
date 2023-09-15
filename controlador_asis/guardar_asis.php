<?php
    $con = connection();
    //Valida el botón
    if(isset($_POST['g_asistencia'])){
        //Guardar el valor del id por c/alumno
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
            if ($con->query($sql4) !== TRUE) {
                echo "Error al registrar la asistencia: " . $con->error;
            }
        }

        //LISTAR ALUMNOS PARA EL REPORTE


    }
    /*se usará en listado asistencia 
    $orinDate = date_create($_POST['fecha_cont']);
    $fech_cont = date_format($orinDate, 'Y-m-d'); */
    mysqli_close($con);

?>
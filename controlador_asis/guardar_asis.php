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
        //según si el check está activado check
        $alumno_asis = $_POST['asistencia'];

        //Recorrer el listado por el check del id_alumno y actualizar el estado_asistencia
        foreach($alumno_asis as $id_alumno){
            $sql3 = "UPDATE alumno SET estado_asistencia='1' WHERE id_alumno=?";
            $pr3 = $con->prepare($sql3);
            $pr3->bind_param("s",$id_alumno);
            $pr3->execute();
        }

        //Guardar asistencia 
        $user = "user1";
        $fecha = date("Y-m-d");
        //recorrer el array de los marcados
        foreach($alumno_asis as $id_alumno){
            //Agregar alumnos presentes, con check
            $sql4 = "INSERT INTO asistencia (id_alumno,fecha_asistencia,user) VALUES (?,?,?)";
            $pr = $con->prepare($sql4);
            $pr->bind_param("iss",$id_alumno,$fecha,$user);
            $pr->execute();
        }

        //Agregar alumnos ausentes, sin check
        $sql6 = "INSERT INTO asistencia (id_alumno,fecha_asistencia, user)
        SELECT id_alumno, ?, ?
        FROM alumno
        WHERE estado_asistencia = '0'";
        $pr2 = $con->prepare($sql6);
        $pr2->bind_param("ss",$fecha,$user);
        $pr2->execute();

    }
    /*se usará en listado asistencia 
    $orinDate = date_create($_POST['fecha_cont']);
    $fech_cont = date_format($orinDate, 'Y-m-d'); */
?>
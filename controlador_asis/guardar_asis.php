<?php
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }    
    $con = connection();
    //Valida al presionar el botón
    if($_SERVER["REQUEST_METHOD"]== "POST" && isset($_POST["g_asistencia"])){
        //variable de sesion para el botón
        $_SESSION["g_asistencia"] = true;
        $curso_seleccionado = $_SESSION['curso_sel'];

        if(isset($_POST['asistencia'])){
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
        $user = $_SESSION['first_name'];
        $fecha = date("Y-m-d");
        //recorrer el array de los marcados
        foreach($alumno_asis as $id_alumno){
            //Agregar alumnos presentes, con check
            $sql4 = "INSERT INTO asistencia (id_alumno,fecha_asistencia,user) VALUES (?,?,?)";
            $pr = $con->prepare($sql4);
            $pr->bind_param("iss",$id_alumno,$fecha,$user);
            $pr->execute();
        }

        //captura los id para compararlos con los no marcados
        $id_valida = "SELECT alumno.id_alumno
        FROM alumno
        INNER JOIN curso ON curso.id_curso = alumno.id_curso_asignado
        WHERE curso.nombre_curso = ?";
        $prepid = $con->prepare($id_valida);
        $prepid->bind_param("s",$curso_seleccionado);
        if($prepid->execute()){
            $querid = $prepid->get_result();
            while($r=$querid->fetch_assoc()){
                $todosid[] =$r['id_alumno'];
            }
        }

        //ya valida todos los id
        $alumno_ausente = array_diff($todosid, $alumno_asis);
        foreach($alumno_ausente as $id_alumno_aus){
            //Agregar alumnos ausentes, sin check
            $sql6 = "INSERT INTO asistencia (id_alumno,fecha_asistencia, user) VALUES (?,?,?)";
            $pr2 = $con->prepare($sql6);
            $pr2->bind_param("iss",$id_alumno_aus,$fecha,$user);
            $pr2->execute();
        }
    }
 }
?>
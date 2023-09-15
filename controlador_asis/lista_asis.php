<?php

        if(isset($_POST["n_asistencia"])){
            session_destroy();
            session_start();
        }
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }          
        if (isset($_SESSION["g_asistencia"]) && $_SESSION["g_asistencia"] === true) {
        //validando el curso seleccionado
        //valor guardado en la session
        $fecha = date('Y-m-d');
        $curso_seleccionado = $_SESSION['curso_sel'];
        //LISTAR ALUMNOS PARA EL REPORTE
        $sql5 = "SELECT
        alumno.id_alumno, alumno.nombre, alumno.apellido, curso.nombre_curso, alumno.estado_asistencia,
        asistencia.fecha_asistencia
        FROM alumno
        INNER JOIN curso ON alumno.id_curso_asignado = curso.id_curso
        INNER JOIN asistencia ON alumno.id_alumno = asistencia.id_alumno
        WHERE fecha_asistencia=? AND nombre_curso = ?";

        //preparar la consulta
        $prepsql = $con->prepare($sql5);
        $prepsql->bind_param("ss",$fecha,$curso_seleccionado);
        //ejecutando la consulta
        if($prepsql->execute()){
            $query_consulta_asistentes=$prepsql->get_result();
            $num_asistentes = mysqli_num_rows($query_consulta_asistentes);
        }else{
            $prepsql->error;
        }
        while($row3=$query_consulta_asistentes->fetch_assoc()){
            echo "<tr>";
            echo "<td>".$row3['id_alumno']."</td>";
            echo "<td>".$row3['nombre']." ".$row3['apellido']."</td>";
            echo "<td>".$row3['nombre_curso']."</td>";
            echo "<td>".$row3['estado_asistencia']."</td>";
            echo "<td>".$row3['fecha_asistencia']."</td>";
            echo "</tr>";
        }
            echo "<tr>";
            echo "<td colspan='5' rowspan='2'><h6><i><sub>PRESENTES: ".$num_asistentes."</sub></i></h6></td>";
            echo "</tr>";
        $sql5 = "SELECT
        alumno.id_alumno, alumno.nombre, alumno.apellido, curso.nombre_curso, alumno.estado_asistencia,
        asistencia.fecha_asistencia
        FROM alumno
        INNER JOIN curso ON alumno.id_curso_asignado = curso.id_curso
        INNER JOIN asistencia ON alumno.id_alumno = asistencia.id_alumno
        WHERE fecha_asistencia=? AND nombre_curso = ? AND estado_asistencia='0'";

    }
?>
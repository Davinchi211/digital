<?php
        if(isset($_POST["n_asistencia"])){
                session_destroy();
                session_start();
        }
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }          
        //valida al presionar el botón en la sesión
        if (isset($_SESSION["g_asistencia"]) && $_SESSION["g_asistencia"] === true) {
        //validando el curso seleccionado
        //valor guardado en la session
        $fecha = date('Y-m-d');
        $curso_seleccionado = $_SESSION['curso_sel'];

        //LISTAR ALUMNOS PRESENTES----------------------------------
        $sql5 = "SELECT
        alumno.id_alumno, alumno.nombre, alumno.apellido, curso.nombre_curso, alumno.estado_asistencia,
        asistencia.fecha_asistencia, asistencia.user
        FROM alumno
        INNER JOIN curso ON alumno.id_curso_asignado = curso.id_curso
        INNER JOIN asistencia ON alumno.id_alumno = asistencia.id_alumno
        WHERE fecha_asistencia=? AND nombre_curso = ? AND estado_asistencia=?
        GROUP BY id_alumno";
        $est_asis=1;
        //preparar la consulta
        $prepsql = $con->prepare($sql5);
        //envía parámetro la fecha, y curso seleccionado evitando sql injection
        $prepsql->bind_param("ssi",$fecha,$curso_seleccionado,$est_asis);
        //ejecutando la consulta
        if($prepsql->execute()){
            //obtener el resultado para luego iterarlo
            $query_consulta_asistentes=$prepsql->get_result();
            $num_asistentes = mysqli_num_rows($query_consulta_asistentes);  
            $_SESSION['result_present'] = $query_consulta_asistentes;

            echo "<thead>";
            echo "<tr>";
            echo "<th class='col-xs'>ID ALUMNO</th>";
            echo "<th class='col-xs'>ALUMNO</th>";
            echo "<th class='col-xs'>CURSO</th>";
            echo "<th class='col-xs'>PRESENTE</th>";
            echo "<th class='col-xs'>FECHA DE ASISTENCIA</th>";
            echo "<th class='col-xs'>PROFESOR</th>";
            echo"</tr>";
            echo"</thead>";
        }else{
            $prepsql->error;
        }
        //ciclo para recorrer el resultado mostrando los campos
        echo "<tbody class='table-success'>";
        while($row3=$query_consulta_asistentes->fetch_assoc()){
            echo "<tr>";
            echo "<td>".$row3['id_alumno']."</td>";
            echo "<td>".$row3['nombre']." ".$row3['apellido']."</td>";
            echo "<td>".$row3['nombre_curso']."</td>";
            echo "<td>".$row3['estado_asistencia']."</td>";
            echo "<td>".$row3['fecha_asistencia']."</td>";
            echo "<td>".$row3['user']."</td>";
            echo "</tr>";
        }
            echo "<tr>";
            echo "<td colspan='6' rowspan='2'><h6><i><sub>PRESENTES: ".$num_asistentes."</sub></i></h6></td>";
            echo "</tr>";
            echo "<tr><tr>";
        
        //LISTADO DE ALUMNOS AUSENTES-----------------------------
        $estado_asis =0;
        //preparar la consulta y evitar sql injection
        $prep5 = $con->prepare($sql5);
        $prep5->bind_param("ssi",$fecha,$curso_seleccionado,$estado_asis);

        if($prep5->execute()){
            //obtener el resultado para luego iterarlo
            $query_ausentes=$prep5->get_result();
            $num_ausentes = mysqli_num_rows($query_ausentes);
            $_SESSION['result_ausent'] = $query_consulta_asistentes;
        }else{
            $prep5->error;
        }
        echo "<tbody class='table-danger'>";
        while($row4=$query_ausentes->fetch_assoc()){
            echo "<tr>";
            echo "<td>".$row4['id_alumno']."</td>";
            echo "<td>".$row4['nombre']." ".$row4['apellido']."</td>";
            echo "<td>".$row4['nombre_curso']."</td>";
            echo "<td>".$row4['estado_asistencia']."</td>";
            echo "<td>".$row4['fecha_asistencia']."</td>";
            echo "<td>".$row4['user']."</td>";
            echo "</tr>";
        }
            echo "<tr>";
            echo "<td colspan='6' rowspan='2'><h6><i><sub>AUSENTES: ".$num_ausentes."</sub></i></h6></td>";
            echo "</tr>";
    }
?>
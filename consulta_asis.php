<?php
 if(isset($_POST['select_curso'])){
    $sl_curso = $_POST['select-curso'];
    include('connect.php');
    $sql2 = "SELECT 
        alumno.id_alumno, alumno.nombre, alumno.apellido, alumno.correo,
        curso.nombre, asistencia.id_asistencia, asistencia.estado_asistencia
            FROM asistencia
            INNER JOIN alumno ON asistencia.id_alumno = alumno.id_alumno
            INNER JOIN curso ON asistencia.id_curso = curso.id_curso
            ORDER BY alumno.nombre ASC
            WHERE curso.nombre_curso = ?";
    $query2 = mysqli_query($con, $sql2);
    

 }
?>
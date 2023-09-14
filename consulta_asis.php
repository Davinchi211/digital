<?php
    if(isset($_POST['select_curso'])){
    $sl_curso = $_POST['curso'];
    $con = connection();
    $sql2 = "SELECT 
    alumno.id_alumno, alumno.nombre, alumno.apellido, alumno.correo, curso.nombre_curso, 
    alumno.estado_asistencia
    FROM alumno
    LEFT JOIN curso ON alumno.id_curso_asignado = curso.id_curso
    WHERE curso.nombre_curso = ?";
    //preparando la consulta
    $prep = $con->prepare($sql2);
    $prep->bind_param("s",$sl_curso);
    //ejecutando la consulta
    if($prep->execute()){
        $query2 = $prep->get_result();
    }
    while($row2= $query2->fetch_assoc()){
        echo "<tr>";
        echo "<td>".$row2['id_alumno']."</td>";
        echo "<td>".$row2['nombre']."</td>";
        echo "<td>".$row2['apellido']."</td>";
        echo "<td>".$row2['correo']."</td>";
        echo "<td>".$row2['nombre_curso']."</td>";
        echo "<td>".$row2['estado_asistencia']."</td>";

        echo "</tr>";
}}
?>



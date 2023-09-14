<?php
    if(isset($_POST['select_curso'])){
    $sl_curso = $_POST['curso'];
    $con = connection();
    $sql2 = "SELECT 
    alumno.id_alumno, alumno.nombre, alumno.apellido, alumno.correo, curso.nombre_curso
    FROM alumno
    LEFT JOIN curso ON alumno.id_curso_asignado = curso.id_curso
    WHERE curso.nombre_curso = ?";
    //preparando la consulta
    $prep = $con->prepare($sql2);
    $prep->bind_param("s",$sl_curso);
    //ejecutando la consulta
    if($prep->execute()){
        $query2 = $prep->get_result();
        //$num_rows = mysqli_num_rows($query2);
        //echo "<tr>Alumnos: ".$num_rows. "</tr>";
    }
    while($row2= $query2->fetch_assoc()){
        echo "<tr>";
        echo "<td>".$row2['id_alumno']."</td>";
        echo "<td>".$row2['nombre']."</td>";
        echo "<td>".$row2['apellido']."</td>";
        echo "<td>".$row2['correo']."</td>";
        echo "<td>".$row2['nombre_curso']."</td>";
        echo "<td><input type='checkbox' name='asistencia[]' value='" . $row2['id_alumno'] . "' 
        style='width:25px; height: 25px; cursor:pointer; padding-left: 20px;'></td>";
        echo "</tr>";
}
}   
?>



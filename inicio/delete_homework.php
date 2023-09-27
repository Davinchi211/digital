<?php
$link = mysqli_connect("127.0.0.1", "root", "", "digital");

if($link == false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $tarea = $_POST["tarea"];


    $sql = "DELETE FROM tarea_maestro WHERE tarea = '$tarea'";

// Ejecutar la consulta SQL
if ($link->query($sql) === TRUE) {
    echo "Registro eliminado correctamente";
} else {
    echo "Error al eliminar el registro: " . $link->error;
}
  }

mysqli_close($link);

?>
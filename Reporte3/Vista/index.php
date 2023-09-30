<?php 
    require "vista/layout/header.php" 
?>

    <main role="main" class="container">
        <div class="row">
            <div class="col-12 text-center">
                </br>
                </br>
                <form action="prueba.php" method="post">
                    <div class="row">
                        <div class="col">
                            <input type="text" name="id_curso" id="filtroCurso" class="form-control" placeholder="ID del curso" required>
                        </div>
                        <div class="col">
                            <input type="text" name="id_alumno" id="filtroAlumno" class="form-control" placeholder="ID del Alumno" required>
                        </div>
                        <div class="col">
                            <span  class="btn btn-dark mb-2" id="filtrarButton">Filtrar</span>
                            <button type="submit" class="btn btn-danger mb-2">Descargar Reporte</button>
                        </div>

                    </div>
                </form>

                <div class="d-flex justify-content-center">
                    <div class="spinner-border d-none" role="status">
                        <span id="loaderFiltro" class="visually-hidden">  </span>
                    </div>
                </div>


                <h1 class="titulo_img"><span>Reportes</span></h1></br>
                <div class="table-responsive resultadoFiltro">
                     
                    <table class="table table-bordered" id="tablaReportes">
                        <tr class="bg-dark text-light">
                            <td>Id Curso</td>
                            <td>Curso</td>
                            <td>id Alumno</td>
                            <td>Nombre</td>
                            <td>Apellido</td>
                            <td>Estado de Asistencia </td>
                            <td>Fecha de Asistencia </td>
                        </tr>
                        <?php
                        if(!empty($dato))
                            foreach ($dato as $key => $value)
                                foreach ($value as $va ):
                                echo "<tr><td>".$va['id_curso']."</td><td>".$va['nombre_curso']."</td><td>".$va['id_alumno']."</td><td>".$va['nombre']."</td><td>".$va['apellido']."</td>
                                <td>".$va['estado_asistencia']."</td><td>".$va['fecha_asistencia']."</td>";
                                echo "</tr>";
                            endforeach;  
                        ?>       
                    </table>
                </div>
            </div>
        </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <script>

    // Obtén los elementos HTML necesarios
      const filtroCursoInput = document.getElementById("filtroCurso");
      const filtroAlumnoInput = document.getElementById("filtroAlumno");
      const filtrarButton = document.getElementById("filtrarButton");
      const tablaReportes = document.getElementById("tablaReportes").getElementsByTagName("tbody")[0];

      // Agrega un evento click al botón "Filtrar"
      filtrarButton.addEventListener("click", function() {
        // Obtiene los valores de los campos de entrada
        const filtroCurso = filtroCursoInput.value.trim();
        const filtroAlumno = filtroAlumnoInput.value.trim();

        // Recorre las filas de la tabla
        for (let i = 0; i < tablaReportes.rows.length; i++) {

            const fila = tablaReportes.rows[i];
            const idCursoColumna = fila.cells[0].textContent;
            const idAlumnoColumna = fila.cells[2].textContent;

            // Compara los valores de ID de curso y ID de alumno con los valores ingresados
            const cursoCoincide = filtroCurso === "" || idCursoColumna.includes(filtroCurso);
            const alumnoCoincide = filtroAlumno === "" || idAlumnoColumna.includes(filtroAlumno);

            // Muestra u oculta la fila según las condiciones de filtrado
            if (cursoCoincide && alumnoCoincide) {
                fila.style.display = "";
            } else {
                fila.style.display = "none";
            }
        }
    });
</script>



<?php require "vista/layout/footer.php" ?>

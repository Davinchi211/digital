<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="/digital/Administrador/vista/estilos/estilosAlumnos.css" />
  <title>Asignación</title>
</head>

<body>

  <?php
    include "agregarCursoAsignado.php";
    include "eliminarCursoAsignado.php";
    include "editarCursoAsignado.php";
  ?>
  <header>
    <i class="fa-solid fa-screwdriver-wrench" style="color: #ffffff;"></i>
    <h1>Administrador -> Asignacion de cursos</h1>
  </header>

  <section class="sec-boton">
    <a href="indexAdministrador.php"><button type="button" class="btn btn-primary btn-lg">Regresar</button></a>
    <button type="button" class="btn btn-primary btn-lg" data-bs-toggle="modal" data-bs-target="#agregarCursoAsignadoModal">
      Agregar nueva asignacion
    </button>

  </section>


  <!--sección de la tabla-->
  <section class="contenedor-main">
    <div class="tabla">
      <div class="filtro-tabla">
        <h3>Asignaciones</h3>
        <div class="filtro-busqueda">
          <input type="text" id="busqueda" name="busqueda-Curso" placeholder="Buscar por ID asignación">
          <button type="submit">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div>

      <div class="table-responsive">
        <table class="table table-striped table-hover table-bordered" id="miTabla">
          <thead class="table-dark">
            <tr>
              <th scope="col">Id Asignacion</th>
              <th scope="col">Id Usuario</th>
              <th scope="col">Id curso</th>
              <th scope="col">Operaciones</th>
            </tr>
          </thead>
          <tbody>
            
          <!--Se manda a llamar los campos de la tabla, justamente como se llaman en la BD-->
            <?php
              if(!empty($dato)){
                foreach ($dato as $key => $value)
                foreach ($value as $va ):
                echo "<tr><td>".$va['id_curso_asignado']."</td><td>".$va['id_user']."</td><td>".$va['id_curso']."</td>";
                echo "<td><a href='#' class='op-tabla' data-bs-toggle='modal' data-bs-target='#editarCursoAsignadoModal' data-id='".$va['id_curso_asignado']."' data-usuario='".$va['id_user']."' data-curso='".$va['id_curso']."'>";
                echo "<i class='fa-solid fa-pen' style='color: #e3e62d;'></i>";
                echo "</a>";
                echo "<a href='#' class='op-tabla delete-link' data-bs-toggle='modal' data-bs-target='#eliminarCursoAsignadoModal' data-id='".$va['id_curso_asignado']."'>";
                echo "<i class='fa-solid fa-square-xmark' style='color: #961313;'></i>";
                echo "</a></td>";
                echo "</tr>";
                endforeach;
              }
            ?>
          </tbody>
        </table>
      </div>

    </div>

    <!--Para ver cúantos cursos hay-->
    <div class="ver-total">
      <div class="card text-center bg-success text-white mb-3">
        <h3>Total de asignaciones</h3>
        <h4 class="display-4">
        <i class="fa-solid fa-book"></i> 
          <?php 
            $totalRegistros = ControladorCursoAsignado::resultadoConteo(); // Llama sin argumentos
            echo $totalRegistros;
          ?>
        </h4>
      </div>
      
      <!--Botón que enviará al archivo php para generar pdf-->
      <div class="card text-center bg-dark text-white mb-3">
        <a href="" class="get-pdf">
          <h4>
          <i class="fa-solid fa-file-pdf"></i>
            Generar PDF
          </h4>
        </a>
      </div>


    </div>
  </section>


  <!--Para íconos en Font Awesome-->
  <script src="https://kit.fontawesome.com/0c127780a5.js" crossorigin="anonymous"></script>

  <!--Para BOOSTRAP-->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>

  <!--Para llamar al scrip de filtro-->
  <script src="vista/cursoAsignado/filtro.js"></script>

  <!--Para que en el modal aparezcan los datos de la fila seleccionada-->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script>
    $(document).ready(function () {
        $('#eliminarCursoAsignadoModal').on('show.bs.modal', function (e) {
            var ID = $(e.relatedTarget).data('id');
            $(this).find('h4').text('¿Estás seguro de eliminar al curso con ID: ' + ID);
            $(this).find('#ID').val(ID);
        });
    });

    $(document).ready(function () {
        $('#editarCursoAsignadoModal').on('show.bs.modal', function (e) {
            var cursoID = $(e.relatedTarget).data('id');
            var usuario = $(e.relatedTarget).data('usuario');
            var curso = $(e.relatedTarget).data('curso');
            $(this).find('h4').text('Información completa del Curso con ID: ' + cursoID);
            $(this).find('#id_asignacion').val(cursoID);
            $(this).find('#usuario').val(usuario);
            $(this).find('#curso').text(curso);
        });
    });
  </script>

</body>

</html>
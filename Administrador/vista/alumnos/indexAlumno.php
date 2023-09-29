<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="/digital/Administrador/vista/estilos/estilosAlumnos.css" />
  <title>Alumnos</title>
  <link rel="icon" href="../public/img/backpack.svg">
</head>

<body>
  <?php
    include "agregarAlumno.php";
    include "eliminarAlumno.php";
    include "editarAlumno.php"
  ?>
  <header>
    <i class="fa-solid fa-screwdriver-wrench" style="color: #ffffff;"></i>
    <h1>Administrador -> Alumnos</h1>
  </header>

  <!--Botones principales-->
  <section class="sec-boton">
    <a href="indexAdministrador.php"><button type="button" class="btn btn-primary btn-lg">Regresar</button></a>
    <button type="button" class="btn btn-primary btn-lg" data-bs-toggle="modal" data-bs-target="#agregarAlumnoModal">
      Agregar nuevo alumno
    </button>
  </section>

  <!--Contenido principal-->
  <section class="contenedor-main">
    <div class="tabla">
      <div class="filtro-tabla">
        <h3>Alumnos</h3>
        <div class="filtro-busqueda">
          <input type="text" id="busqueda"  placeholder="Buscar por nombre">
          <button>
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div>

      <!--Tabla-->
      <div class="table-responsive">
        <table class="table table-striped table-hover table-bordered" id="miTabla">
          <thead class="table-dark">
            <tr>
              <th scope="col">Id</th>
              <th scope="col">Nombre</th>
              <th scope="col">Apellido</th>
              <th scope="col">Correo</th>
              <th scope="col">Operaciones</th>
            </tr>
          </thead>
          <tbody>

          <!--Llamada de datos de la BD-->
            <?php
            if (!empty($dato)) {
              foreach ($dato as $key => $value) {
                foreach ($value as $va) {
                  echo "<tr><td>" . $va['id_alumno'] . "</td><td>" . $va['nombre'] . "</td><td>" . $va['apellido'] . "</td>";
                  echo "<td>" . $va['correo']."</td>";
                  /*las variable como data-id, data-nombre, etc, son varibales declaradas que sirven para hacer 
                  operaciones con JS (final del archivo) y hacer que cuando se presione editar o eliminar de una celda, obtenga los datos de 
                  esta celda */
                  echo "<td><a href='#' class='op-tabla' data-bs-toggle='modal' data-bs-target='#editarAlumnoModal' data-id='".$va['id_alumno']."' data-nombre='".$va['nombre']."'
                        data-apellido='".$va['apellido']."' data-correo='".$va['correo']."' data-nac='".$va['fecha_nac']."' data-asig='".$va['id_curso_asignado']."' data-estado='".$va['estado_asistencia']."'>";
                  echo "<i class='fa-solid fa-pen' style='color: #e3e62d;'></i>";
                  echo "</a>";
                  echo "<a href='#' class='op-tabla delete-link' data-bs-toggle='modal' data-bs-target='#eliminarAlumnoModal' data-id='" . $va['id_alumno'] . "'>";
                  echo "<i class='fa-solid fa-square-xmark' style='color: #961313;'></i>";
                  echo "</a></td>";
                  echo "</tr>";
                }
              }
            }
            ?>
          </tbody>
        </table>
      </div>

    </div>

    <!--Ver total y general pdf-->
    <div class="ver-total">
      <div class="card text-center bg-success text-white mb-3">
        <h3>Total alumnos</h3>
        <h4 class="display-4">
          <i class="fas fa-user"></i>
          <?php
          $totalRegistros = ControladorAlumno::resultadoConteo(); // Llama sin argumentos
          echo $totalRegistros;
          ?>
        </h4>
      </div>

      <div class="card text-center bg-dark text-white mb-3">
        <a href="#" class="get-pdf">
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
  <script src="vista/Alumnos/filtro.js"></script>

  <!--Para que en el modal aparezcan los datos de la fila seleccionada-->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script>
    $(document).ready(function () {
        $('#eliminarAlumnoModal').on('show.bs.modal', function (e) {
            var alumnoID = $(e.relatedTarget).data('id');
            //sobreescribe en h4 y coloca la variable asignada en data-ID
            $(this).find('h4').text('¿Estás seguro de eliminar al alumno con ID: ' + alumnoID);
            $(this).find('#alumnoID').val(alumnoID);
        });
    });

    //se hace lo mismo, solo que aquí lleva más código porque abstrae todos los datos
    $(document).ready(function () {
        $('#editarAlumnoModal').on('show.bs.modal', function (e) {
            var alumnoID = $(e.relatedTarget).data('id');
            var alumnoNombre = $(e.relatedTarget).data('nombre');
            var alumnoApellido = $(e.relatedTarget).data('apellido');
            var alumnoCorreo = $(e.relatedTarget).data('correo');
            var alumnoNac = $(e.relatedTarget).data('nac');
            var alumnoAsig = $(e.relatedTarget).data('asig');
            var alumnoEstado = $(e.relatedTarget).data('estado');
            $(this).find('h4').text('Información completa del alumno con ID: ' + alumnoID);
            $(this).find('#alumnoId').val(alumnoID);
            $(this).find('#alumnoNombre').val(alumnoNombre);
            $(this).find('#alumnoApellido').val(alumnoApellido);
            $(this).find('#alumnoCorreo').val(alumnoCorreo);
            $(this).find('#alumnoNac').val(alumnoNac);
            $(this).find('#alumnoAsig').text(alumnoAsig);
            $(this).find('#alumnoEstado').val(alumnoEstado);
        });
    });
  </script>


</body>

</html>
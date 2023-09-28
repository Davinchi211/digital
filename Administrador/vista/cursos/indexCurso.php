<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="/digital/Administrador/vista/estilos/estilosAlumnos.css" />
  <title>Curso</title>
</head>

<body>

  <?php
    include "agregarCurso.php";
    include "eliminarCurso.php";
    include "editarCurso.php";
  ?>
  <header>
    <i class="fa-solid fa-screwdriver-wrench" style="color: #ffffff;"></i>
    <h1>Administrador -> Cursos</h1>
  </header>

  <section class="sec-boton">
    <a href="indexAdministrador.php"><button type="button" class="btn btn-primary btn-lg">Regresar</button></a>
    <button type="button" class="btn btn-primary btn-lg" data-bs-toggle="modal" data-bs-target="#agregarCursoModal">
      Agregar nuevo Curso
    </button>

  </section>


  <!--sección de la tabla-->
  <section class="contenedor-main">
    <div class="tabla">
      <div class="filtro-tabla">
        <h3>Cursos</h3>
        <div class="filtro-busqueda">
          <input type="text" id="busqueda" placeholder="Buscar por curso">
          <button type="submit">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div>

      <div class="table-responsive">
        <table class="table table-striped table-hover table-bordered" id="miTabla">
          <thead class="table-dark">
            <tr>
              <th scope="col">Id</th>
              <th scope="col">Curso</th>
              <th scope="col">Descripción</th>
              <th scope="col">fecha de inicio</th>
              <th scope="col">Operaciones</th>
            </tr>
          </thead>
          <tbody>
            
          <!--Se manda a llamar los campos de la tabla, justamente como se llaman en la BD-->
            <?php
              if(!empty($dato)){
                foreach ($dato as $key => $value)
                foreach ($value as $va ):
                echo "<tr><td>".$va['id_curso']."</td><td>".$va['nombre_curso']."</td><td>".$va['descripcion']."</td>";
                echo "<td>".$va['fecha_ini']."</td>";
                echo "<td><a href='#' class='op-tabla' data-bs-toggle='modal' data-bs-target='#editarCursoModal' data-id='".$va['id_curso']."' data-nombre='".$va['nombre_curso']."'
                        data-descripcion='".$va['descripcion']."' data-fecha='".$va['fecha_ini']."'>";
                echo "<i class='fa-solid fa-pen' style='color: #e3e62d;'></i>";
                echo "</a>";
                echo "<a href='#' class='op-tabla delete-link' data-bs-toggle='modal' data-bs-target='#eliminarCursoModal' data-id='" . $va['id_curso'] . "'>";
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
        <h3>Total cursos</h3>
        <h4 class="display-4">
        <i class="fa-solid fa-book"></i> 
          <?php 
            $totalRegistros = ControladorCurso::resultadoConteo(); // Llama sin argumentos
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
  <script src="vista/cursos/filtro.js"></script>

  <!--Para que en el modal aparezcan los datos de la fila seleccionada-->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script>
    $(document).ready(function () {
        $('#eliminarCursoModal').on('show.bs.modal', function (e) {
            var cursoID = $(e.relatedTarget).data('id');
            $(this).find('h4').text('¿Estás seguro de eliminar al curso con ID: ' + cursoID);
            $(this).find('#cursoID').val(cursoID);
        });
    });

    $(document).ready(function () {
        $('#editarCursoModal').on('show.bs.modal', function (e) {
            var cursoID = $(e.relatedTarget).data('id');
            var cursoNombre = $(e.relatedTarget).data('nombre');
            var cursoDescripcion = $(e.relatedTarget).data('descripcion');
            var cursoFecha = $(e.relatedTarget).data('fecha');
            $(this).find('h4').text('Información completa del Curso con ID: ' + cursoID);
            $(this).find('#cursoId').val(cursoID);
            $(this).find('#cursoNombre').val(cursoNombre);
            $(this).find('#cursoDescripcion').val(cursoDescripcion);
            $(this).find('#cursoFecha').val(cursoFecha);
        });
    });
  </script>
</body>

</html>
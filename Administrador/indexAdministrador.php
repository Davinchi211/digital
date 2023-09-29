<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="estilos/estiloAdmin.css" />
  <link rel="icon" href="../public/img/admin.svg">
  <title>Admin</title>
</head>

<body>

  <header>
  <nav class="navbar text-white fixed-top">
    <div class="container justify-content-start mt-2">
    <i class="fa-solid fa-screwdriver-wrench" style="color: #ffffff;">    </i>
    <h1>Administrador</h1>
    </div>
    <div class="row justify-content-between align-items-center">
      <div class="col">
      <a href="../login/userAccount.php?logoutSubmit=1" class="logout text-white nav-link">Cerrar Sesión</a>
      </div>
      <div></div>
    </div>
</nav>
  </header>

  <section class="sec-boton">
    <div class="card-boton">
      <a href="#">
      <div class="header-enlace">
          <div class="text-header">
            Regresar
          </div>
          <div class="icon-header"><i class="fa-solid fa-circle-left"></i></div>
        </div>
        <div class="footer-enlace">
            Regresar al menú principal
        </div>
      </a>
    </div>
    <div class="card-boton">
      <a href="Alumno.php">
        <div class="header-enlace">
          <div class="text-header">
            Alumnos
          </div>
          <div class="icon-header"><i class="fa-regular fa-id-card"></i></div>
        </div>
        <div class="footer-enlace">
            Ir a la sección de alumnos
        </div>
      </a>
    </div>
    <div class="card-boton">
      <a href="Curso.php">
      <div class="header-enlace">
          <div class="text-header">
            Cursos
          </div>
          <div class="icon-header"><i class="fa-solid fa-book"></i></div>
        </div>
        <div class="footer-enlace">
            Ir a la sección de cursos
        </div>
      </a>
    </div>
    <div class="card-boton">
      <a href="CursoAsignado.php">
      <div class="header-enlace">
          <div class="text-header">
            Asignación
          </div>
          <div class="icon-header"><i class="fa-solid fa-book"></i></div>
        </div>
        <div class="footer-enlace">
            Ir a la sección de asignar cursos
        </div>
      </a>
    </div>
  </section>

  <!--Para íconos en Font Awesome-->
  <script src="https://kit.fontawesome.com/0c127780a5.js" crossorigin="anonymous"></script>


</body>

</html>
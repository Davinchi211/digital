<?php
    ob_start();
    session_start();
    include('../controlador_asis/connect.php');
    $con = connection();
    $sql = "SELECT * FROM curso";
    $query = mysqli_query($con, $sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ASISTENCIA</title>
    <link rel="stylesheet" href="style_asistencia.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <link rel="shortcut icon" href="img/icon_assis.png">
</head>
<body>
    <!--NAVBAR-->
    <nav class="navbar bg-primary text-white fixed-top">
        <div class="container-fluid justify-content-start text-center">
                <div class="col-1">
                    <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
                      <span class="navbar-toggler-icon"></span>
                  </button>
                </div>       
            <a class="navbar-brand text-white"><h3>DAILY CHECK</h3></a>
            <!--DESIGN OFFCANVAS-->
            <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasNavbar" aria-labelledby="navbarOffcanvasLgLabel">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title">INICIO</h5>
                                <a class="navbar-brand text-white"><h3>cheCK</h3></a>
                                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="navbar-body">
                    <ul class="navbar-nav justify-content-start flex-grow-1 pe-3">
                        <li class="nav-item">
                            <a href="style_asistencia.css" class="nav-link">TAREAS</a>
                        </li>
                    </ul>
                </div>
              </div>
           </div>
    </nav>
    <!--BODY -->
    <div class="container-fluid" id="body">
        <!--Select course-->
        <!--container principal-->
        <div class="container text-center">
        <div class="row align-items-center justify-content-center">
            <div class="col-12">
                <br>
                    <h1>ASISTENCIA ALUMNOS</h1>
                    <br>
                </div>
                <!--LISTAR CURSOS-->
                <!--container-select-->
                <div class="col-4"> 
                <form action="" method="POST">
                <div class="input-group mb-3">
                    <label class="input-group-text" for="inputGroupSelect01">CURSO</label>
                    <select class="form-select bg-secondary-subtle" id="cursos" name="curso">
                    <option selected>Seleccionar</option>
                    <?php
                    while($row=mysqli_fetch_array($query)):
                    ?>
                   <option><?=$row['nombre_curso'];?></option>
                   <?php endwhile ?>
             </select>
             <button class="btn btn-outline-secondary" type="submit"  name="select_curso">Listar</button>
            </div>
                </div>
            </div>
        <div class="container-md" id="tabla_result">
     <!--LISTADO DE ALUMNOS-->
     <!--container thead-->
        <div class="row align-items-center">
            <div class="col">
            <br>
            <div class="table-wrapper-scroll-y scrollm table-responsive-md">
            <table class="table table-success table-striped table-hover">
                <thead class="table-dark">
                    <th scope="col">ID ALUMNO</th>
                    <th scope="col">NOMBRE</th>
                    <th scope="col">APELLIDO</th>
                    <th scope="col">CORREO</th>
                    <th scope="col">CURSO</th>
                    <th scope="col">CHECK</th>
                </thead>
                <tbody>
                <?php include('../controlador_asis/consulta_asis.php');?>
                </tbody>
        </table>
            </div>
            </div>
        </div>
        </div>
        <!--BOTON TOMAR ASISTENCIA -->
        <br>
        <div class="container md-10 py-2">
        <button type="submit" class="btn btn-outline-success" name="g_asistencia">GUARDAR ASISTENCIA</button>
        <?php include('../controlador_asis/guardar_asis.php');?>
        <button type="submit" class="btn btn-outline-secondary" name="n_asistencia">NUEVA ASISTENCIA</button>
        </div>   
        <br>
        <!--FIN LISTADO-->
        <!--MOSTRAR LISTADO ASISTENCIA LUEGO DE GUARDAR-->
        <div class="container-sm py-5 mt-5 table-responsive-md">
            <div class="row align-items-center justify-content-center">
                <div class="col-md-8">
                        <table class="table table-warning table-sm table-striped table-hover table-bordered">
                            <thead>
                                <tr>
                                    <th class="col-xs">ID ALUMNO</th>
                                    <th class="col-xs">ALUMNO</th>
                                    <th class="col-xs">CURSO</th>
                                    <th class="col-xs">PRESENTE</th>
                                    <th class="col-xs">FECHA DE ASISTENCIA</th>
                                </tr>
                            </thead>
                            <tbody class="table-group-divider">
                                <?php include("../controlador_asis/lista_asis.php");?>
                            </tbody>
                        </table>
                </div>
            </div>
        </div>
        </div>
        </form>
    </div>
    <br>
    <!--FOOTER-->
    <footer class="bd-footer py-5 mt-5 bg-secondary-subtle">
      <div class="container-fluid bg-info-subtle">
        <div class="row">
            FOOTER
        </div>
    </div>
    </footer>
</body>
</html>
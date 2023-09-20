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
    <link rel="stylesheet" href="../public/style_asistencia.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <link rel="shortcut icon" href="../public/img/icon_assis.png">
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
            <a class="navbar-brand text-white"><h4>DAILY CHECK</h4></a>
            <a href="../login/userAccount.php?logoutSubmit=1" class="logout text-white" style="margin-left:1000px;">Cerrar Sesión</a>
            <!--DESIGN OFFCANVAS-->
            <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasNavbar" aria-labelledby="navbarOffcanvasLgLabel">
                <div class="offcanvas-header">
                                <a class="navbar-brand text-black"><h3>CHECKING</h3></a>
                                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="navbar-body">
                    <ul class="navbar-nav justify-content-start flex-grow-1 pe-3">
                        <li class="nav-item">
                            <a href="../controlador_asis/reporte_asis.php" class="nav-link" target="_blank">PDF TEST</a>
                        </li>
                    </ul>
                </div>
              </div>
           </div>
    </nav>
    <!--BODY -->
    <div class="mt-5 bg-light" style="height: auto; margin: 0;" id="body_c">
        <!--Select course-->
        <!--container principal-->
        <div class="container text-center">
        <div class="row align-items-center justify-content-center">
            <div class="col-12">
                <br>
                    <h1 class="mt-5">ASISTENCIA ALUMNOS</h1>
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
            <div class="table-wrapper-scroll-y table-responsive-md">
            <table class="table table-primary table-striped table-hover mb-0">
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
        <div class="container-sm py-5 mt-1 table-responsive-md mg-div">
            <div class="row align-items-center justify-content-center">
                <div class="col-md-8">
                        <table class="table table-secondary table-sm table-striped table-hover table-bordered">
                            <tbody>
                                <?php include("../controlador_asis/lista_asis.php");?>
                            </tbody>
                        </table>
                </div>
            </div>
        </div>
        </div>
        </form>
    <!--FOOTER-->     
 
    <div class="container text-black mt-5" style="padding:2em;">
    <hr>
        <div class="row">
            <div class="col-5">
            <h6>© 2023 PROYECT</h6>
            </div>
            <div class="col-5">
            <a href="#" class="link-offset-2 link-underline link-underline-opacity-0 link-dark"><h6>CHECKING.com</h6></a>
            </div>
            <div class="col-2">
                <div style="height:120px;">
                <img src="../public/img/umg.png" alt="logo UMG" class="img-fluid d-block sm-image" style="width:200px;">      
                </div>   
             </div>
        </div>
    </div>
    </div>

</body>
</html>
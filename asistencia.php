<?php
    include('connect.php');
    $con = connection();
    $sql = "SELECT * FROM curso";
    $query = mysqli_query($con, $sql);
    $num_rows = mysqli_num_rows($query);
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
    <nav class="navbar bg-success text-white fixed-top">
        <div class="container-fluid justify-content-start text-center">
            <div class="row">
                <div class="col-2">
                <a href="style_asistencia.css" class="navbar-brand">
                    <svg width="40" height="40">
                     <svg xmlns="http://www.w3.org/2000/svg" height="35" viewBox="0 -960 960 960" width="35">
                    <path d="M120-240v-80h720v80H120Zm0-200v-80h720v80H120Zm0-200v-80h720v80H120Z"/>
             </svg>  
          </svg>
        </a>
                </div>
                <div class="col-10">
                  <h3>DIGITAL CHECK</h3>
                </div>
            </div>
            <h6>@usuario</h6>
        </div>
    </nav>
    <!--BODY -->
    <div class="container-fluid bg-secondary-subtle" id="body">
        <!--Select course-->
        <div class="container text-center bg-primary">
        <div class="row align-items-center justify-content-center">
            <div class="col-12">
                <br>
                    <h1>ASISTENCIA ALUMNOS</h1>
                    <br>
                </div>
                <!--LISTAR CURSOS-->
                <div class="col-6">
                <div class="input-group mb-3">
                    <label class="input-group-text" for="inputGroupSelect01">CURSO</label>
                    <select class="form-select" id="inputGroupSelect01">
                    <option selected>Seleccionar</option>
                    <?php
                    while($row=mysqli_fetch_array($query)):
                ?>
                   <option><?=$row['nombre_curso'];?></option>
                   <?php endwhile ?>
             </select>
             <button class="btn btn-outline-warning" type="button"  name="select_curso">Button</button>
            </div>
                </div>
            </div>
        </div>
        <!--LISTADO DE ALUMNOS-->
        <div class="container-lg">
        <div class="row align-items-center bg-success">
            <div class="col">
            <br>
            <div class="table-wrapper-scroll-y scrollm">
            <table class="table table-dark table-striped table-hover" width="250px" >
                <thead>
                    <th scope="col">ID ALUMNO</th>
                    <th scope="col">NOMBRE</th>
                    <th scope="col">APELLIDO</th>
                    <th scope="col">CORREO</th>
                    <th scope="col">CURSO</th>
                    <th scope="col">ID ASI.</th>
                    <th scope="col">ASISTENCIA</th>
                </thead>
                <tbody>
                        <?php 
                        include('consulta_asis.php');
                        while($row2=mysqli_fetch_array($query2)):
                        ?>
                        <tr>
                            <td><?=$row2['id_alumno'];?></td>
                        </tr>
                        <?php endwhile?>
                </tbody>
        </table>
            </div>
            </div>
        </div>     


        </div>
        <!--FIN LISTADO-->
    </div>
    <!--FOOTER-->
    <div class="container-fluid bg-info-subtle">
        footer
    </div>
</body>
</html>
<?php
    ob_start();
    session_start();
    include('../controlador_asis/connect.php');
    $con = connection();
    $id = $_SESSION['id'];
    $sql = "SELECT curso.nombre_curso
    FROM curso
    INNER JOIN cursoasignado ON cursoasignado.id_curso = curso.id_curso
    INNER JOIN users ON cursoasignado.id_user = users.id
    WHERE id=?";
    $sql_curso = $con->prepare($sql);
    $sql_curso->bind_param("i",$id);
    if($sql_curso->execute()){
        $quer_curso = $sql_curso->get_result();
    }
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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
</head>
<body>
    <?php include('../public/header.php');?>
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
                    while($row=$quer_curso->fetch_assoc()):
                    ?>
                   <option><?=$row['nombre_curso'];?></option>
                   <?php endwhile ?>
             </select>
             <button class="btn btn-outline-secondary" type="submit"  name="select_curso" onclick="valida_curso()">Listar</button>
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
        <?php include('../public/footer.php');?>

</body>
</html>
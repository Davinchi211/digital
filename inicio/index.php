<?php
session_start();
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>INICIO</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <link rel="icon" href="../public/img/houses.svg">
  </head>

    <body class="container mt-5 mb-5"> 
    <?php include('../public/header.php');?>
    <br>
    <h5 class="mt-5">Tareas</h5>

<!-- <button class="btn btn-primary" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasScrolling" aria-controls="offcanvasScrolling">Cursos</button>

<div class="offcanvas offcanvas-start" data-bs-scroll="true" data-bs-backdrop="false" tabindex="-1" id="offcanvasScrolling" aria-labelledby="offcanvasScrollingLabel">
  <div class="offcanvas-header">
    <h5 class="offcanvas-title" id="offcanvasScrollingLabel">Universidad Mariano</h5>
    
    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
  </div>
  <div class = "text-center">
  <i class="bi bi-person-circle h1"></i>
  </div>
  <div class="offcanvas-body text-center">
    <p class="opacity-50 Light weight text">Guillermo Martinez </p>
    <div class=" mt-5 mb-5">
    <p>Lógica.</p>
    <p>Álgebra.</p>
    <p>Ciencias.</p>
    </div>
<hr>
  </div>
  
</div> -->


<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
  Crear Tarea
</button>

<?php
$link = mysqli_connect("127.0.0.1", "root", "", "digital");

//Si hay un error mostrará que no pudo hacer la conexión e imprimiremos el error
if($link == false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

$sqli = mysqli_query($link, "SELECT * FROM tarea_maestro");
$productCount = mysqli_num_rows($sqli);
function borrar($id){
 
};

if ($productCount > 0) {
    while($row = mysqli_fetch_array($sqli)){
      ?>
        <form action="delete_homework.php" method="post">
        <input id="tarea" value="<?php echo $row['tarea']; ?>" name="tarea"></input>
        <?php
        echo "<td><a href='update.php?m=editar&id=".$row['id']."' class='btn btn-warning' >Editar</a><br> ";
        ?>
        <button type="submit" name="delete" style="float:right; border:none;">&times</button>
        </form>
      <?php
    }
}

mysqli_close($link);
?>

<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel"></h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="POST">
  <fieldset >
    <legend>Tarea Nueva</legend>
    <div class="mb-3">
      <label for="disabledTextInput" class="form-label">Descripción</label>
      <input name="descripcion" type="text" id="disabledTextInput" class="form-control" placeholder="..." value="<?php echo $fetch['descripcion']?>">
    </div>
    <div class="mb-3">
      <label for="disabledSelect" class="form-label"></label>
      <select  id="disabledSelect" class="form-select" name="materia">
        <option value="">Materia</option>
        <!-- MOSTRAR CURSO SEGÚN USUARIO -->
    <?php
    ob_start();
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
    <?php
      while($row=$quer_curso->fetch_assoc()):
    ?>
      <option><?=$row['nombre_curso'];?></option>
      <?php endwhile ?>
      </select>
      
    </div>
    <div class="mb-3">
      <div class="form-check">
        
        
      </div>
    </div>
    <button type="submit" class="btn btn-primary">Asignar</button>
    
  </fieldset>
</form>
<?php
//Conectamos a la base de datos local
$link = mysqli_connect("127.0.0.1", "root", "", "digital");

//Si hay un error mostrará que no pudo hacer la conexión e imprimiremos el error
if($link == false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

$valorFinal = "";
                if(isset($_POST['submit'])){
                foreach ($_POST['materia'] as $select)
                
                {

                echo "seleccionado :" .$select;
                $valorFinal = $select;
                }

            }

                  $nombreMateria = $_POST['materia'];
                  $descripcion = $_POST['descripcion'];
                  if(!empty($nombreMateria)){
                  $sql = "INSERT INTO tarea_maestro (tarea, materia) VALUES ('$descripcion', '$nombreMateria')";
        if(mysqli_query($link, $sql)){
            echo "- ";
        } else {
            die("No se pudo hacer la conexión $sql. " . mysqli_error($link));
        }
        }
        mysqli_close($link);
      
        ?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
        <button type="button" class="btn btn-primary" action="sad.php">Editar</button>
      </div>
    </div>
  </div>
</div>
    <?php include('../public/footer.php');?>

  </body>
</html>
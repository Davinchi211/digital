<?php

$link = mysqli_connect("127.0.0.1", "root", "", "digital");

if(count($_POST)>0) {
    mysqli_query($link,"UPDATE tarea_maestro set tarea='" . $_POST['tarea']."' WHERE id='" . $_GET['id'] . "'");
    $message = "Tarea modificada con éxito";
    }
    $result = mysqli_query($link,"SELECT * FROM tarea_maestro WHERE id='" . $_GET['id'] . "'");
    $row= mysqli_fetch_array($result);
?>
<!DOCTYPE html>
<html>
<head>
<title>Info tarea</title>
</head>
<body>
<form name="frmUser" method="post" action="">
<div><?php if(isset($message)) { echo $message; } ?>
</div>
<div style="padding-bottom:5px;">
<a href="index.php">Regresar</a>
</div>
Tarea: <br>
<input type="text" name="tarea" class="txtField" value="<?php echo $row['tarea']; ?>">
<br>
<input type="submit" name="submit" value="Submit" class="buttom">

</form>
</body>
</html>
<?php require "vista/layout/header.php" ?>
    <h1>NUEVO</h1>
    <hr>
    <form action="">
        <label for="">NOMBRES</label> <br>
        <input type="text" name="nombre"><br>
        <label for="">APELLIDOS</label><br>
        <input type="text" name="apellido"><br>
        <label for="">FECHA DE NACIMIENTO</label><br>
        <input type="date" name="fechanac">
        <input type="submit" name="btn">
        <input type="hidden" name="m" value="guardar">
    </form>
<?php require "vista/layout/footer.php" ?>
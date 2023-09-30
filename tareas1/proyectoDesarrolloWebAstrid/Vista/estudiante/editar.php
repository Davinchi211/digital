<?php require "vista/layout/header.php" ?>
    <h1>Editar</h1>

    <form action="">

        <?php foreach ($dato as $value): ?>
        <?php foreach ($value as $v ): ?>

        <?php $showfecha = date_create($v['FechaNacimiento']);?>
        <label for="">NOMBRES</label> <br>
        <input type="text" name="nombre" value="<?php echo $v['Nombres'] ?>"><br>
        <label for="">APELLIDOS</label><br>
        <input type="text" name="apellido" value="<?php echo $v['Apellidos'] ?>"><br>
        <label for="">FECHA DE NACIMIENTO</label><br>
        <input type="date" name="fechanac" value="<?php echo date_format($showfecha, 'Y-m-d') ?>">



        <input type="hidden" name="id" value="<?php echo $v['ID'] ?>">
        <input type="submit" name="btn" value="ACTUALIZAR">
        <?php endforeach ?>
        <?php endforeach ?>

        <input type="hidden" name="m" value="update">
    </form>
    <?php require "vista/layout/footer.php" ?>
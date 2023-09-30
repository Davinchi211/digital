<?php require "vista/layout/header.php" ?>
    <h1>Editar</h1>

    <form action="">

        <?php foreach ($dato as $value): ?>
        <?php foreach ($value as $v ): ?>

        <div class="row">
        <div class="col-sm-5">

        <div class="mb-3" hidden>
        <label for="idMateria" class="form-label" >Id Materia:</label>
        <input type="number" class="form-control" id="idMateria" name="idMateria" value="<?php echo $v['id'] ?>" aria-describedby="emailHelp">
        </div>

        <div class="mb-3">
        <label for="nombre" class="form-label">Nombre:</label>
        <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo $v['nombre'] ?>" aria-describedby="emailHelp">
        </div>

        <div class="mb-3">
        <label for="descripcion" class="form-label">Descripcion:</label>
        <input type="text" class="form-control" id="descripcion" name="descripcion" value="<?php echo $v['descripcion'] ?>" aria-describedby="emailHelp">
        </div>

      

        <input type="submit" name="btn" class="btn btn-primary" value="ACTUALIZAR">
        <a href="materia.php?m=canceler" type="button" class="btn btn-danger">Cancelar</a><br><br>
        <?php endforeach ?>
        <?php endforeach ?>

        <input type="hidden" name="m" value="update">
    </form>
    <?php require "vista/layout/footer.php" ?>

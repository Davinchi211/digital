<?php require "vista/layout/header.php" ?>
    <h1>Editar</h1>

    <form action="">

        <?php foreach ($dato as $value): ?>
        <?php foreach ($value as $v ): ?>

        <div class="row">
        <div class="col-sm-5">

        <div class="mb-3">
        <label for="idProfesor" class="form-label">Id profesor:</label>
        <input type="number" class="form-control" id="idProfesor" name="idProfesor" value="<?php echo $v['id'] ?>" aria-describedby="emailHelp">
        </div>

        <div class="mb-3">
        <label for="nombre" class="form-label">Nombre:</label>
        <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo $v['nombre'] ?>" aria-describedby="emailHelp">
        </div>

        <div class="mb-3">
        <label for="apellido" class="form-label">Apellido:</label>
        <input type="text" class="form-control" id="apellido" name="apellido" value="<?php echo $v['apellido'] ?>" aria-describedby="emailHelp">
        </div>

        <div class="mb-3">
        <select class="form-select" aria-label="Default select example" id="genero" name="genero">
          <option selected>Genero</option>
          <option value="M">Masculino</option>
          <option value="F">Femenino</option>
        </select>
        </div>
        </div>
    </div>

        <input type="submit" name="btn" class="btn btn-primary" value="ACTUALIZAR">
        <a href="profesor.php?m=canceler" type="button" class="btn btn-danger">Cancelar</a><br><br>
        <?php endforeach ?>
        <?php endforeach ?>

        <input type="hidden" name="m" value="update">
    </form>
    <?php require "vista/layout/footer.php" ?>

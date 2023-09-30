<?php require "vista/layout/header.php" ?>
    <h1>Editar</h1>

    <form action="">

        <?php foreach ($dato as $value): ?>
        <?php foreach ($value as $v ): ?>

        <div class="row">
        <div class="col-sm-5">

        <div class="mb-3" hidden>
        <label for="idTarea" class="form-label" >Id tarea:</label>
        <input type="number" class="form-control" id="idTarea" name="idTarea" value="<?php echo $v['id_tarea'] ?>" aria-describedby="emailHelp">
        </div>

        <div class="mb-3">
        <label for="nombre" class="form-label">Nombre:</label>
        <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo $v['nombre'] ?>" aria-describedby="emailHelp">
        </div>

        <div class="mb-3">
        <label for="descripcion" class="form-label">Descripcion:</label>
        <input type="text" class="form-control" id="descripcion" name="descripcion" value="<?php echo $v['descripcion'] ?>" aria-describedby="emailHelp">
        </div>

        <div class="mb-3">
        <label for="fecha" class="form-label">Fecha:</label>
        <input type="date" class="form-control" id="fecha" name="fecha" value="<?php echo $v['fecha'] ?>" aria-describedby="emailHelp">
        </div>

        <div class="mb-3">
        <label for="puntos" class="form-label">puntos:</label>
        <input type="text" class="form-control" id="puntos" name="puntos" value="<?php echo $v['puntos'] ?>" aria-describedby="emailHelp">
        </div>

        <div class="mb-3">
        <label for="materia" class="form-label">materia:</label>
        <input type="text" class="form-control" id="materia" name="materia" value="<?php echo $v['materia'] ?>" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
        <label for="maestro" class="form-label">maestro:</label>
        <input type="text" class="form-control" id="maestro" name="maestro" value="<?php echo $v['maestro'] ?>" aria-describedby="emailHelp">
        </div>
        <input type="submit" name="btn" class="btn btn-primary" value="ACTUALIZAR">
        <a href="materia.php?m=canceler" type="button" class="btn btn-danger">Cancelar</a><br><br>
        <?php endforeach ?>
        <?php endforeach ?>

        <input type="hidden" name="m" value="update">
    </form>
    <?php require "vista/layout/footer.php" ?>

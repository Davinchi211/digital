<?php require "vista/layout/header.php" ?>
    <h1>NUEVO</h1>
    <hr>
    
    <div class="row">
        <div class="col-sm-5">
            <form action="">

        <div class="mb-3">
        <label for="idTarea" class="form-label">Id Tarea:</label>
        <input type="number" class="form-control" id="idTarea" name="idTarea" aria-describedby="emailHelp">
        </div>

        <div class="mb-3">
        <label for="nombre" class="form-label">Nombre:</label>
        <input type="text" class="form-control" id="nombre" name="nombre" aria-describedby="emailHelp">
        </div>

        <div class="mb-3">
        <label for="descripcion" class="form-label">Descripcion:</label>
        <input type="text" class="form-control" id="descripcion" name="descripcion" aria-describedby="emailHelp">
        </div>

        <div class="mb-3">
        <label for="fecha" class="form-label">Fecha:</label>
        <input type="date" class="form-control" id="fecha" name="fecha" aria-describedby="emailHelp">
        </div>
        <div class="mb-2">
        <label for="puntos" class="form-label">Puntos:</label>
        <input type="text" class="form-control" id="puntos" name="puntos" aria-describedby="emailHelp">
        </div>
        <div class="mb-2">
        <label for="materia" class="form-label">Materia:</label>
        <input type="text" class="form-control" id="materia" name="materia" aria-describedby="emailHelp">
        </div>  <div class="mb-2">
        <label for="maestro" class="form-label">Profesor:</label>
        <input type="text" class="form-control" id="maestro" name="maestro" aria-describedby="emailHelp">
        </div>

      
        <input type="submit" name="btn" class="btn btn-primary">
        <input type="hidden" name="m" value="guardar">
        <a href="tarea.php?m=canceler" type="button" class="btn btn-danger">Cancelar</a><br><br>
    </form>
        </div>
    </div>


<?php require "vista/layout/footer.php" ?>
<?php require "vista/layout/header.php" ?>
    <h1>NUEVO</h1>
    <hr>
    
    <div class="row">
        <div class="col-sm-5">
            <form action="">

        <div class="mb-3">
        <label for="idProfesor" class="form-label">Id profesor:</label>
        <input type="number" class="form-control" id="idProfesor" name="idProfesor" aria-describedby="emailHelp">
        </div>

        <div class="mb-3">
        <label for="nombre" class="form-label">Nombre:</label>
        <input type="text" class="form-control" id="nombre" name="nombre" aria-describedby="emailHelp">
        </div>

        <div class="mb-3">
        <label for="apellido" class="form-label">Apellido:</label>
        <input type="text" class="form-control" id="apellido" name="apellido" aria-describedby="emailHelp">
        </div>

        <div class="mb-3">
        <select class="form-select" aria-label="Default select example" id="genero" name="genero">
          <option selected>Genero</option>
          <option value="M">Masculino</option>
          <option value="F">Femenino</option>
        </select>
        </div>

        <input type="submit" name="btn" class="btn btn-primary">
        <input type="hidden" name="m" value="guardar">
        <a href="profesor.php?m=canceler" type="button" class="btn btn-danger">Cancelar</a><br><br>
    </form>
        </div>
    </div>


<?php require "vista/layout/footer.php" ?>
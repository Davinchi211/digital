<?php require "vista/layout/header.php" ?>
    <h1>NUEVO</h1>
    <hr>
    
    <div class="row">
        <div class="col-sm-5">
            <form action="">

        <div class="mb-3">
        <label for="idMateria" class="form-label">Id Materia:</label>
        <input type="number" class="form-control" id="idMateria" name="idMateria" aria-describedby="emailHelp">
        </div>

        <div class="mb-3">
        <label for="nombre" class="form-label">Nombre:</label>
        <input type="text" class="form-control" id="nombre" name="nombre" aria-describedby="emailHelp">
        </div>

        <div class="mb-3">
        <label for="descripcion" class="form-label">Descripcion:</label>
        <input type="text" class="form-control" id="descripcion" name="descripcion" aria-describedby="emailHelp">
        </div>

      
        <input type="submit" name="btn" class="btn btn-primary">
        <input type="hidden" name="m" value="guardar">
        <a href="materia.php?m=canceler" type="button" class="btn btn-danger">Cancelar</a><br><br>
    </form>
        </div>
    </div>


<?php require "vista/layout/footer.php" ?>
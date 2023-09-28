<!--modal para agregar nuevos alumnos-->
<?php
require_once("config.php");
require_once("controlador/controladorCurso.php");
$variable = ControladorCurso::index2();
?>

<div class="modal fade" id="agregarAlumnoModal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-dark text-white">
                <h5 class="modal-title">Agregar Alumno</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                </button>
            </div>
            
            <form action="Alumno.php?m=guardar" method="POST" class="was-validated">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="nombre">Nombre</label>
                        <input type="text" class="form-control" name="nombre" required>
                    </div>
                    <div class="form-group">
                        <label for="apellido">Apellido</label>
                        <input type="text" class="form-control" name="apellido" required>
                    </div>
                    <div class="form-group">
                        <label for="correo">Correo</label>
                        <input type="email" class="form-control" name="correo" required>
                    </div>

                    <div class="form-group">
                        <label for="nacimiento">Nacimiento</label>
                        <!--en un principio, mostrará la fecha en formato día-mes-año, pero con el value
                         establecido, se enviará al servidor en formato año-mes-día-->
                        <input type="date" class="form-control" name="nacimiento"  value="YYYY-MM-DD" required>
                    </div>
                    <div class="form-group">
                        <label for="curso">Id Curso</label>
                        <select id="seleccionar-curso" name="id_curso" class="form-select">
                            <?php
                            if (!empty($variable)) {
                                foreach ($variable as $key => $value)
                                    foreach ($value as $va) :
                                        echo "<option value='".$va['id_curso']."'>" .$va['id_curso'] .". ".$va['nombre_curso']."</option>";
                                    endforeach;
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="estado_asistencia">Asistencia</label>
                        <input type="number" class="form-control" name="estado_asistencia" required step="any">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Crear</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!--modal para confimación de editar alumno-->
<?php
require_once("config.php");
require_once("controlador/controladorCurso.php");
$variable = ControladorCurso::index2();
?>
<div class="modal fade" id="editarAlumnoModal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-warning text-white">
                <h5 class="modal-title">Modificar Alumno</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                </button>
            </div>

            <h4> </h4>

            <form action="Alumno.php?m=editar" method="POST" class="was-validated">
                <div class="modal-body">
                    <input type="hidden"  id="alumnoId" name="alumnoId" value="">
                    <div class="form-group">
                        <label for="alumnoNombre">Nombre</label>
                        <input type="text" class="form-control" id="alumnoNombre" name="alumnoNombre" value="" required>
                    </div>
                    <div class="form-group">
                        <label for="alumnoApellido">Apellido</label>
                        <input type="text" class="form-control" id="alumnoApellido" name="alumnoApellido" value="" required>
                    </div>
                    <div class="form-group">
                        <label for="alumnoCorreo">Correo</label>
                        <input type="email" class="form-control" id="alumnoCorreo" name="alumnoCorreo" value="" required>
                    </div>
                    <div class="form-group">
                        <label for="alumnoNac">Fecha de naciemiento</label>
                        <input type="date" class="form-control" id="alumnoNac" name="alumnoNac" value="YYYY-MM-DD" required>
                    </div>
                    <div class="form-group">
                        <label for="curso">Id Curso</label>
                        <select id="seleccionar-curso" name="alumnoAsig" class="form-select">
                            <?php
                            if (!empty($variable)) {
                                foreach ($variable as $key => $value)
                                    foreach ($value as $va) :
                                        echo "<option id='alumnoAsig' value='".$va['id_curso']."'>" .$va['id_curso'] .". ".$va['nombre_curso']."</option>";
                                    endforeach;
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="alumnoEstado">Estado de asistencia</label>
                        <input type="text" class="form-control" id="alumnoEstado" name="alumnoEstado" value="" readonly>
                    </div>
                </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-warning">Guardar cambios</button>
                    </div>
            </form>

        </div>
    </div>
</div>
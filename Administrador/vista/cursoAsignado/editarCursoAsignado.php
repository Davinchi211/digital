<!--modal para confimación de eliminar alumno-->
<?php
require_once("config.php");
require_once("controlador/controladorCurso.php");
$variable = ControladorCurso::index2();
?>
<div class="modal fade" id="editarCursoAsignadoModal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-warning text-white">
                <h5 class="modal-title">Modificar Curso</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                </button>
            </div>

            <h4> </h4>

            <form action="CursoAsignado.php?m=editar" method="POST" class="was-validated">
                <div class="modal-body">
                    <input type="hidden"  id="id_asignacion" name="id_asignacion" value="">
                    <div class="form-group">
                        <label for="usuario">Id Usuario</label>
                        <input type="text" class="form-control" id="usuario" name="usuario" value="" required>
                    </div>
                    <div class="form-group">
                        <label for="curso">Id Curso</label>
                        <select id="seleccionar-curso" name="curso" class="form-select">
                            <?php
                            if (!empty($variable)) {
                                foreach ($variable as $key => $value)
                                    foreach ($value as $va) :
                                        echo "<option id='curso' value='".$va['id_curso']."'>" .$va['id_curso'] .". ".$va['nombre_curso']."</option>";
                                    endforeach;
                            }
                            ?>
                        </select>
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
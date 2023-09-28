<!--modal para agregar nuevos cursos-->
<?php
require_once("config.php");
require_once("controlador/controladorCurso.php");
$variable = ControladorCurso::index2();
?>

<div class="modal fade" id="agregarCursoAsignadoModal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-dark text-white">
                <h5 class="modal-title">Agregar Asignacion de cursos</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                </button>
            </div>

            <form action="CursoAsignado.php?m=guardar" method="POST" class="was-validated">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="usuario">Id Usuario</label>
                        <input type="int" class="form-control" name="usuario" required>
                    </div>
                    <div class="form-group">
                        <label for="curso">Id Curso</label>
                        <select id="seleccionar-curso" name="curso" class="form-select">
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
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Crear</button>
                </div>
            </form>
        </div>
    </div>
</div>
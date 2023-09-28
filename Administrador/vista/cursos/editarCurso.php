<!--modal para confimación de eliminar alumno-->
<div class="modal fade" id="editarCursoModal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-warning text-white">
                <h5 class="modal-title">Modificar Curso</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                </button>
            </div>

            <h4> </h4>

            <form action="Curso.php?m=editar" method="POST" class="was-validated">
                <div class="modal-body">
                    <input type="hidden"  id="cursoId" name="cursoId" value="">
                    <div class="form-group">
                        <label for="cursoNombre">Nombre</label>
                        <input type="text" class="form-control" id="cursoNombre" name="cursoNombre" value="" required>
                    </div>
                    <div class="form-group">
                        <label for="cursoDescripcion">Descripcion</label>
                        <input type="text" class="form-control" id="cursoDescripcion" name="cursoDescripcion" value="" required>
                    </div>
                    <div class="form-group">
                        <label for="cursoFecha">Fecha de inicio</label>
                        <input type="date" class="form-control" id="cursoFecha" name="cursoFecha" value="YYYY-MM-DD" required>
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
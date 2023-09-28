<!--modal para agregar nuevos cursos-->

<div class="modal fade" id="agregarCursoModal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-dark text-white">
                <h5 class="modal-title">Agregar curso</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                </button>
            </div>
            
            <form action="Curso.php?m=guardar"  method="POST" class="was-validated">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="curso">Curso</label>
                        <input type="text" class="form-control" name="curso" required>
                    </div>
                    <div class="form-group">
                        <label for="descripcion">Descripción</label>
                        <input type="text" class="form-control" name="descripcion" required>
                    </div>
                    <div class="form-group">
                        <label for="fecha">Fecha de inicio</label>
                        <!--en un principio, mostrará la fecha en formato día-mes-año, pero con el value
                         establecido, se enviará al servidor en formato año-mes-día-->
                        <input type="date" class="form-control" name="fecha"  value="YYYY-MM-DD" required>
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

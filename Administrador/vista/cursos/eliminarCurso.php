<!--modal para confimación de eliminar curso-->
<div class="modal fade" id="eliminarCursoModal" >
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-danger text-white">
                <h5 class="modal-title">Eliminar Curso</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                </button>
            </div>

            <h4> </h4>

            
            <form action="Curso.php?m=eliminar" method="POST">
                <div class="modal-footer">
                    <input type="hidden" id="cursoID" name="cursoID" value="">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-danger">Eliminar</button>
                </div>
            </form>

        </div>
    </div>
</div>
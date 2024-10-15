<div class="container">
    <h2>Fotos de <?php echo $mascota->nombre; ?></h2>

    <div class="row">
        <?php foreach ($fotos as $foto): ?>
            <div class="col-md-4 mb-4">
                <div class="card">
                    <img src="<?php echo base_url($foto->urlFoto); ?>" class="card-img-top" alt="Foto de mascota" style="height: 200px; object-fit: cover;">
                    <div class="card-body" align="center">
                        <td>
                            <button type="button" class="btn btn-danger fas fa-trash" data-toggle="modal" data-target="#confirmDeleteModal" data-id="<?php echo $foto->idFoto; ?>"> Eliminar</button>
                        </td>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

    <div class="mt-4">
        <h3>Agregar más fotos</h3>
        <form action="<?php echo site_url('mascota/agregarFotos/' . $idMascotas); ?>" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <input type="file" name="nuevas_fotos[]" multiple class="form-control-file" id="nuevasFotos">
            </div>
            <button type="submit" class="btn btn-primary">Subir Fotos</button>
        </form>
    </div>
</div>

<div class="modal fade" id="confirmDeleteModal" tabindex="-1" role="dialog"
            aria-labelledby="confirmDeleteModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="confirmDeleteModalLabel">Confirmar Eliminación</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        ¿Estás seguro de que quiere eliminar esta foto?
                    </div>
                    <div class="modal-footer">
                        <?php echo form_open("mascota/cambiarEstado"); ?>
                        <input type="hidden" name="idUsuario" id="deleteUserId" value="">
                        <input type="hidden" name="estado" value="0">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-danger">Confirmar</button>
                        <?php echo form_close(); ?>
                    </div>
                </div>
            </div>
        </div>

<script>
    function eliminarFoto(idFoto) {
        alert('Funcionalidad de eliminar foto aún no implementada. ID de foto: ' + idFoto);
    }
</script>
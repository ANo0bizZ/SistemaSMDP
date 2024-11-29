<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Lista de Mascotas </h3>
            </div>
        </div>
        <div class="col-md-12 col-sm-12 ">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Lista de Mascotas</h2>
                    <div class="clearfix"></div>
                </div>
                
                <div class="x_content">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card-box table-responsive">
                                <p class="text-muted font-13 m-b-30">
                                    La siguiente tabla muestra la lista de mascotas del refugio, incluyendo detalles como especie, raza, nombre y otros datos relevantes.
                                </p>
                                <table id="datatable-buttons" class="table table-striped table-bordered" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Especie</th>
                                            <th>Raza</th>
                                            <th>Nombre</th>
                                            <th>Fecha de Ingreso al Refugio</th>
                                            <th>Estado</th>
                                            <th>Edad</th>
                                            <th>Color</th>
                                            <th>Editar Fotos</th>
                                            <th>Editar Datos</th>
                                            <th>Eliminar</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $contador = 1; ?>
                                        <?php foreach ($mascotas as $mascota) : ?>
                                            <?php if ($mascota->estado == 0 || $mascota->estado == 1) : ?>
                                                <tr>
                                                    <td align="center"><?php echo $contador; ?></td>
                                                    <td align="center"><?php echo $mascota->nombreEspecie; ?></td>
                                                    <td align="center"><?php echo $mascota->nombreRaza; ?></td>
                                                    <td align="center"><?php echo $mascota->nombre; ?></td>
                                                    <td align="center"><?php echo $mascota->fechaIngreso; ?></td>
                                                    <td align="center">
                                                        <?php echo $mascota->estado == 0 ? "DISPONIBLE" : ($mascota->estado == 1 ? "EN PROCESO" : "ADOPTADO"); ?>
                                                    </td>
                                                    <td align="center"><?php echo date("Y") - intval($mascota->fechaNacMascota); ?></td>
                                                    <td align="center"><?php echo $mascota->color; ?></td>
                                                    <td align="center">
                                                        <a href="<?php echo site_url('mascota/modFotoMascota/' . $mascota->idMascotas); ?>" title="Editar Foto">
                                                            <i class="fa fa-image text-primary" style="font-size: 1.5em;"></i>
                                                        </a>
                                                    </td>
                                                    <td align="center">
                                                        <a href="<?php echo site_url('mascota/modMascota/' . $mascota->idMascotas); ?>" title="Editar">
                                                            <i class="fa fa-edit text-warning" style="font-size: 1.5em;"></i>
                                                        </a>
                                                    </td>
                                                    <td align="center">
                                                        <a href="#" data-toggle="modal" data-target="#confirmDeleteModal" data-id="<?php echo $mascota->idMascotas; ?>" title="Eliminar">
                                                            <i class="fa fa-trash text-danger" style="font-size: 1.5em;"></i>
                                                        </a>
                                                    </td>
                                                </tr>
                                                <?php $contador++; ?>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="confirmDeleteModal" tabindex="-1" role="dialog" aria-labelledby="confirmDeleteModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="confirmDeleteModalLabel">Confirmar Cambio de Estado</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        ¿Estás seguro de que quiere eliminar a esta mascota?
                    </div>
                    <div class="modal-footer">
                        <?php echo form_open("mascota/cambiarEstadoMascota"); ?>
                        <input type="hidden" name="idMascota" id="deleteUserId" value="">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-danger">Confirmar</button>
                        <?php echo form_close(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('#confirmDeleteModal').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget);
            var userId = button.data('id');
            var modal = $(this);
            modal.find('#deleteUserId').val(userId);
        });
    });
</script>
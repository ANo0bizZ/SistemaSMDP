<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Solicitudes de Voluntarios </h3>
            </div>

        </div>
        <div class="col-md-12 col-sm-12 ">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Solicitudes de Voluntarios</h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card-box table-responsive">
                                <p class="text-muted font-13 m-b-30">
                                    Aquí puedes gestionar las solicitudes de voluntariado enviadas por los usuarios.
                                </p>
                                <table id="datatable-buttons" class="table table-striped table-bordered" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th class="text-center">No.</th>
                                            <th class="text-center">Nombres</th>
                                            <th class="text-center">Primer Apellido</th>
                                            <th class="text-center">Segundo Apellido</th>
                                            <th class="text-center">Correo</th>
                                            <th class="text-center">Edad</th>
                                            <th class="text-center">Celular</th>
                                            <th class="text-center">Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $contador = 1; ?>
                                        <?php foreach ($solicitudes as $indice => $solicitud): ?>
                                            <tr>
                                                <td align="center"><?php echo $contador; ?></td>
                                                <td><?= $solicitud['nombres']; ?></td>
                                                <td><?= $solicitud['primerApellido']; ?></td>
                                                <td><?= $solicitud['segundoApellido']; ?></td>
                                                <td><?= $solicitud['usuario']; ?></td>
                                                <td>
                                                    <?php
                                                    $fechaNacimiento = new DateTime($solicitud['fechaNacimiento']);
                                                    $hoy = new DateTime();
                                                    $edad = $hoy->diff($fechaNacimiento)->y;
                                                    echo $edad;
                                                    ?>
                                                </td>
                                                <td><?= isset($solicitud['celular']) ? $solicitud['celular'] : 'N/A'; ?></td>
                                                <td class="text-center">
                                                    <a href="<?= site_url('usuario/aceptarSolicitud/' . $indice); ?>" class="btn btn-success" title="Aceptar">
                                                        <i class="fa fa-check"></i>
                                                    </a>
                                                    <a href="<?= site_url('usuario/rechazarSolicitud/' . $indice); ?>" class="btn btn-danger" title="Rechazar">
                                                        <i class="fa fa-times"></i>
                                                    </a>
                                                </td>

                                            </tr>
                                            <?php $contador++; ?>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal de error -->
    <?php if ($this->session->flashdata('error')) : ?>
        <div class="modal fade" id="errorModal" tabindex="-1" role="dialog" aria-labelledby="errorModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="errorModalLabel">Error</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <?php echo $this->session->flashdata('error'); ?>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>
</div>
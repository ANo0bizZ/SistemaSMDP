<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Lista de Solicitudes </h3>
            </div>

        </div>
        <div class="col-md-12 col-sm-12 ">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Lista de Solicitudes</h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </li>
                        <li><a class="close-link"><i class="fa fa-close"></i></a>
                        </li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <form action="<?php echo site_url('adopciones/solicitudesAprobadas'); ?>" method="post">
                        <button type="submit" class="btn btn-success" style="margin-bottom: 15px;">
                            Lista de Adopciones Aprobadas
                        </button>
                    </form>
                    <div class="card-box table-responsive">
                        <table class="table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Nombre del Adoptante</th>
                                    <th>Carnet de Identidad</th>
                                    <th>Celular</th>
                                    <th>Edad</th>
                                    <th>Dirección</th>
                                    <th>Descripción</th>
                                    <th>Mascotas</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $contador = 1; ?>
                                <?php foreach ($solicitudes as $solicitud): ?>
                                    <tr>
                                        <td align="center"><?php echo $contador; ?></td>
                                        <td align="center"><?php echo $solicitud->nombres . ' ' . $solicitud->primerApellido; ?></td>
                                        <td align="center"><?php echo $solicitud->ci; ?></td>
                                        <td align="center"><?php echo $solicitud->celular; ?></td>
                                        <td align="center">
                                            <?php
                                            $fecha_nacimiento = new DateTime($solicitud->fechaNacimiento);
                                            $hoy = new DateTime();
                                            $edad = $hoy->diff($fecha_nacimiento)->y;
                                            echo $edad;
                                            ?>
                                        </td>
                                        <td align="center"><?php echo $solicitud->direccion; ?></td>
                                        <td align="center"><?php echo $solicitud->descripcion; ?></td>
                                        <td align="center"><?php echo $solicitud->nombresMascotas; ?></td>
                                        <td align="center">
                                            <a href="javascript:void(0);" onclick="confirmarAccion('aprobar', <?php echo $solicitud->idSolicitud; ?>)" title="Aprobar">
                                                <i class="fa fa-check-circle text-success" style="font-size: 1.5em;"></i>
                                            </a>
                                            <a href="javascript:void(0);" onclick="confirmarAccion('rechazar', <?php echo $solicitud->idSolicitud; ?>)" title="Rechazar" style="margin-left: 10px;">
                                                <i class="fa fa-times-circle text-danger" style="font-size: 1.5em;"></i>
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

        <!-- Modal -->
        <div class="modal fade" id="confirmModal" tabindex="-1" aria-labelledby="confirmModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="confirmModalLabel">Confirmación</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        ¿Estás seguro que deseas <span id="modalActionText"></span> esta solicitud?
                    </div>
                    <div class="modal-footer">
                        <form id="confirmForm" method="post">
                            <input type="hidden" name="idSolicitud" id="modalSolicitudId" value="">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                            <button type="submit" class="btn btn-success">Confirmar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <script>
            var confirmModal = document.getElementById('confirmModal');
            confirmModal.addEventListener('show.bs.modal', function(event) {
                var button = event.relatedTarget;
                var action = button.getAttribute('data-action');
                var idSolicitud = button.getAttribute('data-id');
                var actionText = action === 'aprobar' ? 'aprobar' : 'rechazar';
                document.getElementById('modalActionText').textContent = actionText;
                var formAction = action === 'aprobar' ?
                    '<?php echo site_url("adopciones/aprobarSolicitud"); ?>' :
                    '<?php echo site_url("adopciones/rechazarSolicitud"); ?>';

                document.getElementById('confirmForm').action = formAction;
                document.getElementById('modalSolicitudId').value = idSolicitud;
            });
        </script>
        <script>
            function confirmarAccion(accion, idSolicitud) {
                const titulo = accion === 'aprobar' ? '¿Aprobar solicitud?' : '¿Rechazar solicitud?';
                const mensaje = accion === 'aprobar' ?
                    '¿Estás seguro de que deseas aprobar esta solicitud?' :
                    '¿Estás seguro de que deseas rechazar esta solicitud?';
                const confirmButtonText = accion === 'aprobar' ? 'Sí, aprobar' : 'Sí, rechazar';

                Swal.fire({
                    title: titulo,
                    text: mensaje,
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#0A8A37',
                    cancelButtonColor: '#d33',
                    confirmButtonText: confirmButtonText,
                    cancelButtonText: 'Cancelar'
                }).then((result) => {
                    if (result.isConfirmed) {
                        const url = accion === 'aprobar' ?
                            '<?php echo site_url('adopciones/aprobarSolicitud'); ?>' :
                            '<?php echo site_url('adopciones/rechazarSolicitud'); ?>';

                        // Enviar solicitud AJAX con fetch
                        fetch(url, {
                                method: 'POST',
                                headers: {
                                    'Content-Type': 'application/x-www-form-urlencoded'
                                },
                                body: `idSolicitud=${idSolicitud}`
                            })
                            .then(response => response.json())
                            .then(data => {
                                // Verificar respuesta y mostrar mensaje
                                if (data.success) {
                                    Swal.fire(
                                        '¡Hecho!',
                                        data.message,
                                        'success'
                                    ).then(() => location.reload());
                                } else {
                                    Swal.fire(
                                        'Error',
                                        data.error || 'Hubo un problema al procesar la solicitud.',
                                        'error'
                                    );
                                }
                            })
                            .catch(error => {
                                Swal.fire(
                                    'Error',
                                    'Hubo un problema al enviar la solicitud.',
                                    'error'
                                );
                            });
                    }
                });
            }
        </script>
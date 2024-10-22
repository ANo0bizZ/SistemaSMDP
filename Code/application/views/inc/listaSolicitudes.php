<main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" data-scroll="true">
        <div class="container-fluid py-1 px-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                    <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Paginas</a></li>
                    <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Lista de Solicitudes</li>
                </ol>
                <h6 class="font-weight-bolder mb-0">Lista de Solicitudes</h6>
            </nav>
            <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
                <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                    <div class="input-group input-group-outline">
                        <label class="form-label">Type here...</label>
                        <input type="text" class="form-control">
                    </div>
                </div>
                <ul class="navbar-nav  justify-content-end">
                    <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
                        <a href="javascript:;" class="nav-link text-body p-0" id="iconNavbarSidenav">
                            <div class="sidenav-toggler-inner">
                                <i class="sidenav-toggler-line"></i>
                                <i class="sidenav-toggler-line"></i>
                                <i class="sidenav-toggler-line"></i>
                            </div>
                        </a>
                    </li>
                    <li class="nav-item px-3 d-flex align-items-center">
                        <a href="javascript:;" class="nav-link text-body p-0">
                            <i class="fa fa-cog fixed-plugin-button-nav cursor-pointer"></i>
                        </a>
                    </li>
                    <li class="nav-item dropdown pe-2 d-flex align-items-center">
                        <a href="javascript:;" class="nav-link text-body p-0" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fa fa-bell cursor-pointer"></i>
                        </a>
                    </li>
                    <li class="nav-item d-flex align-items-center">
                        <a href="<?php echo site_url('usuario/logout'); ?>" class="btn btn-success text-body font-weight-bold px-3">
                            <i class="material-icons opacity-10">exit_to_app</i>
                            <span class="d-sm-inline d-none">Cerrar Sesión</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav><br>
    <form action="<?php echo site_url('adopciones/solicitudesAprobadas'); ?>" method="post">
        <button type="submit" style="width: 25%; padding: 10px; background: #4CAF50; color: white; border: none; border-radius: 10px;">
            Lista de Adopciones Aprobadas
        </button>
    </form>
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card my-4">
                    <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                        <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                            <h6 class="text-white text-capitalize ps-3">Lista de solicitudes</h6>
                        </div>
                    </div>
                    <div class="card-body px-0 pb-2">
                        <div class="table-responsive p-0">
                            <table class="table align-items-center mb-0">
                                <thead>
                                    <tr>
                                        <th class="text-center text-uppercase text-primary text-xxl font-weight-bolder opacity-7">No.</th>
                                        <th class="text-center text-uppercase text-primary text-xxl font-weight-bolder opacity-7">Nombre del Adoptante</th>
                                        <th class="text-center text-uppercase text-primary text-xxl font-weight-bolder opacity-7">Carnet de Identidad</th>
                                        <th class="text-center text-uppercase text-primary text-xxl font-weight-bolder opacity-7">Celular</th>
                                        <th class="text-center text-uppercase text-primary text-xxl font-weight-bolder opacity-7">Edad</th>
                                        <th class="text-center text-uppercase text-primary text-xxl font-weight-bolder opacity-7">Dirección</th>
                                        <th class="text-center text-uppercase text-primary text-xxl font-weight-bolder opacity-7">Descripción</th>
                                        <th class="text-center text-uppercase text-primary text-xxl font-weight-bolder opacity-7">Mascotas</th>
                                        <th class="text-center text-uppercase text-primary text-xxl font-weight-bolder opacity-7">Acciones</th>
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
                                                <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#confirmModal"
                                                    data-id="<?php echo $solicitud->idSolicitud; ?>" data-action="aprobar">
                                                    Aprobar
                                                </button>

                                                <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#confirmModal"
                                                    data-id="<?php echo $solicitud->idSolicitud; ?>" data-action="rechazar">
                                                    Rechazar
                                                </button>
                                            </td>
                                        </tr>
                                        <?php $contador++; ?>
                                    <?php endforeach; ?>
                                <tfoot>
                                    <tr>
                                        <th class="text-center text-uppercase text-primary text-xxl font-weight-bolder opacity-7">No.</th>
                                        <th class="text-center text-uppercase text-primary text-xxl font-weight-bolder opacity-7">Nombre del Adoptante</th>
                                        <th class="text-center text-uppercase text-primary text-xxl font-weight-bolder opacity-7">Carnet de Identidad</th>
                                        <th class="text-center text-uppercase text-primary text-xxl font-weight-bolder opacity-7">Celular</th>
                                        <th class="text-center text-uppercase text-primary text-xxl font-weight-bolder opacity-7">Edad</th>
                                        <th class="text-center text-uppercase text-primary text-xxl font-weight-bolder opacity-7">Dirección</th>
                                        <th class="text-center text-uppercase text-primary text-xxl font-weight-bolder opacity-7">Descripción</th>
                                        <th class="text-center text-uppercase text-primary text-xxl font-weight-bolder opacity-7">Mascotas</th>
                                        <th class="text-center text-uppercase text-primary text-xxl font-weight-bolder opacity-7">Acciones</th>
                                    </tr>
                                </tfoot>
                                </tbody>
                            </table>
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
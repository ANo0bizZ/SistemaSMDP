<nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" data-scroll="true">
    <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Paginas</a></li>
                <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Lista de Solicitudes de Voluntarios</li>
            </ol>
            <h6 class="font-weight-bolder mb-0">Lista de Solicitudes de Voluntarios</h6>
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
</nav>
<!-- End Navbar -->
<div class="container-fluid py-4">
    <div id="confimacionInsert"></div>
    <!-- Mensaje de error -->
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
    <div class="row">
        <div class="col-12">
            <div class="card my-4">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                        <h6 class="text-white text-capitalize ps-3">Lista de Solicitudes de Voluntarios</h6>
                    </div>
                </div>
                <div class="card-body px-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-center text-uppercase text-primary text-xxl font-weight-bolder opacity-7">No.</th>
                                    <th class="text-center text-uppercase text-primary text-xxl font-weight-bolder opacity-7">Nombres</th>
                                    <th class="text-center text-uppercase text-primary text-xxl font-weight-bolder opacity-7">Primer Apellido</th>
                                    <th class="text-center text-uppercase text-primary text-xxl font-weight-bolder opacity-7">Segundo Apellido</th>
                                    <th class="text-center text-uppercase text-primary text-xxl font-weight-bolder opacity-7">Correo</th>
                                    <th class="text-center text-uppercase text-primary text-xxl font-weight-bolder opacity-7">Edad</th>
                                    <th class="text-center text-uppercase text-primary text-xxl font-weight-bolder opacity-7">Acciones</th>
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
                                        <td><?= $solicitud['fechaNacimiento']; ?></td>
                                        <td>
                                            <a href="<?= site_url('usuario/aceptarSolicitud/' . $indice); ?>" class="btn btn-success">Aceptar</a>
                                            <a href="<?= site_url('usuario/rechazarSolicitud/' . $indice); ?>" class="btn btn-danger">Rechazar</a>
                                        </td>
                                    </tr>
                                    <?php $contador++; ?>
                                <?php endforeach; ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th class="text-center text-uppercase text-primary text-xxl font-weight-bolder opacity-7">No.</th>
                                    <th class="text-center text-uppercase text-primary text-xxl font-weight-bolder opacity-7">Nombres</th>
                                    <th class="text-center text-uppercase text-primary text-xxl font-weight-bolder opacity-7">Primer Apellido</th>
                                    <th class="text-center text-uppercase text-primary text-xxl font-weight-bolder opacity-7">Segundo Apellido</th>
                                    <th class="text-center text-uppercase text-primary text-xxl font-weight-bolder opacity-7">Correo</th>
                                    <th class="text-center text-uppercase text-primary text-xxl font-weight-bolder opacity-7">Edad</th>
                                    <th class="text-center text-uppercase text-primary text-xxl font-weight-bolder opacity-7">Acciones</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    </body>

                    </html>
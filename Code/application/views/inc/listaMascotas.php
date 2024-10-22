<main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" data-scroll="true">
        <div class="container-fluid py-1 px-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                    <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Paginas</a></li>
                    <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Lista de Mascotas</li>
                </ol>
                <h6 class="font-weight-bolder mb-0">Lista de Mascotas</h6>
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
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card my-4">
                    <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                        <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                            <h6 class="text-white text-capitalize ps-3">Lista de Mascotas</h6>
                        </div>
                    </div>
                    <div class="card-body px-0 pb-2">
                        <div class="table-responsive p-0">
                            <table class="table align-items-center mb-0">
                                <thead>
                                    <tr>
                                        <th class="text-center text-uppercase text-primary text-xxl font-weight-bolder opacity-7">No.</th>
                                        <th class="text-center text-uppercase text-primary text-xxl font-weight-bolder opacity-7">Especie</th>
                                        <th class="text-center text-uppercase text-primary text-xxl font-weight-bolder opacity-7">Raza</th>
                                        <th class="text-center text-uppercase text-primary text-xxl font-weight-bolder opacity-7">Nombre</th>
                                        <th class="text-center text-uppercase text-primary text-xxl font-weight-bolder opacity-7">Fecha de Ingreso <br>al Refugio</th>
                                        <th class="text-center text-uppercase text-primary text-xxl font-weight-bolder opacity-7">Estado</th>
                                        <th class="text-center text-uppercase text-primary text-xxl font-weight-bolder opacity-7">Edad</th>
                                        <th class="text-center text-uppercase text-primary text-xxl font-weight-bolder opacity-7">Color</th>
                                        <th class="text-center text-uppercase text-primary text-xxl font-weight-bolder opacity-7">Editar Fotos</th>
                                        <th class="text-center text-uppercase text-primary text-xxl font-weight-bolder opacity-7">Editar Datos</th>
                                        <th class="text-center text-uppercase text-primary text-xxl font-weight-bolder opacity-7">Eliminar</th>
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
                                                    <?php
                                                    if ($mascota->estado == 0) {
                                                        echo "DISPONIBLE";
                                                    } elseif ($mascota->estado == 1) {
                                                        echo "EN PROCESO";
                                                    } elseif ($mascota->estado == 2) {
                                                        echo "ADOPTADO";
                                                    } else {
                                                        echo "ROL NO CONOCIDO";
                                                    }
                                                    ?>
                                                </td>
                                                <td align="center">
                                                    <?php
                                                    $anioNacMascota = intval($mascota->fechaNacMascota);
                                                    $anioActual = intval(date("Y"));
                                                    $edad = $anioActual - $anioNacMascota;
                                                    echo $edad;
                                                    ?>
                                                </td>
                                                <td align="center"><?php echo $mascota->color; ?></td>
                                                <td align="center">
                                                    <?php echo form_open("mascota/modFotoMascota"); ?>
                                                    <input type="hidden" name="idMascotas" value="<?php echo $mascota->idMascotas; ?>">
                                                    <a href="<?php echo site_url('mascota/modFotoMascota/' . $mascota->idMascotas); ?>" class="btn btn-primary fas fa-image"> Editar Foto</a>
                                                    <?php echo form_close(); ?>
                                                </td>
                                                <td align="center">
                                                    <?php echo form_open("mascota/modMascota"); ?>
                                                    <input type="hidden" name="idMascotas" value="<?php echo $mascota->idMascotas; ?>">
                                                    <button type="submit" class="btn btn-warning fas fa-edit"> Editar</button>
                                                    <?php echo form_close(); ?>
                                                </td>
                                                <td align="center">
                                                    <button type="button" class="btn btn-danger fas fa-trash" data-toggle="modal" data-target="#confirmDeleteModal" data-id="<?php echo $mascota->idMascotas; ?>"> Eliminar</button>
                                                </td>
                                            </tr>
                                            <?php $contador++; ?>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </tbody>

                                <tfoot>
                                    <tr>
                                        <th class="text-center text-uppercase text-primary text-xxl font-weight-bolder opacity-7">No.</th>
                                        <th class="text-center text-uppercase text-primary text-xxl font-weight-bolder opacity-7">Especie</th>
                                        <th class="text-center text-uppercase text-primary text-xxl font-weight-bolder opacity-7">Raza</th>
                                        <th class="text-center text-uppercase text-primary text-xxl font-weight-bolder opacity-7">Nombre</th>
                                        <th class="text-center text-uppercase text-primary text-xxl font-weight-bolder opacity-7">Fecha de Ingreso <br>al Refugio</th>
                                        <th class="text-center text-uppercase text-primary text-xxl font-weight-bolder opacity-7">Estado</th>
                                        <th class="text-center text-uppercase text-primary text-xxl font-weight-bolder opacity-7">Edad</th>
                                        <th class="text-center text-uppercase text-primary text-xxl font-weight-bolder opacity-7">Color</th>
                                        <th class="text-center text-uppercase text-primary text-xxl font-weight-bolder opacity-7">Editar Fotos</th>
                                        <th class="text-center text-uppercase text-primary text-xxl font-weight-bolder opacity-7">Editar Datos</th>
                                        <th class="text-center text-uppercase text-primary text-xxl font-weight-bolder opacity-7">Eliminar</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="confirmDeleteModal" tabindex="-1" role="dialog"
            aria-labelledby="confirmDeleteModalLabel" aria-hidden="true">
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
                        <input type="hidden" name="estado" value="1">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-danger">Confirmar</button>
                        <?php echo form_close(); ?>
                    </div>
                </div>
            </div>
        </div>

        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

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
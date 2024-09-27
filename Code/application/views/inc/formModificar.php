<nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur"
    data-scroll="true">
    <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Páginas</a></li>
                <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Editar Usuario
                    <h6 class="font-weight-bolder mb-0">Editar datos de Usuario</h6>
        </nav>
        <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
            <div class="ms-md-auto pe-md-3 d-flex align-items-center">
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

<?php foreach ($usuario->result() as $row): ?>

    <div class="container-fluid">
        <div id="confirmacionInsert"></div>
        <div class="row">
            <div class="col-3"></div>
            <div class="col-6">
                <?php echo form_open_multipart("usuario/modificarbdUsuario"); ?>
                <div class="form-group">
                    <input type="hidden" class="form-control" name="idUsuario" value="<?php echo $row->idUsuario; ?>" readonly>
                </div>
                <div class="form-group">
                    <label for="nombres">Nombre(s)</label>
                    <input type="text" class="form-control" name="nombres" value="<?php echo $row->nombres; ?>" minlength="3" required>
                </div>
                <div class="form-group">
                    <label for="primerApellido">Primer Apellido</label>
                    <input type="text" class="form-control" name="primerApellido" value="<?php echo $row->primerApellido; ?>" minlength="3" maxlength="20" required>
                </div>
                <div class="form-group">
                    <label for="segundoApellido">Segundo Apellido</label>
                    <input type="text" class="form-control" name="segundoApellido" value="<?php echo $row->segundoApellido; ?>" minlength="3" maxlength="20" required>
                </div>
                <div class="form-group">
                    <label for="fechaNac">Fecha De Nacimiento</label>
                    <input type="date" class="form-control" name="fechaNacimiento" id="fechaNacimiento" value="<?php echo $row->fechaNacimiento; ?>">
                </div>
                <div class="form-group">
                    <label for="usuario">Correo Electronico</label>
                    <input type="email" class="form-control" name="usuario" value="<?php echo $row->usuario; ?>" minlength="3" maxlength="40" required>
                </div>
                <div class="form-group">
                    <label for="tipoUsuario">Rol del Usuario</label>
                    <select class="form-control" name="rol" id="rol">
                        <option value="1" <?php if ($row->rol == '1') echo 'selected'; ?>>Adoptante</option>
                        <option value="2" <?php if ($row->rol == '2') echo 'selected'; ?>>Voluntario</option>
                    </select>
                </div>
                <div class="row">
                    <div class="col-12">
                        <button type="submit" class="btn btn-success">Modificar Usuario</button>
                    </div>
                </div>
                <?php echo form_close(); ?>
            </div>
            <div class="col-3"></div>
        </div>
    </div>


<?php endforeach; ?>
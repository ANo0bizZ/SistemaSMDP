<nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur"
    data-scroll="true">
    <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark"
                        href="javascript:;">Paginas</a></li>
                <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Agregar Usuario</li>
            </ol>
            <h6 class="font-weight-bolder mb-0">Agregar Usuario</h6>
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
                    <a href="javascript:;" class="nav-link text-body p-0" id="dropdownMenuButton"
                        data-bs-toggle="dropdown" aria-expanded="false">
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
<div class="container" id="container" style="max-width: 600px; margin: auto;">
    <div class="form-container sign-up" style="padding: 30px; box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1); border-radius: 15px; background: #fff;">
        <form action="<?php echo site_url('usuario/registrarUsuario'); ?>" method="post" id="formRegistro">
            <h3 style="text-align: center; margin-bottom: 20px;">Crear Cuenta</h3>
            <input type="text" name="nombres" placeholder="Nombre(s)" required style="width: 100%; margin-bottom: 15px; padding: 10px; border-radius: 10px; border: 1px solid #ddd;">
            <div style="display: flex; gap: 10px; margin-bottom: 15px;">
                <input type="text" name="primerApellido" placeholder="Primer Apellido" style="flex: 1; padding: 10px; border-radius: 10px; border: 1px solid #ddd;" required>
                <input type="text" name="segundoApellido" placeholder="Segundo Apellido" style="flex: 1; padding: 10px; border-radius: 10px; border: 1px solid #ddd;">
            </div>
            <label for="rol" style="margin-bottom: 5px;">Fecha de Nacimiento</label>
            <input type="date" name="fechaNacimiento" placeholder="Fecha de Nacimiento" required style="width: 100%; margin-bottom: 15px; padding: 10px; border-radius: 10px; border: 1px solid #ddd;">
            <input type="number" name="ci" placeholder="Cedula de Identidad" required style="width: 100%; margin-bottom: 15px; padding: 10px; border-radius: 10px; border: 1px solid #ddd;">
            <input type="email" name="usuario" placeholder="Email" required style="width: 100%; margin-bottom: 15px; padding: 10px; border-radius: 10px; border: 1px solid #ddd;">
            <input type="password" name="contra" placeholder="Password" required style="width: 100%; margin-bottom: 15px; padding: 10px; border-radius: 10px; border: 1px solid #ddd;">
            <label for="rol" style="margin-bottom: 5px;">¿Qué rol tendrá?</label>
            <select class="form-control" name="rol" id="rol" style="width: 100%; margin-bottom: 15px; padding: 10px; border-radius: 10px; border: 1px solid #ddd;" required>
                <option value="1">Adoptante</option>
                <option value="2">Voluntario</option>
            </select>
            <button type="submit" style="width: 100%; padding: 10px; background: #4CAF50; color: white; border: none; border-radius: 10px;">Registrarse</button>
        </form>
    </div>
</div>

<div class="modal fade" id="successModal" tabindex="-1" role="dialog" aria-labelledby="successModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header" style="border-bottom: none;">
                <h5 class="modal-title" id="successModalLabel">¡Registro Exitoso!</h5>
            </div>
            <div class="modal-body">
                El usuario se ha registrado correctamente.
            </div>
            <div class="modal-footer" style="border-top: none;">
                <button type="button" class="btn btn-success" id="btnAceptar">Aceptar</button>
            </div>
        </div>
    </div>
</div>

<script>
    document.getElementById('formRegistro').addEventListener('submit', function(event) {
        event.preventDefault();
        var form = this;
        var xhr = new XMLHttpRequest();
        xhr.open('POST', form.action, true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.onload = function() {
            if (xhr.status === 200) {
                form.reset();
                $('#successModal').modal('show');
            }
        };
        xhr.send(new URLSearchParams(new FormData(form)).toString());
    });
    document.getElementById('btnAceptar').addEventListener('click', function() {
        $('#successModal').modal('hide');
    });
</script>
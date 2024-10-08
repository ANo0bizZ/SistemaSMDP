<?php foreach ($usuario->result() as $row): ?>
    <div class="container-fluid">
        <div id="confirmacionInsert"></div>
        <div class="row">
            <div class="col-3"></div>
            <div class="col-6">
                <?php echo form_open_multipart("visitante/modificarbdUsuario", array('id' => 'modificarUsuarioForm')); ?>
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
                    <input type="text" class="form-control" name="segundoApellido" value="<?php echo $row->segundoApellido; ?>" minlength="3" maxlength="20">
                </div>
                <div class="form-group">
                    <label for="fechaNac">Fecha De Nacimiento</label>
                    <input type="date" class="form-control" name="fechaNacimiento" id="fechaNacimiento" value="<?php echo $row->fechaNacimiento; ?>">
                </div>
                <div class="form-group">
                    <label for="usuario">Correo Electrónico</label>
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
                    <div class="col-12" align="center">
                        <button id="modificarUsuarioBtn" type="submit" class="btn btn-success">Modificar Usuario</button>
                    </div>
                </div><br>
                <?php echo form_close(); ?>
            </div>
            <div class="col-3"></div>
        </div>

        <div class="row">
            <div class="col-3"></div>
            <div class="col-6">
                <?php echo form_open_multipart("visitante/modContra", array('id' => 'cambiarContraForm')); ?>
                <div class="form-group">
                    <input type="hidden" class="form-control" name="idUsuario" value="<?php echo $row->idUsuario; ?>" readonly>
                </div>
                <div class="form-group">
                    <label for="contraActual">Ingrese su Contraseña Actual</label>
                    <input type="password" class="form-control" id="contraActual" name="contraActual" minlength="3" required>
                </div>

                <div class="form-group">
                    <label for="nuevaContra">Nueva Contraseña</label>
                    <input type="password" class="form-control" name="nuevaContra" id="nuevaContra" minlength="3" required>
                </div>
                <div class="form-group">
                    <label for="confirmarContra">Repita su Nueva Contraseña</label>
                    <input type="password" class="form-control" name="confirmarContra" id="confirmarContra" minlength="3" required>
                </div>
                <div id="passwordMatchError" style="color: red; display: none;">Las contraseñas no coinciden</div>
                <div class="row">
                    <div class="col-12" align="center">
                        <button type="submit" class="btn btn-success" id="cambiarContraBtn">Cambiar Contraseña</button>
                    </div>
                </div>
                <?php echo form_close(); ?>
            </div>
            <div class="col-3"></div>
        </div>
    </div>
<?php endforeach; ?>

<script>
    document.getElementById('cambiarContraBtn').addEventListener('click', function(e) {
        e.preventDefault();

        var nuevaContra = document.getElementById('nuevaContra').value;
        var confirmarContra = document.getElementById('confirmarContra').value;
        var errorElement = document.getElementById('passwordMatchError');

        if (nuevaContra !== confirmarContra) {
            errorElement.style.display = 'block';
        } else {
            errorElement.style.display = 'none';

            Swal.fire({
                title: '¡Éxito!',
                text: 'La contraseña ha sido modificada con éxito',
                icon: 'success',
                confirmButtonText: 'Aceptar',
                confirmButtonColor: '#28a745'
            }).then((result) => {
                if (result.isConfirmed) {
                    setTimeout(() => {
                        document.getElementById('cambiarContraForm').submit();
                    }, 100);
                }
            });
        }
    });

    document.getElementById('modificarUsuarioBtn').addEventListener('click', function(e) {
        e.preventDefault();

        Swal.fire({
            title: '¡Éxito!',
            text: 'Se modificaron los datos de manera exitosa',
            icon: 'success',
            confirmButtonText: 'Aceptar',
            confirmButtonColor: '#28a745'
        }).then((result) => {
            if (result.isConfirmed) {
                setTimeout(() => {
                    document.getElementById('modificarUsuarioForm').submit();
                }, 100);
            }
        });
    });
</script>
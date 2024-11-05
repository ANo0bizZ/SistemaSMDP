<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Modificar Usuario</h3>
            </div>
        </div>
        <div class="col-md-12 col-sm-12 ">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Modificar Información del Usuario</h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                        <li><a class="close-link"><i class="fa fa-close"></i></a></li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <div class="container" id="container" style="max-width: 600px; margin: auto;">
                        <div class="form-container" style="padding: 30px; box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1); border-radius: 15px; background: #fff;">
                            <?php if(isset($usuario) && $usuario->num_rows() > 0): ?>
                                <?php foreach ($usuario->result() as $row): ?>
                                    <?php echo form_open_multipart("usuario/modificarbdUsuario"); ?>
                                    <h3 style="text-align: center; margin-bottom: 20px;">Editar Usuario</h3>
                                    
                                    <input type="hidden" class="form-control" name="idUsuario" value="<?php echo $row->idUsuario; ?>" readonly>

                                    <div style="margin-bottom: 15px;">
                                        <label for="nombres" style="margin-bottom: 5px;">Nombre(s)</label>
                                        <input type="text" class="form-control" name="nombres" value="<?php echo $row->nombres; ?>" minlength="3" required style="width: 100%; padding: 10px; border-radius: 10px; border: 1px solid #ddd;">
                                    </div>
                                
                                <div style="margin-bottom: 15px;">
                                    <label for="primerApellido" style="margin-bottom: 5px;">Primer Apellido</label>
                                    <input type="text" class="form-control" name="primerApellido" value="<?php echo $row->primerApellido; ?>" minlength="3" maxlength="20" required style="width: 100%; padding: 10px; border-radius: 10px; border: 1px solid #ddd;">
                                </div>

                                <div style="margin-bottom: 15px;">
                                    <label for="segundoApellido" style="margin-bottom: 5px;">Segundo Apellido</label>
                                    <input type="text" class="form-control" name="segundoApellido" value="<?php echo $row->segundoApellido; ?>" minlength="3" maxlength="20" style="width: 100%; padding: 10px; border-radius: 10px; border: 1px solid #ddd;">
                                </div>

                                <div style="margin-bottom: 15px;">
                                    <label for="fechaNacimiento" style="margin-bottom: 5px;">Fecha De Nacimiento</label>
                                    <input type="date" class="form-control" name="fechaNacimiento" id="fechaNacimiento" value="<?php echo $row->fechaNacimiento; ?>" style="width: 100%; padding: 10px; border-radius: 10px; border: 1px solid #ddd;">
                                </div>

                                <div style="margin-bottom: 15px;">
                                    <label for="usuario" style="margin-bottom: 5px;">Correo Electrónico</label>
                                    <input type="email" class="form-control" name="usuario" value="<?php echo $row->usuario; ?>" minlength="3" maxlength="40" required style="width: 100%; padding: 10px; border-radius: 10px; border: 1px solid #ddd;">
                                </div>

                                <div style="margin-bottom: 15px;">
                                    <label for="rol" style="margin-bottom: 5px;">Rol del Usuario</label>
                                    <select class="form-control" name="rol" id="rol" style="width: 100%; padding: 10px; border-radius: 10px; border: 1px solid #ddd;">
                                        <option value="1" <?php if ($row->rol == '1') echo 'selected'; ?>>Adoptante</option>
                                        <option value="2" <?php if ($row->rol == '2') echo 'selected'; ?>>Voluntario</option>
                                    </select>
                                </div>

                                <button type="submit" class="btn btn-success" style="width: 100%; padding: 10px; background: #4CAF50; color: white; border: none; border-radius: 10px;">Modificar Usuario</button>

                                    <?php echo form_close(); ?>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <div class="alert alert-danger">
                                    No se encontró la información del usuario.
                                </div>
                                <a href="<?php echo site_url('usuario/listaUsuarios'); ?>" class="btn btn-primary">Volver a la lista</a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
document.querySelector('form').addEventListener('submit', function(e) {
    e.preventDefault();
    
    Swal.fire({
        title: '¿Estás seguro?',
        text: "¿Deseas guardar los cambios realizados?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#0A8A37',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Sí, guardar cambios',
        cancelButtonText: 'Cancelar'
    }).then((result) => {
        if (result.isConfirmed) {
            this.submit(); 
        }
    });
});
</script>
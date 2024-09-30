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
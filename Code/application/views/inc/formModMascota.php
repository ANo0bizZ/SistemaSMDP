<br><br>
<h1>Modificar Mascota</h1>
<br>

<section class="content">
    <div class="container-fluid">
        <div id="confirmacionInsert"></div>
        <div class="row">
            <div class="col-3"></div>
            <div class="col-6">
                <?php echo form_open_multipart("mascota/modificarbdMascota"); ?>
                <div class="form-group">
                    <input type="hidden" class="form-control" name="idMascotas" value="<?php echo $mascota->idMascotas; ?>" readonly>
                </div>
                <div class="form-group">
                    <label for="nombres">Nombre</label>
                    <input type="text" class="form-control" name="nombre" value="<?php echo $mascota->nombre; ?>" minlength="3" required>
                </div>
                <div class="form-group">
                    <label for="fechaNac">Año de Nacimiento</label>
                    <input type="number" class="form-control" name="fechaNacMascota" id="fechaNacMascota" min="1900" max="<?php echo date('Y'); ?>" value="<?php echo date('Y', strtotime($mascota->fechaNacMascota)); ?>">
                </div>

                <div class="form-group">
                    <label for="usuario">Color</label>
                    <input type="text" class="form-control" name="color" value="<?php echo $mascota->color; ?>" minlength="3" maxlength="40" required>
                </div>
                <div class="form-group">
                    <label for="sexo">Genero de la Mascota</label>
                    <select class="form-control" name="sexo" id="sexo">
                        <option value="0" <?php if ($mascota->sexo == '0') echo 'selected'; ?>>Hembra</option>
                        <option value="1" <?php if ($mascota->sexo == '1') echo 'selected'; ?>>Macho</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="estadoMascota">Estado de la Mascota</label>
                    <select class="form-control" name="estado" id="estado">
                        <option value="0" <?php if ($mascota->estado == '0') echo 'selected'; ?>>Disponible</option>
                        <option value="1" <?php if ($mascota->estado == '1') echo 'selected'; ?>>En Proceso</option>
                        <option value="2" <?php if ($mascota->estado == '2') echo 'selected'; ?>>Adoptado</option>
                    </select>
                </div>
                <div class="row">
                    <div class="col-12">
                        <button type="submit" class="btn btn-success">Modificar Mascota</button>
                    </div>
                </div>
                <?php echo form_close(); ?>
            </div>
            <div class="col-3"></div>
        </div>
    </div>
</section>
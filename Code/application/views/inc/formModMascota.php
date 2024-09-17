<br><br>
<h1>Modificar Usuario</h1>
<br>

<?php foreach($mascotas->result() as $row): ?>

<section class="content">
    <div class="container-fluid">
        <div id="confirmacionInsert"></div>
        <div class="row">
            <div class="col-3"></div>
            <div class="col-6">
                <?php echo form_open_multipart("mascota/modificarbdMascotas"); ?>
                    <div class="form-group">
                        <input type="hidden" class="form-control" name="idMascotas" value="<?php echo $row->idMascotas; ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="nombres">Nombre</label>
                        <input type="text" class="form-control" name="nombre" value="<?php echo $row->nombre; ?>" minlength="3" required>
                    </div>
                    <div class="form-group">
                        <label for="fechaNac">Fecha De Nacimiento</label>
                        <input type="date" class="form-control" name="fechaNacMascota" id="fechaNacMascota" value="<?php echo $row->fechaNacMascota; ?>">
                    </div>
                    <div class="form-group">
                        <label for="usuario">Color</label>
                        <input type="text" class="form-control" name="color" value="<?php echo $row->color; ?>" minlength="3" maxlength="40" required>
                    </div>
                    <div class="form-group">
                        <label for="sexo">Genero de la Mascota</label>
                        <select class="form-control" name="sexo" id="sexo">
                            <option value="0" <?php if($row->sexo == '0') echo 'selected'; ?>>Hembra</option>
                            <option value="1" <?php if($row->sexo == '1') echo 'selected'; ?>>Macho</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="estadoMascota">Estado de la Mascota</label>
                        <select class="form-control" name="estado" id="estado">
                            <option value="0" <?php if($row->estado == '0') echo 'selected'; ?>>Disponible</option>
                            <option value="1" <?php if($row->estado == '1') echo 'selected'; ?>>En Proceso</option>
                            <option value="2" <?php if($row->estado == '2') echo 'selected'; ?>>Adoptado</option>
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

<?php endforeach; ?>

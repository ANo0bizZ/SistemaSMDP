<div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Agregar Mascotas </h3>
              </div>

            </div>
            <div class="col-md-12 col-sm-12 ">
              <div class="x_panel">
                <div class="x_title">
                  <h2>Agregar Mascotas</h2>
                  <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                    <li><a class="close-link"><i class="fa fa-close"></i></a>
                    </li>
                  </ul>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
                  <div class="row">
                    <div class="col-sm-12">
                      <div class="card-box table-responsive">
                        <p class="text-muted font-13 m-b-30">
                          A traves del siguiente formulario se podrán agregar mascotas en adopción
                        </p>
<div class="container" id="container" style="max-width: 600px; margin: auto;">
    <div class="form-container sign-up"
        style="padding: 30px; box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1); border-radius: 15px; background: #fff;">
        <form action="<?php echo site_url('mascota/registrarMascota'); ?>" method="post" id="formRegistroMascota">
            <h3 style="text-align: center; margin-bottom: 20px;">Registrar Mascota</h3>
            <div style="margin-bottom: 15px;">
                <label for="especie" style="margin-bottom: 5px;">Seleccione la especie:</label>
                <select class="form-control" name="especies" id="especies" required
                    style="width: 100%; padding: 10px; border-radius: 10px; border: 1px solid #ddd;">
                    <option value="">Seleccione una especie</option>
                    <?php if (!empty($especies)): ?>
                        <?php foreach ($especies as $especie): ?>
                            <option value="<?php echo $especie->idEspecies; ?>"><?php echo $especie->nombre; ?></option>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </select>
            </div>

            <div style="margin-bottom: 15px;">
                <label for="raza" style="margin-bottom: 5px;">Seleccione la raza:</label>
                <select class="form-control" name="razas" id="razas" required
                    style="width: 100%; padding: 10px; border-radius: 10px; border: 1px solid #ddd;">
                    <option value="">Seleccione una raza</option>
                    <?php if (!empty($razas)): ?>
                        <?php foreach ($razas as $raza): ?>
                            <option value="<?php echo $raza->idRazas; ?>"><?php echo $raza->nombre; ?></option>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </select>
            </div>

            <div style="margin-bottom: 15px;">
                <button type="button" id="nuevaRazaBtn"
                    style="width: 100%; padding: 10px; background: #007bff; color: white; border: none; border-radius: 10px;"
                    data-toggle="modal" data-target="#modalNuevaRaza">Agregar nueva raza</button>
            </div>
            <input type="text" name="nombre" placeholder="Nombre de la Mascota" required
                style="width: 100%; margin-bottom: 15px; padding: 10px; border-radius: 10px; border: 1px solid #ddd;">
            <label for="" style="margin-bottom: 5px;">Año Nacimiento Aproximado de la Mascota</label>
            <input type="number" name="fechaNacMascota" id="fechaIngreso" min="2000" max="<?php echo date('Y'); ?>"
                style="width: 100%; margin-bottom: 15px; padding: 10px; border-radius: 10px; border: 1px solid #ddd;">
            <label for="" style="margin-bottom: 5px;">Fecha de Ingreso al Refugio</label>
            <input type="date" name="fechaIngreso" required
                style="width: 100%; margin-bottom: 15px; padding: 10px; border-radius: 10px; border: 1px solid #ddd;">
            <div style="display: flex; gap: 10px; margin-bottom: 15px; align-items: center;">
                <div style="display: flex; flex-direction: column; align-items: flex-start; flex-basis: 45%;">
                    <label for="sexo" style="margin-bottom: 5px;">Seleccione el sexo de la Mascota:</label>
                    <select class="form-control" name="sexo" id="sexo"
                        style="width: 100%; padding: 10px; border-radius: 10px; border: 1px solid #ddd;" required>
                        <option value="">Seleccione el sexo de la Mascota</option>
                        <option value="1">Macho</option>
                        <option value="2">Hembra</option>
                    </select><br>
                </div>
                <input type="text" name="color" placeholder="Color de la Mascota"
                    style="flex-basis: 50%; padding: 10px; border-radius: 10px; border: 1px solid #ddd;">
            </div>
            <div style="display: flex; gap: 10px; margin-bottom: 15px; align-items: center;">
                <label for="foto" style="flex-basis: 50%;">Subir Fotografía de la Mascota:</label>
                <input type="file" name="foto[]" id="foto" accept="image/*" multiple style="flex-basis: 50%; padding: 10px; border-radius: 10px; border: 1px solid #ddd;">
            </div>
            <textarea name="descripcion" placeholder="Descripción de la Mascota"
                style="width: 100%; margin-bottom: 15px; padding: 10px; border-radius: 10px; border: 1px solid #ddd;"></textarea>
            <button type="submit"
                style="width: 100%; padding: 10px; background: #4CAF50; color: white; border: none; border-radius: 10px;">Registrar
                Mascota</button>
        </form>
    </div>
</div>

<!-- ---------------------MODALES------------------------------ -->

<div class="modal fade" id="modalNuevaRaza" tabindex="-1" role="dialog" aria-labelledby="modalNuevaRazaLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalNuevaRazaLabel">Agregar Nueva Raza</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="formNuevaRaza">
                    <select class="form-control" name="especies" id="especies" required style="width: 100%; padding: 10px; border-radius: 10px; border: 1px solid #ddd;">
                        <option value="">Seleccione una especie</option>
                        <?php if (!empty($especies)): ?>
                            <?php foreach ($especies as $especie): ?>
                                <option value="<?php echo $especie->idEspecies; ?>"><?php echo $especie->nombre; ?></option>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </select><br>
                    <input type="text" name="nombre" id="nombre" placeholder="Nombre de la Raza" required style="width: 100%; margin-bottom: 15px; padding: 10px; border-radius: 10px; border: 1px solid #ddd;">
                    <select name="tamanio" id="tamanio" required style="width: 100%; margin-bottom: 15px; padding: 10px; border-radius: 10px; border: 1px solid #ddd;">
                        <option value="">Selecciona el Tamaño</option>
                        <option value="Grande">Grande</option>
                        <option value="Mediano">Mediano</option>
                        <option value="Pequeño">Pequeño</option>
                    </select>
                    <textarea name="descripcion" id="descripcion" placeholder="Descripción" style="width: 100%; margin-bottom: 15px; padding: 10px; border-radius: 10px; border: 1px solid #ddd;"></textarea>
                    <input type="hidden" name="estado" id="estado" value="1">
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn btn-success" id="guardarNuevaRaza">Guardar Raza</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="successModalRaza" tabindex="-1" role="dialog" aria-labelledby="successModalRazaLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="successModalRazaLabel">Registro Exitoso</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>La nueva raza ha sido registrada exitosamente.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" id="btnAceptarRaza">Aceptar</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="successModal" tabindex="-1" role="dialog" aria-labelledby="successModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header" style="border-bottom: none;">
                <h5 class="modal-title" id="successModalLabel">¡Registro Exitoso!</h5>
            </div>
            <div class="modal-body">
                La mascota se ha registrado correctamente.
            </div>
            <div class="modal-footer" style="border-top: none;">
                <button type="button" class="btn btn-success" id="btnAceptar">Aceptar</button>
            </div>
        </div>
    </div>
</div>

<script>
    document.getElementById('guardarNuevaRaza').addEventListener('click', function(event) {
        event.preventDefault();
        var form = document.getElementById('formNuevaRaza');
        if (!form.checkValidity()) {
            return;
        }

        var xhr = new XMLHttpRequest();
        xhr.open('POST', '<?php echo site_url('mascota/registrarRaza'); ?>', true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

        xhr.onload = function() {
            if (xhr.status === 200) {
                var response = JSON.parse(xhr.responseText);
                if (response.success) {
                    form.reset();
                    $('#modalNuevaRaza').modal('hide');
                    $('#successModalRaza').modal('show');
                    $('#razas').append('<option value="' + response.idRaza + '">' + response.nombre + '</option>');
                } else {
                    alert('Error al registrar la raza: ' + response.message);
                }
            } else {
                alert('Error en la solicitud al servidor.');
            }
        };

        xhr.onerror = function() {
            alert('Error al intentar enviar el formulario.');
        };

        var formData = new FormData(form);
        xhr.send(new URLSearchParams(formData).toString());
    });

    document.getElementById('btnAceptarRaza').addEventListener('click', function() {
        $('#successModalRaza').modal('hide');
        $('#modalNuevaRaza').modal('hide');
    });

    document.getElementById('formRegistroMascota').addEventListener('submit', function(event) {
        event.preventDefault();
        var form = this;
        var formData = new FormData(form);

        var xhr = new XMLHttpRequest();
        xhr.open('POST', form.action, true);
        xhr.onload = function() {
            if (xhr.status === 200) {
                var response = JSON.parse(xhr.responseText);
                if (response.success) {
                    form.reset();
                    $('#successModal').modal('show');
                } else {
                    alert('Error al registrar la mascota: ' + response.message);
                }
            } else {
                alert('Error en la solicitud al servidor.');
            }
        };
        xhr.onerror = function() {
            alert('Error al intentar enviar el formulario.');
        };
        xhr.send(formData);
    });
    document.getElementById('btnAceptar').addEventListener('click', function() {
        $('#successModal').modal('hide');
    });
    
</script>
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Crear Nuevo Evento</h3>
            </div>
        </div>
        <div class="col-md-12 col-sm-12 ">
            <div class="x_panel">
                <div class="x_content" style="overflow: hidden;">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card-box table-responsive">
                                <div class="container" id="container" style="max-width: 600px; margin: auto;">
                                    <div class="form-container sign-up" style="padding: 30px; box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1); border-radius: 15px; background: #fff;">
                                        <form action="<?php echo site_url('usuario/registrarEvento'); ?>" method="post" id="formEvento">
                                            <h3 style="text-align: center; margin-bottom: 20px;">Crear Evento</h3>

                                            <input type="text" name="nombreEvento" placeholder="Nombre del Evento" required style="width: 100%; margin-bottom: 15px; padding: 10px; border-radius: 10px; border: 1px solid #ddd;">

                                            <textarea name="descripcion" placeholder="Descripción del Evento" required style="width: 100%; margin-bottom: 15px; padding: 10px; border-radius: 10px; border: 1px solid #ddd; min-height: 100px;"></textarea>

                                            <div style="display: flex; gap: 10px; margin-bottom: 15px;">
                                                <div style="flex: 1;">
                                                    <label for="fechaInicio">Fecha de Inicio</label>
                                                    <input type="datetime-local" name="fechaInicio" id="fechaInicio" required style="width: 100%; padding: 10px; border-radius: 10px; border: 1px solid #ddd;">
                                                </div>
                                                <div style="flex: 1;">
                                                    <label for="fechaFin">Fecha de Fin</label>
                                                    <input type="datetime-local" name="fechaFin" id="fechaFin" required style="width: 100%; padding: 10px; border-radius: 10px; border: 1px solid #ddd;">
                                                </div>
                                            </div>
                                            <input type="text" name="ubicacion" placeholder="Ubicación del Evento" required style="width: 100%; margin-bottom: 15px; padding: 10px; border-radius: 10px; border: 1px solid #ddd;">
                                            <label for="tipoEvento" style="margin-bottom: 5px;">Tipo de Evento</label>
                                            <select class="form-control" name="tipoEvento" id="tipoEvento" style="width: 100%; margin-bottom: 15px; padding: 10px; border-radius: 10px; border: 1px solid #ddd;" required>
                                                <option value="1">Campaña de Adopción</option>
                                                <option value="2">Campaña de Concientización</option>
                                                <option value="3">Recaudación de Fondos</option>
                                            </select>

                                            <button type="submit" style="width: 100%; padding: 10px; background: #4CAF50; color: white; border: none; border-radius: 10px;">Crear Evento</button>
                                        </form>
                                    </div>
                                </div>

                                <div class="modal fade" id="successModal" tabindex="-1" role="dialog" aria-labelledby="successModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header" style="border-bottom: none;">
                                                <h5 class="modal-title" id="successModalLabel">¡Evento creado!</h5>
                                            </div>
                                            <div class="modal-body">
                                                El evento se creo de manera exitosa.
                                            </div>
                                            <div class="modal-footer" style="border-top: none;">
                                                <button type="button" class="btn btn-success" id="btnAceptar">Aceptar</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <script>
                                    document.getElementById('formEvento').addEventListener('submit', function(event) {
                                        event.preventDefault(); 
                                        var form = this;
                                        var xhr = new XMLHttpRequest();
                                        xhr.open('POST', form.action, true);
                                        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

                                        xhr.onload = function() {
                                            if (xhr.status === 200) {
                                                var response = JSON.parse(xhr.responseText); 
                                                if (response.success) {
                                                    form.reset(); 
                                                    $('#successModal').modal('show'); 
                                                } else {
                                                    alert(response.message || 'Hubo un problema al registrar el evento.');
                                                }
                                            } else {
                                                alert('Error en la solicitud. Intente nuevamente.');
                                            }
                                        };

                                        var formData = new FormData(form);
                                        var params = new URLSearchParams(formData).toString();
                                        xhr.send(params);
                                    });


                                    document.getElementById('btnAceptar').addEventListener('click', function() {
                                        $('#successModal').modal('hide');
                                    });

                                    document.getElementById('fechaFin').addEventListener('change', function() {
                                        var fechaInicio = new Date(document.getElementById('fechaInicio').value);
                                        var fechaFin = new Date(this.value);

                                        if (fechaFin < fechaInicio) {
                                            alert('La fecha de fin no puede ser anterior a la fecha de inicio');
                                            this.value = '';
                                        }
                                    });
                                </script>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<style>
    .mascota-card .form-check-input:checked {
        background-color: #4caf50;
        border-color: #4caf50;
    }

    .mascota-card .form-check-label {
        font-weight: bold;
    }
</style>

<body>
    <div class="image-container set-full-height"
        style="background-image: url('<?php echo base_url() ?>formSolicitudAdopcion/assets/img/bg2.jpg')">
        <a href="<?php echo site_url('usuario/principal'); ?>">
            <div class="logo-container">
                <div class="logo">
                    <img src="<?php echo base_url() ?>formSolicitudAdopcion/assets/img/SMDP1.png">
                </div>
                <div class="brand">
                    Centro de Adopciones "San Martin de Porres"
                </div>
            </div>
        </a>

        <a href="https://wa.link/bc9i3x" class="made-with-mk">
            <img src="https://upload.wikimedia.org/wikipedia/commons/6/6b/WhatsApp.svg" alt="WhatsApp"
                style="width:24px; height:24px;">
            <div class="made-with">Contáctenos <strong>Whatsapp</strong></div>
        </a>
        <div class="container">
            <div class="row">
                <div class="col-sm-8 col-sm-offset-2">
                    <div class="wizard-container">
                        <div class="card wizard-card" data-color="green" id="wizard">
                            <form action="<?php echo site_url('adopciones/registrarSolicitud'); ?>" method="post">
                                <!--        You can switch " data-color="blue" "  with one of the next bright colors: "green", "orange", "red", "purple"             -->
                                <div class="wizard-header">
                                    <h3 class="wizard-title">
                                        ¿Desea Adoptar a una Mascota?
                                    </h3>
                                    <h5>Necesitamos un poco de información</h5>
                                </div>
                                <div class="wizard-navigation">
                                    <ul>
                                        <li><a href="#details" data-toggle="tab">Datos Personales</a></li>
                                        <li><a href="#captain" data-toggle="tab">Información Adicional</a></li>
                                        <li><a href="#seleccion" data-toggle="tab">Selección de Mascotas</a></li>
                                        <li><a href="#description" data-toggle="tab">¿Porque Desea Adoptar?</a></li>
                                    </ul>
                                </div>
                                <div class="tab-content">
                                    <div class="tab-pane" id="details">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <h4 class="info-text"> Empecemos con tus datos personales.</h4>
                                                <h6 class="info-text">Verifique que los datos sean correctos y complete
                                                    los campos faltantes</h6>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="input-group">
                                                    <span class="input-group-addon">
                                                        <i class="material-icons">person</i>
                                                    </span>
                                                    <div class="form-group label-floating">
                                                        <label class="control-label">Nombres</label>
                                                        <input name="nombres" type="text" class="form-control"
                                                            value="<?php echo $this->session->userdata('nombres'); ?>">
                                                    </div>
                                                </div>
                                                <div class="input-group">
                                                    <span class="input-group-addon">
                                                        <i class="material-icons">perm_identity</i>
                                                    </span>
                                                    <div class="form-group label-floating">
                                                        <label class="control-label">Apellido Materno</label>
                                                        <input name="name" type="text" class="form-control"
                                                            value="<?php echo $this->session->userdata('segundoApellido'); ?>">
                                                    </div>
                                                </div>
                                                <div class="input-group">
                                                    <span class="input-group-addon">
                                                        <i class="material-icons">email</i>
                                                    </span>
                                                    <div class="form-group label-floating">
                                                        <label class="control-label">Email</label>
                                                        <input name="email" type="email" class="form-control"
                                                            value="<?php echo $this->session->userdata('usuario'); ?>">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="input-group">
                                                    <span class="input-group-addon">
                                                        <i class="material-icons">perm_identity</i>
                                                    </span>
                                                    <div class="form-group label-floating">
                                                        <label class="control-label">Apellido Paterno</label>
                                                        <input name="primerApeliido" type="text" class="form-control"
                                                            value="<?php echo $this->session->userdata('primerApellido'); ?>">
                                                    </div>
                                                </div>
                                                <div class="input-group">
                                                    <span class="input-group-addon">
                                                        <i class="material-icons">credit_card</i>
                                                    </span>
                                                    <div class="form-group label-floating">
                                                        <label class="control-label">Cedula de Identidad</label>
                                                        <input name="ci" type="number" class="form-control" value="">
                                                    </div>
                                                </div>
                                                <div class="input-group">
                                                    <span class="input-group-addon">
                                                        <i class="material-icons">phone_iphone</i>
                                                    </span>
                                                    <div class="form-group label-floating">
                                                        <label class="control-label">Numero de Celular</label>
                                                        <input name="celular" type="number" class="form-control" value="">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- --------------------------------------------------------- -->

                                    <div class="tab-pane" id="captain">
                                        <h4 class="info-text">Información Importante</h4>
                                        <div class="row">
                                            <div class="col-sm-10 col-sm-offset-1">
                                                <div class="col-sm-12">
                                                    <h6>Dirección</h6>
                                                    <textarea name="direccion" class="form-control" placeholder="" rows="6"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="seleccion">
                                        <div class="row">
                                            <h4 class="info-text">Seleccione la o las mascotas que desea adoptar</h4>
                                            <div class="col-sm-12">
                                                <div class="row">
                                                    <?php foreach ($mascotas as $mascota): ?>
                                                        <div class="col-md-4 col-sm-6 mb-4">
                                                            <div class="mascota-card" style="height: 300px; border: 1px solid #ddd; border-radius: 8px; overflow: hidden; box-shadow: 0 4px 8px rgba(0,0,0,0.1);">
                                                                <?php
                                                                $fotos = !empty($mascota->fotos) ? explode(',', $mascota->fotos) : [];
                                                                $primeraFoto = !empty($fotos) ? $fotos[0] : '';
                                                                ?>
                                                                <div class="mascota-imagen" style="height: 200px; overflow: hidden;">
                                                                    <?php if (!empty($primeraFoto)): ?>
                                                                        <div style="width: 100%; height: 100%; display: flex; align-items: center; justify-content: center; overflow: hidden;">
                                                                            <img src="<?php echo base_url($primeraFoto); ?>" alt="<?php echo $mascota->nombre; ?>" style="min-width: 100%; min-height: 100%; width: auto; height: auto; object-fit: cover;">
                                                                        </div>
                                                                    <?php else: ?>
                                                                        <div style="height: 100%; background-color: #f0f0f0; display: flex; align-items: center; justify-content: center;">
                                                                            <p>No hay imagen disponible</p>
                                                                        </div>
                                                                    <?php endif; ?>
                                                                </div>
                                                                <div class="mascota-info" style="padding: 10px; text-align: center;">
                                                                    <h5 style="margin-bottom: 10px;"><?php echo $mascota->nombre; ?></h5>
                                                                    <div class="form-check">
                                                                        <input class="form-check-input" type="checkbox" name="mascotasSeleccionadas[]" value="<?php echo $mascota->idMascotas; ?>" id="mascota-<?php echo $mascota->idMascotas; ?>" style="transform: scale(1.5);">
                                                                        <label class="form-check-label" for="mascota-<?php echo $mascota->idMascotas; ?>" style="margin-left: 10px; cursor: pointer;">
                                                                            Deseo Adoptar a esta mascota
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    <?php endforeach; ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="description">
                                        <div class="row">
                                            <h6 align="center">Usted se encuentra a solo un paso de poder cambiar la vida de uno
                                                o más peluditos que le brindaran amor incondicional. </h6>
                                            <h4 class="info-text">¿Podría decirnos porque desea adoptar una mascota?
                                            </h4>
                                            <div class="col-sm-6 col-sm-offset-1">
                                                <div class="form-group">
                                                    <label>Breve descripción</label>
                                                    <textarea name="descripcion" class="form-control" placeholder="" rows="6"></textarea>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label class="control-label">Ejemplo</label>
                                                    <p class="description">"Quiero adoptar una mascota porque puedo
                                                        ofrecerle un hogar lleno de amor y cuidado. Me comprometo a
                                                        brindarle atención, tiempo y un ambiente seguro donde pueda ser
                                                        feliz."</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="wizard-footer">
                                    <div class="pull-right">
                                        <button type='button' class='btn btn-next btn-fill btn-success btn-wd'
                                            name='next'>Siguiente</button>
                                        <button type="submit" class='btn btn-finish btn-fill btn-success btn-wd' name='finish' onclick="return enviarSolicitud()">Finalizar</button>
                                    </div>
                                    <div class="pull-left">
                                        <button type='button' class='btn btn-previous btn-fill btn-default btn-wd'
                                            name='previous'>Anterior</button>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer">
            <div class="container text-center">
                Copyright &copy;<script>
                    document.write(new Date().getFullYear());
                </script></i><a href="www.linkedin.com/in/ano0bizz"> ANo0bizZ </a><i class="fa fa-laptop"></i>. Derechos
                Reservados.
            </div>
        </div>
    </div>
    <div class="modal fade" id="successModal" tabindex="-1" role="dialog" aria-labelledby="successModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="successModalLabel">Éxito</h4>
                </div>
                <div class="modal-body">
                    <p>¡Su solicitud fue enviada al administrador, recibira una respuesta pronto!</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success" data-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        function enviarSolicitud() {
            $('#successModal').modal('show');
            setTimeout(function() {
                document.querySelector('form').submit();
            }, 2000); 
            return false;
        }

        $('#successModal').on('shown.bs.modal', function() {
            setTimeout(function() {
                $('#successModal').modal('hide');
            }, 15000);
        });
    </script>
</body>
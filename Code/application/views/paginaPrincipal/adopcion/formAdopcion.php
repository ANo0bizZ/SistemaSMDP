<body>
    <div class="image-container set-full-height" style="background-image: url('<?php echo base_url() ?>formSolicitudAdopcion/assets/img/bg2.jpg')">
        <a href="<?php echo site_url('usuario/principal'); ?>"><div class="logo-container" >
            <div class="logo">
                <img src="<?php echo base_url() ?>formSolicitudAdopcion/assets/img/SMDP1.png">
            </div>
            <div class="brand">
                Centro de Adopciones "San Martin de Porres"
            </div>
        </div></a>
    

        <a href="https://wa.link/bc9i3x" class="made-with-mk">
            <img src="https://upload.wikimedia.org/wikipedia/commons/6/6b/WhatsApp.svg" alt="WhatsApp" style="width:24px; height:24px;">
            <div class="made-with">Contáctenos <strong>Whatsapp</strong></div>
        </a>
        <div class="container">
            <div class="row">
                <div class="col-sm-8 col-sm-offset-2">
                    <div class="wizard-container">
                        <div class="card wizard-card" data-color="green" id="wizard">
                            <form action="" method="">
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
                                        <li><a href="#description" data-toggle="tab">¿Porque Desea Adoptar?</a></li>
                                    </ul>
                                </div>

                                <div class="tab-content">
                                    <div class="tab-pane" id="details">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <h4 class="info-text"> Empecemos con tus datos personales.</h4>
                                                <h6 class="info-text">Verifique que los datos sean correctos y complete los campos faltantes</h6>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="input-group">
                                                    <span class="input-group-addon">
                                                        <i class="material-icons">person</i>
                                                    </span>
                                                    <div class="form-group label-floating">
                                                        <label class="control-label">Nombres</label>
                                                        <input name="nombres" type="text" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="input-group">
                                                    <span class="input-group-addon">
                                                        <i class="material-icons">perm_identity</i>
                                                    </span>
                                                    <div class="form-group label-floating">
                                                        <label class="control-label">Apellido Materno</label>
                                                        <input name="name" type="text" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="input-group">
                                                    <span class="input-group-addon">
                                                        <i class="material-icons">email</i>
                                                    </span>
                                                    <div class="form-group label-floating">
                                                        <label class="control-label">Email</label>
                                                        <input name="email" type="email" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="input-group">
                                                    <span class="input-group-addon">
                                                        <i class="material-icons">calendar_today</i>
                                                    </span>
                                                    <div class="form-group label-floating">
                                                        <label class="control-label">Fecha de Nacimiento</label><br>
                                                        <input name="fechaNacimiento" type="date" class="form-control">
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
                                                        <input name="primerApeliido" type="text" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="input-group">
                                                    <span class="input-group-addon">
                                                        <i class="material-icons">credit_card</i>
                                                    </span>
                                                    <div class="form-group label-floating">
                                                        <label class="control-label">Cedula de Identidad</label>
                                                        <input name="ci" type="number" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="input-group">
                                                    <span class="input-group-addon">
                                                        <i class="material-icons">phone_iphone</i>
                                                    </span>
                                                    <div class="form-group label-floating">
                                                        <label class="control-label">Numero de Celular</label>
                                                        <input name="ci" type="number" class="form-control">
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
                                                <div class="col-sm-4">
                                                    <div class="choice" data-toggle="wizard-radio" rel="tooltip" title="This is good if you travel alone.">
                                                        <input type="radio" name="job" value="Design">
                                                        <div class="icon">
                                                            <i class="material-icons">weekend</i>
                                                        </div>
                                                        <h6>Single</h6>
                                                    </div>
                                                </div>
                                                <div class="col-sm-4">
                                                    <div class="choice" data-toggle="wizard-radio" rel="tooltip" title="Select this room if you're traveling with your family.">
                                                        <input type="radio" name="job" value="Code">
                                                        <div class="icon">
                                                            <i class="material-icons">home</i>
                                                        </div>
                                                        <h6>Family</h6>
                                                    </div>
                                                </div>
                                                <div class="col-sm-4">
                                                    <div class="choice" data-toggle="wizard-radio" rel="tooltip" title="Select this option if you are coming with your team.">
                                                        <input type="radio" name="job" value="Code">
                                                        <div class="icon">
                                                            <i class="material-icons">business</i>
                                                        </div>
                                                        <h6>Business</h6>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="description">
                                        <div class="row">
                                            <h4 class="info-text"> ¿Podría decirnos porque desea adoptar una mascota?</h4>
                                            <div class="col-sm-6 col-sm-offset-1">
                                                <div class="form-group">
                                                    <label>Breve descripción</label>
                                                    <textarea class="form-control" placeholder="" rows="6"></textarea>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label class="control-label">Ejemplo</label>
                                                    <p class="description">"Quiero adoptar una mascota porque puedo ofrecerle un hogar lleno de amor y cuidado. Me comprometo a brindarle atención, tiempo y un ambiente seguro donde pueda ser feliz."</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="wizard-footer">
                                    <div class="pull-right">
                                        <input type='button' class='btn btn-next btn-fill btn-success btn-wd' name='next' value='Siguiente' />
                                        <input type='button' class='btn btn-finish btn-fill btn-success btn-wd' name='finish' value='Finalizar' />
                                    </div>
                                    <div class="pull-left">
                                        <input type='button' class='btn btn-previous btn-fill btn-default btn-wd' name='previous' value='Anterior' />

                                        <!-- <div class="footer-checkbox">
                                            <div class="col-sm-12">
                                                <div class="checkbox">
                                                    <label>
                                                        <input type="checkbox" name="optionsCheckboxes">
                                                    </label>
                                                    Subscribe to our newsletter
                                                </div>
                                            </div>
                                        </div> -->
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
                </script></i><a href="www.linkedin.com/in/ano0bizz"> ANo0bizZ </a><i class="fa fa-laptop"></i>. Derechos Reservados.
            </div>
        </div>
    </div>
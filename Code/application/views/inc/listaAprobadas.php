<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Solicitudes Aprobadas </h3>
            </div>
        </div>
        <div class="col-md-12 col-sm-12 ">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Solicitudes Aprobadas</h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                        <li><a class="close-link"><i class="fa fa-close"></i></a></li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <!-- Form for date filter -->
                    <form method="post" action="<?php echo site_url('adopciones/solicitudesAprobadas'); ?>" class="form-inline mb-3">
                        <div class="form-group mb-2">
                            <label for="fechaInicio">Desde:</label>
                            <input type="date" class="form-control ml-2" name="fechaInicio" id="fechaInicio" value="<?php echo $fechaInicio; ?>">
                        </div>
                        <div class="form-group mb-2 ml-3">
                            <label for="fechaFin">Hasta:</label>
                            <input type="date" class="form-control ml-2" name="fechaFin" id="fechaFin" value="<?php echo $fechaFin; ?>">
                        </div>
                        <button type="submit" class="btn btn-primary mb-2 ml-3">Filtrar</button>
                    </form>
                    <!-- Table content -->
                    <div class="table-responsive">
                        <table id="datatable-buttons" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th class="text-center">No.</th>
                                    <th class="text-center">Nombre del Adoptante</th>
                                    <th class="text-center">Carnet de Identidad</th>
                                    <th class="text-center">Celular</th>
                                    <th class="text-center">Edad</th>
                                    <th class="text-center">Dirección</th>
                                    <th class="text-center">Descripción</th>
                                    <th class="text-center">Mascotas</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $contador = 1; ?>
                                <?php foreach ($solicitudes as $solicitud): ?>
                                    <tr>
                                        <td align="center"><?php echo $contador; ?></td>
                                        <td align="center"><?php echo $solicitud->nombres . ' ' . $solicitud->primerApellido; ?></td>
                                        <td align="center"><?php echo $solicitud->ci; ?></td>
                                        <td align="center"><?php echo $solicitud->celular; ?></td>
                                        <td align="center">
                                            <?php
                                            $fecha_nacimiento = new DateTime($solicitud->fechaNacimiento);
                                            $hoy = new DateTime();
                                            $edad = $hoy->diff($fecha_nacimiento)->y;
                                            echo $edad;
                                            ?>
                                        </td>
                                        <td align="center"><?php echo $solicitud->direccion; ?></td>
                                        <td align="center"><?php echo $solicitud->descripcion; ?></td>
                                        <td align="center"><?php echo $solicitud->nombreMascota; ?></td>
                                    </tr>
                                    <?php $contador++; ?>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
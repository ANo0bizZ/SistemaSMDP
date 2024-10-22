<main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    <!-- Navbar omitted for brevity -->
    <br>
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card my-4">
                    <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                        <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                            <h6 class="text-white text-capitalize ps-3">Lista de Solicitudes Aprobadas</h6>
                        </div>
                    </div>
                    <div class="card-body px-0 pb-2">
                        <!-- Form for date filter -->
                        <form method="post" action="<?php echo site_url('adopciones/solicitudesAprobadas'); ?>" class="form-inline">
                            <div class="form-group mb-2">
                                <label for="fechaInicio">Desde:</label>
                                <input type="date" class="form-control ml-2" name="fechaInicio" id="fechaInicio">
                            </div>
                            <div class="form-group mb-2 ml-3">
                                <label for="fechaFin">Hasta:</label>
                                <input type="date" class="form-control ml-2" name="fechaFin" id="fechaFin">
                            </div>
                            <button type="submit" class="btn btn-primary mb-2 ml-3">Filtrar</button>
                            <button type="button" class="btn btn-success mb-2 ml-3" id="exportExcel">Exportar a Excel</button>
                            <button type="button" class="btn btn-danger mb-2 ml-3" id="exportPdf">Exportar a PDF</button>
                        </form>
                        <!-- Table content -->
                        <div class="table-responsive p-0">
                            <table class="table align-items-center mb-0">
                                <thead>
                                    <tr>
                                        <th class="text-center text-uppercase text-primary text-xxl font-weight-bolder opacity-7">No.</th>
                                        <th class="text-center text-uppercase text-primary text-xxl font-weight-bolder opacity-7">Nombre del Adoptante</th>
                                        <th class="text-center text-uppercase text-primary text-xxl font-weight-bolder opacity-7">Carnet de Identidad</th>
                                        <th class="text-center text-uppercase text-primary text-xxl font-weight-bolder opacity-7">Celular</th>
                                        <th class="text-center text-uppercase text-primary text-xxl font-weight-bolder opacity-7">Edad</th>
                                        <th class="text-center text-uppercase text-primary text-xxl font-weight-bolder opacity-7">Dirección</th>
                                        <th class="text-center text-uppercase text-primary text-xxl font-weight-bolder opacity-7">Descripción</th>
                                        <th class="text-center text-uppercase text-primary text-xxl font-weight-bolder opacity-7">Mascotas</th>
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
                                            <td align="center"><?php echo $solicitud->nombresMascotas; ?></td>
                                        </tr>
                                        <?php $contador++; ?>
                                    <?php endforeach; ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th class="text-center text-uppercase text-primary text-xxl font-weight-bolder opacity-7">No.</th>
                                        <th class="text-center text-uppercase text-primary text-xxl font-weight-bolder opacity-7">Nombre del Adoptante</th>
                                        <th class="text-center text-uppercase text-primary text-xxl font-weight-bolder opacity-7">Carnet de Identidad</th>
                                        <th class="text-center text-uppercase text-primary text-xxl font-weight-bolder opacity-7">Celular</th>
                                        <th class="text-center text-uppercase text-primary text-xxl font-weight-bolder opacity-7">Edad</th>
                                        <th class="text-center text-uppercase text-primary text-xxl font-weight-bolder opacity-7">Dirección</th>
                                        <th class="text-center text-uppercase text-primary text-xxl font-weight-bolder opacity-7">Descripción</th>
                                        <th class="text-center text-uppercase text-primary text-xxl font-weight-bolder opacity-7">Mascotas</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

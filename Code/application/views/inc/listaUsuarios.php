        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Lista de Usuarios </h3>
              </div>

            </div>
            <div class="col-md-12 col-sm-12 ">
              <div class="x_panel">
                <div class="x_title">
                  <h2>Lista de Usuarios</h2>
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
                          Lista de todos los usuarios registrados en el sistema
                        </p>
                        <table id="datatable-buttons" class="table table-striped table-bordered"
                          style="width:100%">
                          <thead>
                            <tr>
                              <th>No.</th>
                              <th>Nombre</th>
                              <th>Correo</th>
                              <th>Rol</th>
                              <th>Edad</th>
                              <th>Acciones</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php foreach ($usuarios as $key => $usuario): ?>
                              <tr>
                                <td><?php echo $key + 1; ?></td>
                                <td><?php echo $usuario->nombres . ' ' . $usuario->primerApellido . ' ' . $usuario->segundoApellido; ?>
                                </td>
                                <td><?php echo $usuario->usuario; ?></td>
                                <td><?php
                                    if ($usuario->rol == 0) {
                                      echo "ADMINISTRADOR";
                                    } elseif ($usuario->rol == 1) {
                                      echo "ADOPTANTE";
                                    } elseif ($usuario->rol == 2) {
                                      echo "VOLUNTARIO";
                                    } else {
                                      echo "ROL NO CONOCIDO";
                                    }
                                    ?></td>
                                <td><?php
                                    $fechaNacimiento = new DateTime($usuario->fechaNacimiento);
                                    $hoy = new DateTime(date("Y-m-d"));
                                    $edad = $hoy->diff($fechaNacimiento)->y;
                                    echo $edad;
                                    ?></td>
                                <td align="center">
                                  <a href="<?php echo site_url('usuario/modUsuario/' . $usuario->idUsuario); ?>" title="Editar">
                                    <i class="fa fa-edit text-primary" style="font-size: 1.5em;"></i>
                                  </a>
                                  <a href="<?php echo site_url('controlador/eliminar/' . $usuario->idUsuario); ?>"
                                    title="Eliminar"
                                    onclick="return confirm('¿Estás seguro de eliminar este usuario?');" style="margin-left: 15px;">
                                    <i class="fa fa-trash text-danger" style="font-size: 1.5em;"></i>
                                  </a>
                                </td>

                              </tr>
                            <?php endforeach; ?>
                          </tbody>

                        </table>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
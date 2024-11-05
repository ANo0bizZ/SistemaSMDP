        <div class="right_col" role="main">
        <?php if($this->session->flashdata('success')): ?>
        <script>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                title: 'Éxito!',
                text: '<?php echo $this->session->flashdata('success'); ?>',
                icon: 'success',
                confirmButtonText: 'Ok'
            });
        });
        </script>
    <?php endif; ?>

    <?php if($this->session->flashdata('error')): ?>
        <script>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                title: 'Error!',
                text: '<?php echo $this->session->flashdata('error'); ?>',
                icon: 'error',
                confirmButtonText: 'Ok'
            });
        });
        </script>
    <?php endif; ?>
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
                                  <a href="#" onclick="confirmarEliminacion('<?php echo $usuario->idUsuario; ?>')" title="Eliminar" style="margin-left: 15px;">
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
<script>
function confirmarEliminacion(idUsuario) {
    Swal.fire({
        title: '¿Estás seguro?',
        text: "El usuario será desactivado del sistema",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Sí, desactivar',
        cancelButtonText: 'Cancelar'
    }).then((result) => {
        if (result.isConfirmed) {
            window.location.href = '<?php echo site_url('usuario/cambiarEstado/'); ?>' + idUsuario;
        }
    });
}
</script>

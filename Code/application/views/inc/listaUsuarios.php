
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" data-scroll="true">
      <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
            <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Paginas</a></li>
            <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Lista de Usuarios</li>
          </ol>
          <h6 class="font-weight-bolder mb-0">Lista de Usuarios</h6>
        </nav>
        <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
          <div class="ms-md-auto pe-md-3 d-flex align-items-center">
            <div class="input-group input-group-outline">
              <label class="form-label">Type here...</label>
              <input type="text" class="form-control">
            </div>
          </div>
          <ul class="navbar-nav  justify-content-end">
            <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
              <a href="javascript:;" class="nav-link text-body p-0" id="iconNavbarSidenav">
                <div class="sidenav-toggler-inner">
                  <i class="sidenav-toggler-line"></i>
                  <i class="sidenav-toggler-line"></i>
                  <i class="sidenav-toggler-line"></i>
                </div>
              </a>
            </li>
            <li class="nav-item px-3 d-flex align-items-center">
              <a href="javascript:;" class="nav-link text-body p-0">
                <i class="fa fa-cog fixed-plugin-button-nav cursor-pointer"></i>
              </a>
            </li>
            <li class="nav-item dropdown pe-2 d-flex align-items-center">
              <a href="javascript:;" class="nav-link text-body p-0" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="fa fa-bell cursor-pointer"></i>
              </a>
            </li>
            <li class="nav-item d-flex align-items-center">
              <a href=".<?php echo base_url(); ?>tempAdmin/pages/sign-in.php" class="nav-link text-body font-weight-bold px-0">
                <i class="fa fa-user me-sm-1"></i>
                <span class="d-sm-inline d-none">Sign In</span>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- End Navbar -->
    <div class="container-fluid py-4">
      <div id="confimacionInsert"></div>
      <!-- Mensaje de error -->
      <?php if ($this->session->flashdata('error')) : ?>
        <div class="modal fade" id="errorModal" tabindex="-1" role="dialog" aria-labelledby="errorModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="errorModalLabel">Error</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <?php echo $this->session->flashdata('error'); ?>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
              </div>
            </div>
          </div>
        </div>
      <?php endif; ?>
      <div class="row">
        <div class="col-12">
          <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
              <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                <h6 class="text-white text-capitalize ps-3">Lista de Usuarios</h6>
              </div>
            </div>
            <div class="card-body px-0 pb-2">
              <div class="table-responsive p-0">
                <table class="table align-items-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-center text-uppercase text-primary text-xxl font-weight-bolder opacity-7">No.</th>
                      <th class="text-center text-uppercase text-primary text-xxl font-weight-bolder opacity-7">Nombres</th>
                      <th class="text-center text-uppercase text-primary text-xxl font-weight-bolder opacity-7">Primer Apellido</th>
                      <th class="text-center text-uppercase text-primary text-xxl font-weight-bolder opacity-7">Segundo Apellido</th>
                      <th class="text-center text-uppercase text-primary text-xxl font-weight-bolder opacity-7">Correo</th>
                      <th class="text-center text-uppercase text-primary text-xxl font-weight-bolder opacity-7">Rol</th>
                      <th class="text-center text-uppercase text-primary text-xxl font-weight-bolder opacity-7">Edad</th>
                      <th class="text-center text-uppercase text-primary text-xxl font-weight-bolder opacity-7">Editar Datos</th>
                      <th class="text-center text-uppercase text-primary text-xxl font-weight-bolder opacity-7">Eliminar</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $contador = 1; ?>
                    <?php foreach ($usuarios as $usuario) : ?>
                      <?php if ($usuario->estado == 1) :
                      ?>
                        <tr>
                          <td align="center"><?php echo $contador; ?></td>
                          <td align="center"><?php echo $usuario->nombres; ?></td>
                          <td align="center"><?php echo $usuario->primerApellido; ?></td>
                          <td align="center"><?php echo $usuario->segundoApellido; ?></td>
                          <td align="center"><?php echo $usuario->usuario; ?></td>
                          <td align="center"><?php
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
                          <td align="center"><?php
                                              $fechaNacimiento = new DateTime($usuario->fechaNacimiento);
                                              $hoy = new DateTime(date("Y-m-d"));
                                              $edad = $hoy->diff($fechaNacimiento)->y;
                                              echo $edad;
                                              ?></td>
                          <td align="center">
                            <?php echo form_open("usuario/modUsuario"); ?>
                            <input type="hidden" name="idUsuario" value="<?php echo $usuario->idUsuario; ?>">
                            <button type="submit" class="btn btn-warning fas fa-edit"> Editar</button>
                            <?php echo form_close(); ?>
                          </td>
                          <td align="center">
                            <button type="button" class="btn btn-danger fas fa-trash" data-toggle="modal" data-target="#confirmDeleteModal" data-id="<?php echo $usuario->idUsuario; ?>"> Eliminar</button>
                          </td>
                        </tr>
                        <?php $contador++; ?>
                      <?php endif; ?>
                    <?php endforeach; ?>
                  </tbody>

                  <tfoot>
                    <tr>
                      <th class="text-center text-uppercase text-primary text-xxl font-weight-bolder opacity-7">No.</th>
                      <th class="text-center text-uppercase text-primary text-xxl font-weight-bolder opacity-7">Nombres</th>
                      <th class="text-center text-uppercase text-primary text-xxl font-weight-bolder opacity-7">Primer Apellido</th>
                      <th class="text-center text-uppercase text-primary text-xxl font-weight-bolder opacity-7">Segundo Apellido</th>
                      <th class="text-center text-uppercase text-primary text-xxl font-weight-bolder opacity-7">Correo</th>
                      <th class="text-center text-uppercase text-primary text-xxl font-weight-bolder opacity-7">Rol</th>
                      <th class="text-center text-uppercase text-primary text-xxl font-weight-bolder opacity-7">Edad</th>
                      <th class="text-center text-uppercase text-primary text-xxl font-weight-bolder opacity-7">Editar Datos</th>
                      <th class="text-center text-uppercase text-primary text-xxl font-weight-bolder opacity-7">Eliminar</th>
                    </tr>
                  </tfoot>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="modal fade" id="confirmDeleteModal" tabindex="-1" role="dialog" aria-labelledby="confirmDeleteModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="confirmDeleteModalLabel">Eliminación de Usuario</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              ¿Estás seguro de que quiere eliminar este usuario?
            </div>
            <div class="modal-footer">
              <?php echo form_open("usuario/cambiarEstado"); ?>
              <input type="hidden" name="idUsuario" id="deleteUserId" value="">
              <input type="hidden" name="estado" value="0">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
              <button type="submit" class="btn btn-danger">Confirmar</button>
              <?php echo form_close(); ?>
            </div>
          </div>
        </div>
      </div>

      <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

      <script>
        $(document).ready(function() {
          $('#confirmDeleteModal').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget);
            var userId = button.data('id');
            var modal = $(this);
            modal.find('#deleteUserId').val(userId);
          });
        });
      </script>
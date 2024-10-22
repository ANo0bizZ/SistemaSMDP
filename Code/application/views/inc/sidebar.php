<body class="g-sidenav-show  bg-gray-200">
  <aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3   bg-gradient-dark" id="sidenav-main">
    <div class="sidenav-header">
      <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
      <a class="navbar-brand m-0" href="<?php echo site_url('usuario/administrador'); ?>">
        <img src="<?php echo base_url(); ?>tempAdmin/assets/img/logo-ct.png" class="navbar-brand-img h-100" alt="main_logo">
        <span class="ms-1 font-weight-bold text-white">Administrador</span>
      </a>
    </div>
    <hr class="horizontal light mt-0 mb-2">
    <div class="collapse navbar-collapse w-auto" id="sidenav-collapse-main">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link text-white" href="<?php echo site_url('usuario/administrador'); ?>">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">home</i>
            </div>
            <span class="nav-link-text ms-1" style="font-size: 20px;">Pagina Principal</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" href="<?php echo site_url('usuario/dashboard'); ?>">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">dashboard</i>
            </div>

            <span class="nav-link-text ms-1" style="font-size: 20px;">Dashboard</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" href="<?php echo site_url('usuario/crearUsuario'); ?>">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">person_add</i>
            </div>

            <span class="nav-link-text ms-1" style="font-size: 20px;">Crear Usuario</span>
          </a>
        </li>

        <li class="nav-item">
          <a class="nav-link text-white" href="<?php echo site_url('usuario/listaUsuarios'); ?>">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">table_view</i>
            </div>

            <span class="nav-link-text ms-1" style="font-size: 20px;">Lista de Usuarios</span>
          </a>
        </li>

        <li class="nav-item">
          <a class="nav-link text-white" href="<?php echo site_url('mascota/agregarMascota'); ?>">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="fas fa-dog"></i>
              <i class="fas fa-plus-circle"></i>
            </div>
            <span class="nav-link-text ms-1" style="font-size: 20px;">Agregar mascotas</span>
          </a>
        </li>

        <li class="nav-item">
          <a class="nav-link text-white" href="<?php echo site_url('mascota/listarMascotas'); ?>">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">pets</i>
            </div>
            <span class="nav-link-text ms-1" style="font-size: 20px;">Lista de Mascotas</span>
          </a>
        </li>

        <li class="nav-item">
          <a class="nav-link text-white" href="<?php echo site_url('adopciones/solicitudes'); ?>">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">list</i>
            </div>
            <span class="nav-link-text ms-1" style="font-size: 20px;">Lista de Adopciones</span>
          </a>
        </li>

        <li class="nav-item">
          <a class="nav-link text-white" href="<?php echo site_url('usuario/solicitudesVoluntarios'); ?>">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">volunteer_activism</i>
            </div>
            <span class="nav-link-text ms-1" style="font-size: 20px;">Solicitudes de Voluntariado</span>
          </a>
        </li>

        <li class="nav-item mt-3">
          <h6 class="ps-4 ms-2 text-uppercase text-xs text-white font-weight-bolder opacity-8">
            Account pages
          </h6>
        </li>

        <li class="nav-item">
          <a class="nav-link text-white" href="<?php echo base_url(); ?>tempAdmin/pages/profile.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">person</i>
            </div>

            <span class="nav-link-text ms-1" style="font-size: 20px;">Profile</span>
          </a>
        </li>

        <li class="nav-item">
          <a class="nav-link text-white" href="<?php echo site_url('usuario/logout'); ?>">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">exit_to_app</i>
            </div>

            <span class="nav-link-text ms-1" style="font-size: 20px;">Cerrar Sesión</span>
          </a>
        </li>
      </ul>
    </div>
  </aside>
  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    <!-- Navbar -->
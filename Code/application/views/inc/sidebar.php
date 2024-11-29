<body class="nav-md">
    <div class="container body">
        <div class="main_container">
            <div class="col-md-3 left_col">
                <div class="left_col scroll-view">
                    <div class="navbar nav_title" style="border: 0;">
                        <a href="#" class="site_title"><i class="fa fa-paw"></i> <span>SMDP</span></a>
                    </div>
                    <div class="clearfix"></div>
                    <div class="profile clearfix">
                        <div class="profile_pic">
                            <img src="<?php echo base_url(); ?>admin/production/images/rosio.jpg" alt="..." class="img-circle profile_img">
                        </div>
                        <div class="profile_info">
                            <span>Bienvenida,</span>
                            <h2>Rosio</h2>
                        </div>
                    </div>
                    <br />
                    <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                        <div class="menu_section">
                            <h3>General</h3>
                            <ul class="nav side-menu">
                                <li>
                                    <a href="<?php echo site_url('usuario/administrador'); ?>"><i class="fa fa-home"></i> Inicio</a>
                                </li>
                                <li>
                                    <a href="<?php echo site_url('usuario/crearUsuario'); ?>"><i class="fa fa-user-plus"></i> Crear Usuario</a>
                                </li>
                                <li>
                                    <a href="<?php echo site_url('usuario/listaUsuarios'); ?>"><i class="fa fa-users"></i> Lista de Usuarios</a>
                                </li>
                                <li>
                                    <a href="<?php echo site_url('mascota/agregarMascota'); ?>"><i class="fa fa-paw"></i> Agregar Mascota</a>
                                </li>
                                <li>
                                    <a href="<?php echo site_url('mascota/listarMascotas'); ?>"><i class="fa fa-list-ul"></i> Lista de Mascotas</a>
                                </li>
                                <li>
                                    <a href="<?php echo site_url('adopciones/solicitudes'); ?>"><i class="fa fa-heart"></i> Lista de Adopciones</a>
                                </li>
                                <li>
                                    <a href="<?php echo site_url('usuario/solicitudesVoluntarios'); ?>"><i class="fa fa-list"></i> Solicitudes de Voluntarios</a>
                                </li>
                                <li>
                                    <a href="<?php echo site_url('usuario/creacionEventos'); ?>"><i class="fa fa-calendar"></i> Creación de Eventos</a>
                                </li>
                                <li>
                                    <a href="<?php echo site_url('usuario/voluntarios'); ?>"><i class="fa fa-user"></i> Voluntarios</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="sidebar-footer hidden-small">
                        <a data-toggle="tooltip" data-placement="top" title="Cerrar Sesión" href="<?php echo site_url('usuario/logout'); ?>" class="logout-link">
                            <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
                        </a>
                    </div>
                </div>
            </div>
            <div class="top_nav">
                <div class="nav_menu">
                    <div class="nav toggle">
                        <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                    </div>
                    <nav class="nav navbar-nav">
                        <ul class=" navbar-right">
                            <li class="nav-item dropdown open" style="padding-left: 15px;">
                                <a href="javascript:;" class="user-profile dropdown-toggle" aria-haspopup="true" id="navbarDropdown" data-toggle="dropdown" aria-expanded="false">
                                    <img src="<?php echo base_url(); ?>admin/production/images/rosio.jpg" alt="">Rosio
                                </a>
                                <div class="dropdown-menu dropdown-usermenu pull-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="javascript:;"> Perfil</a>
                                    <a class="dropdown-item" href="javascript:;">
                                        <span class="badge bg-red pull-right"></span>
                                        <span>Configuraciones</span>
                                    </a>
                                    <a class="dropdown-item" href="javascript:;">Ayuda</a>
                                    <a class="dropdown-item logout-link" href="<?php echo site_url('usuario/logout'); ?>">
                                        <i class="fa fa-sign-out pull-right"></i> Cerrar Sesión
                                    </a>
                                </div>
                            </li>

                            <li role="presentation" class="nav-item dropdown open">
                                <a href="javascript:;" class="dropdown-toggle info-number" id="navbarDropdown1" data-toggle="dropdown" aria-expanded="false">
                                    <i class="fa fa-envelope-o"></i>
                                    <span class="badge bg-green"></span>
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
            <script>
document.querySelectorAll('.logout-link').forEach(function(link) {
    link.addEventListener('click', function(e) {
        e.preventDefault();
        const logoutUrl = this.href; 
        
        Swal.fire({
            title: '¿Estás seguro?',
            text: "¿Deseas cerrar sesión?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#0A8A37',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Sí, cerrar sesión',
            cancelButtonText: 'Cancelar'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = logoutUrl;
            }
        });
    });
});
</script>

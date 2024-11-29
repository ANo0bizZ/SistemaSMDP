<title>Sistema de Refugio San Martin de Porres</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link href="https://fonts.googleapis.com/css?family=Montserrat:200,300,400,500,600,700,800&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>extrasPrincipal/css/animate.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>extrasPrincipal/css/owl.carousel.min.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>extrasPrincipal/css/owl.theme.default.min.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>extrasPrincipal/css/magnific-popup.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>extrasPrincipal/css/bootstrap-datepicker.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>extrasPrincipal/css/jquery.timepicker.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>extrasPrincipal/css/flaticon.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>extrasPrincipal/css/style.css">

<style>
    .outlined-text {
        font-size: 24px;
        font-family: Arial, sans-serif;
        color: white;
        text-shadow:
            -2px -2px 0 #009745,
            2px -2px 0 #009745,
            -2px 2px 0 #009745,
            2px 2px 0 #009745;
    }

    @media (max-width: 992px) {
        .navbar-toggler {
            border-color: transparent;
        }

        .navbar-toggler-icon {
            background-image: none;
        }

        .navbar-toggler::before {
            content: '\f0c9';
            font-family: "FontAwesome";
            font-size: 24px;
            color: white;
        }
    }
</style>
</head>

<body>
<div class="wrap">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6 d-flex align-items-center">
            </div>
            <div class="col-md-6 d-flex justify-content-md-end">
                <div class="cta">
                    <p class="mb-0 d-flex">
                        <a href="<?php echo site_url('usuario/donaciones'); ?>" class="btn btn-warning d-flex align-items-center justify-content-center">
                            <span class="fa fa-donate mr-1"></span> Realiza una Donación
                        </a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

    <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
        <div class="container-fluid">
            <a class="navbar-brand" href="<?php echo site_url('usuario/principal'); ?>">
                <img src="<?php echo base_url(); ?>extrasPrincipal/images/SMDP1.ico" alt="">
                <span class="d-none d-sm-inline" style="color: black;">Refugio "San Martin de Porres"</span>
                <span class="d-inline d-sm-none" style="color: black;">Refugio SMDP</span>
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation" style="background-color: #00904D;">
                <span class=""></span>
            </button>
            <div class="collapse navbar-collapse" id="ftco-nav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item"><a href="<?php echo site_url('usuario/principal'); ?>" class="nav-link">Inicio</a></li>
                    <li class="nav-item"><a href="<?php echo site_url('usuario/mision'); ?>" class="nav-link">Quienes somos?</a></li>
                    <li class="nav-item"><a href="<?php echo site_url('usuario/galeria'); ?>" class="nav-link">Galeria</a></li>
                    <li class="nav-item"><a href="<?php echo site_url('usuario/eventos'); ?>" class="nav-link">Eventos</a></li>
                    <li class="nav-item"><a href="<?php echo site_url('usuario/contactos'); ?>" class="nav-link">Contactos</a></li>
                    <?php if ($this->session->userdata('idUsuario')): ?>
                        <li class="nav-item"><a href="<?php echo site_url('usuario/perfil'); ?>" class="nav-link">Perfil</a></li>
                    <?php endif; ?>
                    <li class="nav-item">
                        <?php if ($this->session->userdata('idUsuario')): ?>
                            <a href="<?php echo site_url('usuario/logout'); ?>" class="btn btn-primary mr-md-3 py-3 px-2" style="margin-top: 25px;">Cerrar Sesión<span class="ion-ios-arrow-forward"></span></a>
                        <?php else: ?>
                            <a href="<?php echo site_url('usuario/panel'); ?>" class="btn btn-primary mr-md-3 py-3 px-2" style="margin-top: 25px;">Acceder<span class="ion-ios-arrow-forward"></span></a>
                        <?php endif; ?>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
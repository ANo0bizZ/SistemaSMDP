<head>
  <style>
    .bg-success-gradient {
      background: linear-gradient(to right, #4ade80, #22c55e);
    }

    .text-success {
      color: #22c55e;
    }
  </style>
</head>
<section class="hero-wrap hero-wrap-2" style="background-image: url('images/bg_2.jpg');" data-stellar-background-ratio="0.5">
  <div class="overlay"></div>
  <div class="container">
    <div class="row no-gutters slider-text align-items-end">
      <div class="col-md-9 ftco-animate pb-5">
        <p class="breadcrumbs mb-2"><span class="mr-2"><a href="<?php echo site_url('usuario/principal'); ?>">Inicio <i class="ion-ios-arrow-forward"></i></a></span> <span>Perfil <i class="ion-ios-arrow-forward"></i></span></p>
        <h1 class="mb-0 bread">Perfil</h1>
      </div>
    </div>
  </div>
</section>

<body>
  <section class="ftco-section">
    <div class="container">
      <?php
      $idUsuarioSesion = $this->session->userdata('idUsuario');
      foreach ($usuarios as $usuario) :
        if ($usuario->idUsuario == $idUsuarioSesion) :
      ?>
          <div class="row justify-content-center">
            <div class="col-md-8 text-center">
              <div class="wrapper">
                <?php
                $imageNumber = $usuario->idUsuario % 1000;
                $imageUrl = "https://picsum.photos/seed/{$imageNumber}/200/200";
                ?>
                <img src="<?php echo $imageUrl; ?>" alt="Foto de perfil" class="profile-image mb-3"><br>
                <button onclick="alert('Cambiar foto')" class="btn btn-primary mb-4">Cambiar Foto</button>
                <div class="user-info mb-4">
                  <h2><?php echo $usuario->nombres . ' ' . $usuario->primerApellido; ?></h2>
                  <td>
                    <?php
                    $fechaNacimiento = new DateTime($usuario->fechaNacimiento);
                    $hoy = new DateTime(date("Y-m-d"));
                    $edad = $hoy->diff($fechaNacimiento)->y;
                    echo $edad . ' Años';
                    ?>
                  </td><br>
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
                </div>

                <?php echo form_open("usuario/modUsuarioP"); ?>
                <input type="hidden" name="idUsuario" value="<?php echo $usuario->idUsuario; ?>">
                <button type="submit" class="btn btn-success"> Editar Datos</button>
                <?php echo form_close(); ?>
              </div>
            </div>
          </div>
      <?php
        endif;
      endforeach;
      ?>
    </div>
  </section>


  <section class="ftco-section">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-12">
          <h3 class="mb-4">Actividades Pasadas</h3>
          <div class="row">
            <div class="col-md-4">
              <div class="card mb-4">
                <div class="card-body">
                  <h5 class="card-title">Maratón de Programación</h5>
                  <p class="card-text">10 de septiembre, 2024</p>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="card mb-4">
                <div class="card-body">
                  <h5 class="card-title">Curso de Machine Learning</h5>
                  <p class="card-text">5 de agosto, 2024</p>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="card mb-4">
                <div class="card-body">
                  <h5 class="card-title">Taller de Diseño UX/UI</h5>
                  <p class="card-text">20 de julio, 2024</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="ftco-section">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-12">
          <h3 class="mb-4">Actividades Pasadas</h3>
          <div class="row">
            <!-- Esta sección se generará dinámicamente con datos de la base de datos -->
            <div class="col-md-4">
              <div class="card mb-4">
                <div class="card-body">
                  <h5 class="card-title">Maratón de Programación</h5>
                  <p class="card-text">10 de septiembre, 2024</p>
                  <p class="card-text"><small class="text-success">Completada</small></p>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="card mb-4">
                <div class="card-body">
                  <h5 class="card-title">Curso de Machine Learning</h5>
                  <p class="card-text">5 de agosto, 2024</p>
                  <p class="card-text"><small class="text-success">Completada</small></p>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="card mb-4">
                <div class="card-body">
                  <h5 class="card-title">Taller de Diseño UX/UI</h5>
                  <p class="card-text">20 de julio, 2024</p>
                  <p class="card-text"><small class="text-success">Completada</small></p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</body>
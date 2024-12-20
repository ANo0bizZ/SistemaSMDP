<style>
  .mascota-card {
    height: 450px;
    margin-bottom: 20px;
  }

  .mascota-img {
    height: 300px;
    object-fit: cover;
  }

  .mascota-info {
    height: 150px;
    position: relative;
  }

  .solicitar-btn {
    position: absolute;
    bottom: 10px;
    left: 50%;
    transform: translateX(-50%);
  }
</style>
<section class="hero-wrap hero-wrap-2" style="background-image: url('<?php echo base_url() ?>extrasPrincipal/images/bg_2.jpg');" data-stellar-background-ratio="0.5">
  <div class="overlay"></div>
  <div class="container">
    <div class="row no-gutters slider-text align-items-end">
      <div class="col-md-9 ftco-animate pb-5">
        <p class="breadcrumbs mb-2"><span class="mr-2"><a href="<?php echo site_url('usuario/principal'); ?>">Inicio <i class="ion-ios-arrow-forward"></i></a></span> <span>Galeria<i class="ion-ios-arrow-forward"></i></span></p>
        <h1 class="mb-0 bread">Galeria</h1>
      </div>
    </div>
  </div>
</section>

<section class="ftco-section">
  <div class="container">
    <h2 class="text-center mb-4" id="adopcion-section">Filtrar Mascotas en la Galería</h2>
    <form action="<?php echo site_url('usuario/galeria'); ?>" method="get" class="mb-5">
      <div class="form-row">
        <div class="col-md-4">
          <label for="especie">Especie</label>
          <select name="especie" id="especie" class="form-control">
            <option value="">Todas</option>
            <?php foreach ($especies as $especie): ?>
              <option value="<?php echo $especie->idEspecies; ?>" <?php echo set_select('especie', $especie->idEspecies); ?>>
                <?php echo $especie->nombre; ?>
              </option>
            <?php endforeach; ?>
          </select>
        </div>
        <div class="col-md-4">
          <label for="tamanio">Tamaño</label>
          <select name="tamanio" id="tamanio" class="form-control">
            <option value="">Todos</option>
            <option value="Grande" <?php echo set_select('tamanio', 'Grande'); ?>>Grande</option>
            <option value="Mediano" <?php echo set_select('tamanio', 'Mediano'); ?>>Mediano</option>
            <option value="Pequeño" <?php echo set_select('tamanio', 'Pequeño'); ?>>Pequeño</option>
          </select>
        </div>
        <div class="col-md-4">
          <label for="raza">Raza</label>
          <select name="raza" id="raza" class="form-control">
            <option value="">Todas</option>
            <?php foreach ($razas as $raza): ?>
              <option value="<?php echo $raza->idRazas; ?>" <?php echo set_select('raza', $raza->idRazas); ?>>
                <?php echo $raza->nombre; ?>
              </option>
            <?php endforeach; ?>
          </select>
        </div>
      </div>
      <div class="form-row mt-3">
        <div class="col-md-12 text-center">
          <button type="submit" class="btn btn-primary">Aplicar Filtros</button>
        </div>
      </div>
    </form>
    <h2 class="text-center mb-4">Mascotas en Adopción</h2>
    <div class="row">
      <?php foreach ($mascotas as $mascota): ?>
        <div class="col-md-4 ftco-animate">
          <div class="mascota-card">
            <?php
            $fotos = !empty($mascota->fotos) ? explode(',', $mascota->fotos) : [];
            $carouselId = 'carousel-' . $mascota->idMascotas;
            ?>
            <?php if (!empty($fotos)): ?>
              <div id="<?php echo $carouselId; ?>" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                  <?php foreach ($fotos as $index => $foto): ?>
                    <div class="carousel-item <?php echo $index === 0 ? 'active' : ''; ?>">
                      <img src="<?php echo base_url($foto); ?>" class="d-block w-100 mascota-img" alt="<?php echo $mascota->nombre; ?>">
                      <a href="#" class="icon image-popup d-flex justify-content-center align-items-center" data-toggle="modal" data-target="#modal-<?php echo $mascota->idMascotas; ?>"><br>
                        <span class="fas fa-expand-alt"></span>
                      </a>
                    </div>
                  <?php endforeach; ?>
                </div>
                <?php if (count($fotos) > 1): ?>
                  <a class="carousel-control-prev" href="#<?php echo $carouselId; ?>" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                  </a>
                  <a class="carousel-control-next" href="#<?php echo $carouselId; ?>" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                  </a>
                <?php endif; ?>
              </div>
            <?php else: ?>
              <div class="no-image-placeholder mascota-img" style="background-color: #f0f0f0; display: flex; align-items: center; justify-content: center;">
                <p>No hay imagen disponible</p>
              </div>
            <?php endif; ?>
            <div class="mascota-info">
              <h6><?php echo $mascota->raza; ?></h6>
              <h2><?php echo $mascota->nombre; ?></h2>
              <?php if ($this->session->userdata('idUsuario')): ?>
                <a href="<?php echo site_url('adopciones/solicitudAdopcion'); ?>" class="btn btn-primary solicitar-btn">Solicitar Adopción</a>
              <?php else: ?>
                <a href="<?php echo site_url('usuario/login'); ?>" class="btn btn-primary solicitar-btn">Solicitar Adopción</a>
              <?php endif; ?>
            </div>
          </div>
        </div>

        <div class="modal fade" id="modal-<?php echo $mascota->idMascotas; ?>" tabindex="-1" role="dialog" aria-hidden="true">
          <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
              <div class="modal-body">
                <div id="modal-carousel-<?php echo $mascota->idMascotas; ?>" class="carousel slide" data-ride="carousel">
                  <div class="carousel-inner">
                    <?php foreach ($fotos as $index => $foto): ?>
                      <div class="carousel-item <?php echo $index === 0 ? 'active' : ''; ?>">
                        <img src="<?php echo base_url($foto); ?>" class="d-block w-100" alt="<?php echo $mascota->nombre; ?>">
                      </div>
                    <?php endforeach; ?>
                  </div>
                  <a class="carousel-control-prev" href="#modal-carousel-<?php echo $mascota->idMascotas; ?>" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Anterior</span>
                  </a>
                  <a class="carousel-control-next" href="#modal-carousel-<?php echo $mascota->idMascotas; ?>" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Siguiente</span>
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    </div>

    <div class="row mt-5">
      <div class="col text-center">
        <div class="block-27">
          <ul>
            <?php if ($pagina_actual > 1): ?>
              <li><a href="<?php echo base_url('mascota/galeria/' . ($pagina_actual - 1) . '?' . http_build_query($_GET)); ?>">&lt;</a></li>
            <?php endif; ?>

            <?php for ($i = 1; $i <= $total_paginas; $i++): ?>
              <li <?php echo $i == $pagina_actual ? 'class="active"' : ''; ?>>
                <a href="<?php echo base_url('mascota/galeria/' . $i . '?' . http_build_query($_GET)); ?>"><?php echo $i; ?></a>
              </li>
            <?php endfor; ?>

            <?php if ($pagina_actual < $total_paginas): ?>
              <li><a href="<?php echo base_url('mascota/galeria/' . ($pagina_actual + 1) . '?' . http_build_query($_GET)); ?>">&gt;</a></li>
            <?php endif; ?>
          </ul>
        </div>
      </div>
    </div>
  </div>
</section>
</body>

</html>
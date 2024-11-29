<style>
  /* Estilo para el mensaje de éxito */
#mensajeAlert.success {
  background-color: #dff0d8;
  color: #3c763d;
  border: 1px solid #d6e9c6;
}

/* Estilo para el mensaje de error */
#mensajeAlert.error {
  background-color: #f2dede;
  color: #a94442;
  border: 1px solid #ebccd1;
}

</style>
<section class="hero-wrap hero-wrap-2" style="background-image: url('<?php echo base_url() ?>extrasPrincipal/images/bg_2.jpg');" data-stellar-background-ratio="0.5">
  <div class="overlay"></div>
  <div class="container">
    <div class="row no-gutters slider-text align-items-end">
      <div class="col-md-9 ftco-animate pb-5">
        <p class="breadcrumbs mb-2"><span class="mr-2"><a href="<?php echo site_url('usuario/principal'); ?>">Inicio <i class="ion-ios-arrow-forward"></i></a></span> <span>Eventos <i class="ion-ios-arrow-forward"></i></span></p>
        <h1 class="mb-0 bread">Eventos</h1>
      </div>
    </div>
  </div>
</section>

<section class="ftco-section bg-light">
  <div id="mensajeAlert" style="display:none; padding: 10px; background-color: lightgreen; border: 1px solid green; border-radius: 5px; margin-top: 20px;"></div>
  <div class="container">
  <h2 class="text-center mb-4" id="eventos-section">Actividades del Refugio</h2>
    <div class="row d-flex">
      <?php foreach ($actividades as $actividad): ?>
        <div class="col-md-4 d-flex ftco-animate">
          <div class="blog-entry align-self-stretch">
            <a href="#" class="block-20 rounded"
              style="background-image: url('<?php
                                            if ($actividad->tipoEvento == 1) {
                                              echo base_url() . 'extrasPrincipal/images/adopciones.jpg';
                                            } elseif ($actividad->tipoEvento == 2) {
                                              echo base_url() . 'extrasPrincipal/images/concientizacion.png';
                                            } elseif ($actividad->tipoEvento == 3) {
                                              echo base_url() . 'extrasPrincipal/images/donacion.jpg';
                                            } else {
                                              echo base_url() . 'extrasPrincipal/images/SMDP.png';
                                            }
                                            ?>');">
            </a>
            <div class="text p-4">
              <div class="meta mb-2">
                <div><i class="fa fa-calendar"></i> <?php echo date('d/m/Y', strtotime($actividad->fechaInicio)); ?></div>
                <?php if ($actividad->fechaFin != $actividad->fechaInicio): ?>
                  <div><i class="fa fa-calendar-check"></i> <?php echo date('d/m/Y', strtotime($actividad->fechaFin)); ?></div>
                <?php endif; ?>
                <div><i class="fa fa-map-marker"></i> <?php echo $actividad->ubicacion; ?></div>
              </div>
              <h3 class="heading"><?php echo $actividad->nombre; ?></h3>
              <p><?php echo substr($actividad->descripcion, 0, 150) . '...'; ?></p>
              <p><strong>Tipo de Evento:</strong>
                <?php
                if ($actividad->tipoEvento == 1) {
                  echo 'Campaña de Adopción';
                } elseif ($actividad->tipoEvento == 2) {
                  echo 'Campaña de Concientización';
                } elseif ($actividad->tipoEvento == 3) {
                  echo 'Recaudación de Fondos';
                } else {
                  echo 'Tipo de Evento Desconocido';
                }
                ?>
              </p>
              <?php if (isset($usuario_logueado)): ?>
                <div class="buttons-participation mt-3">
                  <form action="<?php echo site_url('usuario/registrarParticipacion'); ?>" method="POST">
                    <input type="hidden" name="idActividad" value="<?php echo $actividad->idActividad; ?>">
                    <?php
                    $participacion = isset($participaciones[$actividad->idActividad]) ? $participaciones[$actividad->idActividad] : null;

                    if ($participacion && $participacion->estado == 1): ?>
                      <p>¡Te has registrado para este evento!</p>
                    <?php elseif ($participacion && $participacion->estado == 2): ?>
                      <p>Has indicado que no participarás en este evento.</p>
                    <?php else: ?>
                      <button class="btn btn-sm btn-outline-success"
                        type="submit"
                        name="accion"
                        value="participar"
                        id="btn-participar-<?php echo $actividad->idActividad; ?>">
                        <i class="fa fa-check"></i> Quiero Participar
                      </button>
                      <button class="btn btn-sm btn-outline-danger"
                        type="submit"
                        name="accion"
                        value="noParticipar"
                        id="btn-no-participar-<?php echo $actividad->idActividad; ?>">
                        <i class="fa fa-times"></i> No podré participar
                      </button>
                    <?php endif; ?>
                  </form>
                </div>
              <?php else: ?>
                <p class="text-danger">Inicia sesión para registrar tu participación</p>
              <?php endif; ?>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<script>
  function registrarParticipacion(idActividad, accion) {
    var asistira = (accion == 'participar') ? 1 : 2;

    const mensaje = document.getElementById(`mensaje-${idActividad}`);
    const btnParticipar = document.getElementById(`btn-participar-${idActividad}`);
    const btnNoParticipar = document.getElementById(`btn-no-participar-${idActividad}`);
    const mensajeAlert = document.getElementById("mensajeAlert");

    btnParticipar.disabled = true;
    btnNoParticipar.disabled = true;

    $.ajax({
      url: '<?php echo site_url("usuario/registrarParticipacion"); ?>',
      type: 'POST',
      data: {
        idActividad: idActividad,
        accion: accion,
        asistira: asistira
      },
      success: function(response) {
        var jsonResponse = JSON.parse(response); 

        if (jsonResponse.status === 'success') {
          mensajeAlert.classList.remove("error"); 
          mensajeAlert.classList.add("success");   
          mensajeAlert.textContent = jsonResponse.message; 
          mensajeAlert.style.display = "block";    
        } else {
          mensajeAlert.classList.remove("success"); 
          mensajeAlert.classList.add("error");      
          mensajeAlert.textContent = jsonResponse.message; 
          mensajeAlert.style.display = "block";      
        }

        if (asistira === 1) {
          mensaje.textContent = "¡Te has registrado para este evento!";
          mensaje.classList.add("text-success");
        } else {
          mensaje.textContent = "Has indicado que no participarás en este evento.";
          mensaje.classList.add("text-danger");
        }

        mensaje.style.display = "block";
        btnParticipar.style.display = "none";
        btnNoParticipar.style.display = "none";
      },
      error: function() {
        alert('Hubo un problema al registrar tu participación. Intenta nuevamente.');
        btnParticipar.disabled = false;
        btnNoParticipar.disabled = false;
      }
    });
  }
</script>
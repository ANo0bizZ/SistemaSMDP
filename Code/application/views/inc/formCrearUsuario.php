<div class="container" id="container" style="max-width: 600px; margin: auto;">
    <div class="form-container sign-up" style="padding: 30px; box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1); border-radius: 15px; background: #fff;">
        <form action="<?php echo site_url('usuario/registrarUsuario'); ?>" method="post" id="formRegistro">
            <h3 style="text-align: center; margin-bottom: 20px;">Crear Cuenta</h3>
            <input type="text" name="nombres" placeholder="Nombre(s)" required style="width: 100%; margin-bottom: 15px; padding: 10px; border-radius: 10px; border: 1px solid #ddd;">
            <div style="display: flex; gap: 10px; margin-bottom: 15px;">
                <input type="text" name="primerApellido" placeholder="Primer Apellido" style="flex: 1; padding: 10px; border-radius: 10px; border: 1px solid #ddd;" required>
                <input type="text" name="segundoApellido" placeholder="Segundo Apellido" style="flex: 1; padding: 10px; border-radius: 10px; border: 1px solid #ddd;">
            </div>
            <input type="date" name="fechaNacimiento" placeholder="Fecha de Nacimiento" required style="width: 100%; margin-bottom: 15px; padding: 10px; border-radius: 10px; border: 1px solid #ddd;">
            <input type="email" name="usuario" placeholder="Email" required style="width: 100%; margin-bottom: 15px; padding: 10px; border-radius: 10px; border: 1px solid #ddd;">
            <input type="password" name="contra" placeholder="Password" required style="width: 100%; margin-bottom: 15px; padding: 10px; border-radius: 10px; border: 1px solid #ddd;">
            <label for="rol" style="margin-bottom: 5px;">¿Cómo deseas ayudarnos?</label>
            <select class="form-control" name="rol" id="rol" style="width: 100%; margin-bottom: 15px; padding: 10px; border-radius: 10px; border: 1px solid #ddd;" required>
                <option value="1">Adoptante</option>
                <option value="2">Voluntario</option>
            </select>
            <button type="submit" style="width: 100%; padding: 10px; background: #4CAF50; color: white; border: none; border-radius: 10px;">Registrarse</button>
        </form>
    </div>
</div>

<div class="modal fade" id="successModal" tabindex="-1" role="dialog" aria-labelledby="successModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header" style="border-bottom: none;">
        <h5 class="modal-title" id="successModalLabel">¡Registro Exitoso!</h5>
      </div>
      <div class="modal-body">
        El usuario se ha registrado correctamente.
      </div>
      <div class="modal-footer" style="border-top: none;">
        <button type="button" class="btn btn-success" id="btnAceptar">Aceptar</button>
      </div>
    </div>
  </div>
</div>

<script>
    document.getElementById('formRegistro').addEventListener('submit', function(event) {
        event.preventDefault();
        var form = this;
        var xhr = new XMLHttpRequest();
        xhr.open('POST', form.action, true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.onload = function() {
            if (xhr.status === 200) {
                form.reset();
                $('#successModal').modal('show');
            }
        };
        xhr.send(new URLSearchParams(new FormData(form)).toString());
    });
    document.getElementById('btnAceptar').addEventListener('click', function() {
        $('#successModal').modal('hide');
    });
</script>

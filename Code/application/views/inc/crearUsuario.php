<div class="container" id="container">
    <div class="form-container sign-up">
        <form action="<?php echo site_url('usuario/registrarUsuarioA'); ?>" method="post">
            <h3>Crear Cuenta</h3>
            <div class="social-icons">
                <a href="#" class="icon"><i class="fa-brands fa-google-plus-g"></i></a>
                <a href="#" class="icon"><i class="fa-brands fa-facebook-f"></i></a>
            </div>
            <input type="text" name="nombres" placeholder="Nombre(s)" required>
            <div style="display: flex; gap: 10px;">
                <input type="text" name="primerApellido" placeholder="Primer Apellido" style="flex: 1;" required>
                <input type="text" name="segundoApellido" placeholder="Segundo Apellido" style="flex: 1;" required>
            </div>
            <input type="date" name="fechaNacimiento" placeholder="Fecha de Nacimiento" required>
            <input type="email" name="usuario" placeholder="Email" required>
            <input type="password" name="contra" placeholder="Password" required>
            <label for="rol">¿Cómo deseas ayudarnos?</label>
            <select class="form-control" name="rol" id="rol" style="width: 100%; border-radius: 10px; padding: 5px;" required>
                <option value="1">Adoptante</option>
                <option value="2">Voluntario</option>
            </select>
            <button type="submit">Registrarse</button>
        </form>
    </div>
</div>

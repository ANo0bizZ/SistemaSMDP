<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>extrasLogin/style.css">
    <title>Inicio de Sesión</title>
</head>

<body>
    <div class="container" id="container">
        <div class="form-container sign-up">
            <form action="<?php echo site_url('usuario/registrarUsuario'); ?>" method="post">
                <h3>Crear Cuenta</h3>
                <input type="text" name="nombres" placeholder="Nombre(s)" required>
                <div style="display: flex; gap: 10px;">
                    <input type="text" name="primerApellido" placeholder="Primer Apellido" style="flex: 1;" required>
                    <input type="text" name="segundoApellido" placeholder="Segundo Apellido" style="flex: 1;">
                </div>
                <div style="display: flex; align-items: center; gap: 10px;">
                    <label for="fechaNacimiento" style="font-size: 13px; min-width: 50px;">Fecha de Nacimiento:</label>
                    <input type="date" name="fechaNacimiento" id="fechaNacimiento" placeholder="Fecha de Nacimiento" required>
                </div>
                <input type="email" name="usuario" placeholder="Email" required>
                <label for="rol">¿Como deseas ayudarnos?</label>
                <select class="form-control" name="rol" id="rol" style="width: 100%; border-radius: 10px; padding: 5px;" required>
                    <option value="1">Adoptante</option>
                    <option value="2">Voluntario</option>
                </select>
                <input type="number" name="celular" id="celular" placeholder="Número de Celular" style="display: none;">
                <button type="submit">Registrarse</button>
            </form>
        </div>

        <div class="form-container sign-in">
            <form action="<?php echo site_url('usuario/validarLogin'); ?>" method="post">
                <h1 align="center">Iniciar Sesión</h1><br>
                <span>Inicie sesión si ya tiene una cuenta</span>
                <input type="email" name="usuario" id="usuario" class="form-control" placeholder="Email">
                <input type="password" name="contra" id="contra" class="form-control" placeholder="Contraseña">
                <?php if (isset($error)) {
                    echo '<p style="color:red;">' . $error . '</p>';
                } ?>
                <a href="#">¿Olvidó su Contraseña? </a>
                <button type="submit" class="btn btn-primary btn-block">Iniciar Sesión </button>
            </form>
        </div>

        <div class="toggle-container">
            <div class="toggle">
                <div class="toggle-panel toggle-left">
                    <h1>Bienvenido de Vuelta</h1>
                    <p>"¡Hola de nuevo! Accede a tu cuenta para seguir marcando la diferencia con nosotros."</p>
                    <button class="hidden" id="login">Iniciar Sesión</button>
                </div>
                <div class="toggle-panel toggle-right">
                    <h1>Bienvenido</h1>
                    <p>¡Tu apoyo es invaluable! Regístrate para adoptar una mascota o para ser parte de nuestro equipo de voluntarios.</p>
                    <button class="hidden" id="register">Registrarse</button>
                </div>
            </div>
        </div>
    </div>

    <script src="<?php echo base_url(); ?>extrasLogin/script.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const rolSelect = document.getElementById('rol');
            const celularInput = document.getElementById('celular');

            rolSelect.addEventListener('change', function() {
                if (rolSelect.value === '2') { // Si se selecciona "Voluntario"
                    celularInput.style.display = 'block'; // Mostrar el campo de celular
                } else {
                    celularInput.style.display = 'none'; // Ocultar el campo de celular
                    celularInput.value = ''; // Limpiar el campo si no se muestra
                }
            });
        });
    </script>

</body>

</html>
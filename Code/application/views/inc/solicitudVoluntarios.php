
<body>
    <div class="container mt-5">
        <h2>Solicitudes de Voluntarios</h2>
        <?php if ($this->session->flashdata('success')): ?>
            <div class="alert alert-success"><?= $this->session->flashdata('success'); ?></div>
        <?php endif; ?>
        <?php if ($this->session->flashdata('error')): ?>
            <div class="alert alert-danger"><?= $this->session->flashdata('error'); ?></div>
        <?php endif; ?>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Nombres</th>
                    <th>Primer Apellido</th>
                    <th>Segundo Apellido</th>
                    <th>Email</th>
                    <th>Fecha de Nacimiento</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($solicitudes as $indice => $solicitud): ?>
                    <tr>
                        <td><?= $solicitud['nombres']; ?></td>
                        <td><?= $solicitud['primerApellido']; ?></td>
                        <td><?= $solicitud['segundoApellido']; ?></td>
                        <td><?= $solicitud['usuario']; ?></td>
                        <td><?= $solicitud['fechaNacimiento']; ?></td>
                        <td>
                            <a href="<?= site_url('usuario/aceptarSolicitud/' . $indice); ?>" class="btn btn-success">Aceptar</a>
                            <a href="<?= site_url('usuario/rechazarSolicitud/' . $indice); ?>" class="btn btn-danger">Rechazar</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>

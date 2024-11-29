<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Gráfica de Participaciones de Voluntarios</h3>
            </div>
        </div>
        <div class="col-md-12 col-sm-12 ">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Gráfica de voluntarios por actividad</h2>
                    <div class="clearfix"></div>
                </div>

                <div class="x_content">
                    <div class="card-box table-responsive">
                        <div id="participacionesChart" style="width: 100%; height: 500px;"></div>
                        <table id="datatable-buttons" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Actividad</th>
                                    <th>Número de Voluntarios Participantes</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($participaciones as $participacion) : ?>
                                    <tr>
                                        <td><?php echo $participacion['nombre']; ?></td>
                                        <td><?php echo $participacion['total_participantes']; ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://www.gstatic.com/charts/loader.js"></script>

<script>
    google.charts.load('current', { packages: ['corechart'] });
    google.charts.setOnLoadCallback(drawChart);

    const actividades = <?php echo json_encode(array_column($participaciones, 'nombre')); ?>;
    const participantes = <?php echo json_encode(array_column($participaciones, 'total_participantes')); ?>;

    function drawChart() {
        const data = new google.visualization.DataTable();
        data.addColumn('string', 'Actividad');
        data.addColumn('number', 'Número de Participantes');

        for (let i = 0; i < actividades.length; i++) {
            data.addRow([actividades[i], parseInt(participantes[i])]);
        }

        const options = {
            title: 'Participaciones por Actividad',
            chartArea: { width: '70%' },
            hAxis: {
                title: 'Número de Participantes',
                minValue: 0,
                format: '0'
            },
            vAxis: {
                title: 'Actividad'
            },
            bars: 'horizontal',
            colors: ['#5cb85c']
        };

        const chart = new google.visualization.BarChart(document.getElementById('participacionesChart'));
        chart.draw(data, options);
    }
</script>

<footer>

  <div class="pull-right">
    Realizado por: <a href="www.linkedin.com/in/ano0bizz">ANo0bizZ</a>
  </div>
  <div class="clearfix"></div>
</footer>
</div>
</div>
<script src="<?php echo base_url(); ?>admin/vendors/jquery/dist/jquery.min.js"></script>
<script src="<?php echo base_url(); ?>admin/vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<script src="<?php echo base_url(); ?>admin/vendors/fastclick/lib/fastclick.js"></script>
<script src="<?php echo base_url(); ?>admin/vendors/nprogress/nprogress.js"></script>
<script src="<?php echo base_url(); ?>admin/vendors/iCheck/icheck.min.js"></script>
<script src="<?php echo base_url(); ?>admin/vendors/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>admin/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>admin/vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?php echo base_url(); ?>admin/vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>admin/vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
<script src="<?php echo base_url(); ?>admin/vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
<script src="<?php echo base_url(); ?>admin/vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
<script src="<?php echo base_url(); ?>admin/vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
<script src="<?php echo base_url(); ?>admin/vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
<script src="<?php echo base_url(); ?>admin/vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?php echo base_url(); ?>admin/vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
<script src="<?php echo base_url(); ?>admin/vendors/datatables.net-scroller/js/dataTables.scroller.min.js"></script>
<script src="<?php echo base_url(); ?>admin/vendors/jszip/dist/jszip.min.js"></script>
<script src="<?php echo base_url(); ?>admin/vendors/pdfmake/build/pdfmake.min.js"></script>
<script src="<?php echo base_url(); ?>admin/vendors/pdfmake/build/vfs_fonts.js"></script>
<script src="<?php echo base_url(); ?>admin/build/js/custom.min.js"></script>
<script>
$(document).ready(function() {
    if ($.fn.DataTable.isDataTable('#datatable-buttons')) {
        $('#datatable-buttons').DataTable().destroy();
    }
    
    $('#datatable-buttons').DataTable({
        responsive: true,
        dom: 'Blfrtip',
        buttons: [
            {
                extend: 'copy',
                text: 'Copiar'
            },
            {
                extend: 'csv',
                text: 'Exportar a CSV'
            },
            {
                extend: 'excel',
                text: 'Exportar a Excel'
            },
            {
                extend: 'pdf',
                text: 'Exportar a PDF'
            },
            {
                extend: 'print',
                text: 'Imprimir'
            }
        ],
        language: {
            "decimal": "",
            "emptyTable": "No hay datos disponibles en la tabla",
            "info": "Mostrando _START_ a _END_ de _TOTAL_ registros",
            "infoEmpty": "Mostrando 0 a 0 de 0 registros",
            "infoFiltered": "(filtrado de _MAX_ registros totales)",
            "infoPostFix": "",
            "thousands": ",",
            "lengthMenu": "Mostrar _MENU_ registros",
            "loadingRecords": "Cargando...",
            "processing": "Procesando...",
            "search": "Buscar:",
            "zeroRecords": "No se encontraron registros coincidentes",
            "paginate": {
                "first": "Primero",
                "last": "Último",
                "next": "Siguiente",
                "previous": "Anterior"
            },
            "aria": {
                "sortAscending": ": activar para ordenar la columna ascendentemente",
                "sortDescending": ": activar para ordenar la columna descendentemente"
            }
        }
    });
});
</script>


</body>

</html>

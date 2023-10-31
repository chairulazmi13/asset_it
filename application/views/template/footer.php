<!-- Main Footer -->
<footer class="main-footer">
  <!-- To the right -->
  <div class="pull-right hidden-xs">
    Made with ❤️
  </div>
  <!-- Default to the left -->
  <strong>Develop by Chairul Azmi</strong>
</footer>

<!-- Add the sidebar's background. This div must be placed
immediately after the control sidebar -->
<div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- REQUIRED JS SCRIPTS -->

<!-- SlimScroll -->
<script src="<?php echo base_url(); ?>assets/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="<?php echo base_url(); ?>assets/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url(); ?>assets/dist/js/demo.js"></script>
<!-- DataTables -->
<script src="<?php echo base_url(); ?>assets/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>assets/bower_components/datatables.net/js/dataTables.buttons.min.js"></script>
<script src="<?php echo base_url(); ?>assets/bower_components/datatables.net/js/jszip.min.js"></script>
<script src="<?php echo base_url(); ?>assets/bower_components/datatables.net/js/pdfmake.min.js"></script>
<script src="<?php echo base_url(); ?>assets/bower_components/datatables.net/js/vfs_fonts.js"></script>
<script src="<?php echo base_url(); ?>assets/bower_components/datatables.net/js/buttons.html5.min.js"></script>
<script src="<?php echo base_url(); ?>assets/bower_components/datatables.net/js/buttons.print.min.js"></script>
<script src="<?php echo base_url(); ?>assets/bower_components/datatables.net/js/buttons.colVis.min.js"></script>
<!-- date-range-picker -->
<script src="<?php echo base_url(); ?>assets/bower_components/moment/min/moment.min.js"></script>
<script src="<?php echo base_url(); ?>assets/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- bootstrap datepicker -->
<script src="<?php echo base_url(); ?>assets/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>

<!-- page script -->
<script>
  $(document).ready(function() {
    var table = $('#example1').DataTable({
      dom: 'Bfrtip',
      lengthChange: false,
      buttons: [
        'copy', 'excel', 'pdf', 'print', 'colvis'
      ]
    })

    table.buttons().container()
      .appendTo('#example_wrapper .col-sm-6:eq(0)')

    //Date picker
    $('#datepicker').datepicker({
      minDate: 0,
      format: 'yyyy-mm-dd',
      autoclose: true
    })

    $('.pinjamKembali').datepicker({
      minDate: 0,
      format: 'yyyy-mm-dd',
      autoclose: true
    })

  });
</script>
</body>

</html>
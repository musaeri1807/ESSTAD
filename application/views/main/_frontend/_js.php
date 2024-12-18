  <!-- jQuery 3 -->
  <script src="<?= base_url(); ?>/AdminLTE-2.4.13/bower_components/jquery/dist/jquery.min.js"></script>
  <!-- Bootstrap 3.3.7 -->
  <script src="<?= base_url(); ?>/AdminLTE-2.4.13/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
  <!-- AdminLTE App -->
  <script src="<?= base_url(); ?>/AdminLTE-2.4.13/dist/js/adminlte.min.js"></script>

  <!-- FastClick -->
  <script src="<?= base_url(); ?>/AdminLTE-2.4.13/bower_components/fastclick/lib/fastclick.js"></script>

  <!-- AdminLTE for demo purposes -->
  <script src="<?= base_url(); ?>/AdminLTE-2.4.13/dist/js/demo.js"></script>


  <!-- Sparkline -->
  <script src="<?= base_url(); ?>/AdminLTE-2.4.13/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
  <!-- jvectormap  -->
  <script src="<?= base_url(); ?>/AdminLTE-2.4.13/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
  <script src="<?= base_url(); ?>/AdminLTE-2.4.13/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
  <!-- SlimScroll -->
  <script src="<?= base_url(); ?>/AdminLTE-2.4.13/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
  <!-- ChartJS -->
  <script src="<?= base_url(); ?>/AdminLTE-2.4.13/bower_components/chart.js/Chart.js"></script>
  <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
  <script src="<?= base_url(); ?>/AdminLTE-2.4.13/dist/js/pages/dashboard2.js"></script>




  <!-- DataTables -->
  <script src="<?= base_url(); ?>/AdminLTE-2.4.13/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
  <script src="<?= base_url(); ?>/AdminLTE-2.4.13/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>

  <!-- Select2 -->
  <script src="<?= base_url(); ?>/AdminLTE-2.4.13/bower_components/select2/dist/js/select2.full.min.js"></script>

  <!-- InputMask -->
  <script src="<?= base_url(); ?>/AdminLTE-2.4.13/plugins/input-mask/jquery.inputmask.js"></script>
  <script src="<?= base_url(); ?>/AdminLTE-2.4.13/plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
  <script src="<?= base_url(); ?>/AdminLTE-2.4.13/plugins/input-mask/jquery.inputmask.extensions.js"></script>

  <!-- date-range-picker -->
  <script src="<?= base_url(); ?>/AdminLTE-2.4.13/bower_components/moment/min/moment.min.js"></script>
  <script src="<?= base_url(); ?>/AdminLTE-2.4.13/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>

  <!-- bootstrap datepicker -->
  <script src="<?= base_url(); ?>/AdminLTE-2.4.13/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>

  <!-- bootstrap color picker -->
  <script src="<?= base_url(); ?>/AdminLTE-2.4.13/bower_components/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js"></script>

  <!-- bootstrap time picker -->
  <script src="<?= base_url(); ?>/AdminLTE-2.4.13/plugins/timepicker/bootstrap-timepicker.min.js"></script>


  <!-- iCheck 1.0.1 -->
  <script src="<?= base_url(); ?>/AdminLTE-2.4.13/plugins/iCheck/icheck.min.js"></script>

  <!-- <script src="<?= base_url(); ?>/AdminLTE-2.4.13/dist/js/region.js"></script> -->

  <!-- page script -->
  <script>
    $(function() {
      $('#example1').DataTable()
      $('#example2').DataTable({
        'paging': true,
        'lengthChange': false,
        'searching': false,
        'ordering': true,
        'info': true,
        'autoWidth': false
      })
    })

    function password_show_hide() {
      var x = document.getElementById("password");
      var show_eye = document.getElementById("show_eye");
      var hide_eye = document.getElementById("hide_eye");
      hide_eye.classList.remove("d-none");
      if (x.type === "password") {
        x.type = "text";
        show_eye.style.display = "none";
        hide_eye.style.display = "block";
      } else {
        x.type = "password";
        show_eye.style.display = "block";
        hide_eye.style.display = "none";
      }
    }

    function password_show_hidee() {
      var y = document.getElementById("password2");
      var show = document.getElementById("show_eyee");
      var hide = document.getElementById("hide_eyee");
      hide.classList.remove("d-none");
      if (y.type === "password") {
        y.type = "text";
        show.style.display = "none";
        hide.style.display = "block";
      } else {
        y.type = "password";
        show.style.display = "block";
        hide.style.display = "none";
      }
    }
  </script>
  <!-- Page script -->
  <script>
    $(function() {
      //Initialize Select2 Elements
      $('.select2').select2()

      //Datemask dd/mm/yyyy
      $('#datemask').inputmask('dd/mm/yyyy', {
        'placeholder': 'dd/mm/yyyy'
      })
      //Datemask2 mm/dd/yyyy
      $('#datemask2').inputmask('mm/dd/yyyy', {
        'placeholder': 'mm/dd/yyyy'
      })
      //Money Euro
      $('[data-mask]').inputmask()

      //Date range picker
      $('#reservation').daterangepicker()
      //Date range picker with time picker
      $('#reservationtime').daterangepicker({
        timePicker: true,
        timePickerIncrement: 30,
        locale: {
          format: 'MM/DD/YYYY hh:mm A'
        }
      })
      //Date range as a button
      $('#daterange-btn').daterangepicker({
          ranges: {
            'Today': [moment(), moment()],
            'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
            'Last 7 Days': [moment().subtract(6, 'days'), moment()],
            'Last 30 Days': [moment().subtract(29, 'days'), moment()],
            'This Month': [moment().startOf('month'), moment().endOf('month')],
            'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
          },
          startDate: moment().subtract(29, 'days'),
          endDate: moment()
        },
        function(start, end) {
          $('#daterange-btn span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
        }
      )

      //Date picker
      $('#datepicker').datepicker({
        autoclose: true
      })

      //iCheck for checkbox and radio inputs
      $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
        checkboxClass: 'icheckbox_minimal-blue',
        radioClass: 'iradio_minimal-blue'
      })
      //Red color scheme for iCheck
      $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
        checkboxClass: 'icheckbox_minimal-red',
        radioClass: 'iradio_minimal-red'
      })
      //Flat red color scheme for iCheck
      $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
        checkboxClass: 'icheckbox_flat-green',
        radioClass: 'iradio_flat-green'
      })

      //Colorpicker
      $('.my-colorpicker1').colorpicker()
      //color picker with addon
      $('.my-colorpicker2').colorpicker()

      //Timepicker
      $('.timepicker').timepicker({
        showInputs: false
      })
    })
  </script>
<!DOCTYPE html>
<html lang="en">

<!-- php echo $_head -->
<?php echo @$_head; ?>

<body class="hold-transition sidebar-mini">
  <div class="wrapper">

    <!-- php echo $_nav -->
    <?php echo @$_nav; ?>

    <!-- php echo $_aside -->
    <?php echo @$_sidebar; ?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">

      <?php echo @$_header; ?>

      <!-- Main content -->

      <?php echo @$_content; ?>

      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <!-- php echo $footer -->
    <?= @$_footer; ?>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
  </div>
  <!-- ./wrapper -->

  <!-- jQuery -->
  <!-- php echo $js -->
  <?= @$_js; ?>
</body>

</html>
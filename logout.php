<!DOCTYPE html>
<html>
  <head>
    <title></title>
     <!-- Sweet Alert-->
    <link rel="stylesheet" href="assets/libs/sweetalert2/sweetalert2.min.css">
    <!-- Sweet Alerts js -->
    <script src="assets/libs/sweetalert2/sweetalert2.min.js"></script>
    <!-- Sweet alert init js-->
    <script src="assets/js/pages/sweet-alerts.init.js"></script>
  </head>
  <body>
  <?php
  session_start();
  session_destroy();
  echo "
     <script>
          Swal.fire({
          icon: 'success',
          title: 'Logout Berhasil',
        })
      </script>
    ";
  echo "<meta http-equiv='refresh' content='1; url=login.php'>";
  ?>
  </body>
</html>


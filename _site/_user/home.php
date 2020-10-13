<!--
=========================================================
* ONG Panel
=========================================================
A fazer:
-
-
-
-->
<?php 
include_once('../controller/connect.php');
include_once('../controller/session.php');

if($_SESSION['rank'] != 1) {
	header('location:http://localhost/tcc_ipet');
}
?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="desc">
  <meta name="author" content="iPet">
  <title>iPet | User</title>

  <!-- Styles -->
  <?php
    include_once "../assets/components/styles.php";
  ?>
  <!-- End Styles -->
</head>

<body>
  <!-- Sidenav -->
  <?php
    include_once "../assets/components/sidenav.php";
  ?>
  <!-- End Sidenav -->

  <!-- Main content -->
  <div class="main-content" id="panel">
    <!-- Topnav -->
    <?php
      include_once "../assets/components/top_nav.php";
    ?>
    <!-- End Topnav -->
    
    <!-- Header -->
    <?php
      include_once "../assets/components/header.php";
    ?>
    <!-- End Header -->
    
    <!-- Page content -->
    <div class="container-fluid mt--6">
      
      <!-- Content rows and cols -->
      <?php
        include_once "../assets/components/init_void.php";
      ?>
      <!-- Content rows and cols -->

      <!-- Footer -->
      <?php
        include_once "../assets/components/footer.php";
      ?>
      <!-- End Footer -->
      
    </div>
  </div>

  <!-- Styles -->
  <?php
    include_once "../assets/components/scripts.php";
  ?>
  <!-- End Styles -->
  
</body>

</html>

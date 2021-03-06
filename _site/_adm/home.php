<?php 
include_once('../controller/config.php');
include_once('../controller/connect.php');
include_once('../controller/session.php');

if($_SESSION['rank'] != 3) {
	header('location:' . BASE);
}
?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="desc">
  <meta name="author" content="iPet">
  <title>iPet | ADM</title>

  <!-- Styles -->
  <?php
    include_once "../assets/components/styles.php";
  ?>
  <!-- End Styles -->
</head>

<body>
  <!-- Sidenav -->
  <?php
    include_once "components/sidenav.php";
  ?>
  <!-- End Sidenav -->

  <!-- Main content -->
  <div class="main-content" id="panel">
    <!-- Topnav -->
    <?php
      include_once "components/top_nav.php";
    ?>
    <!-- End Topnav -->
    
    <!-- Header -->
    <?php
      include_once "components/header.php";
    ?>
    <!-- End Header -->
    
    <!-- Page content -->
    <div class="container-fluid mt--6">
      
      <!-- Content rows and cols -->
      <?php
        include_once "components/init.php";
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

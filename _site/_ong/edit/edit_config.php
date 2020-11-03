
<?php 
include_once('../../controller/config.php');
include_once('../../controller/connect.php');
include_once('../../controller/session.php');

if($_SESSION['rank'] != 2) {
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
  <title>iPet | Config</title>

  <!-- Styles -->
  <?php
    include_once "../../assets/components/styles.php";
  ?>
  <!-- End Styles -->
</head>

<body>
  <!-- Sidenav -->
  <?php
    include_once "../components/sidenav.php";
  ?>
  <!-- End Sidenav -->

  <!-- Main content -->
  <div class="main-content" id="panel">
    <!-- Topnav -->
    <?php
      include_once "../components/top_nav.php";
    ?>
    <!-- End Topnav -->
    
    <!-- Header -->
    <div class="header bg-gradient-info pb-6">
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center py-4">
            <div class="col-lg-6 col-7">
              <h6 class="h2 text-white d-inline-block mb-0">iPet</h6>
              <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                  <li class="breadcrumb-item"><a href="<?= BASE . '_site/_ong/home.php'; ?>"><i class="fas fa-home"></i></a></li>                  
                  <li class="breadcrumb-item"><a href="<?= BASE . '_site/_ong/home.php'; ?>">Home</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Configurações</li>
                </ol>
              </nav>
            </div>
            <div class="col-lg-6 col-5 text-right">
                            
            </div>
          </div>          
          <div class="row">
            <div class="col">
            <h1 class="display-2 text-white">Configurações</h1>
            <p class="text-white mt-0 mb-5">Esta é sua página de configurações. Aqui você pode definir suas preferências.</p>
            </div>
          </div>
        </div>
      </div>
    </div>      
    <!-- End Header -->
    
    <!-- Page content -->
    <div class="container-fluid mt--6">
      <div class="row">
        <div class="col-xl-12 order-xl-1">          
          <div class="card">
            <div class="card-header">
              <div class="row align-items-center">
                <div class="col-8">
                  <h3 class="mb-0">Editar perfil </h3>
                </div>
              </div>
            </div>            
            <div class="card-body">
              <form role="form" method="POST" action="<?= BASE . '_site/_ong/delete/delete_account.php';?>">            
                <h6 class="heading-small text-muted mb-4">Deletar conta</h6>
                <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-lg-6">
                    <div class="input-group mb-3">                      
                      <input name="pass1" type="password" class="form-control" placeholder="Digite sua senha" aria-label="">                      
                    </div>
                    </div>
                    <div class="col-lg-6">
                    <div class="input-group mb-3">                      
                      <input name="pass2" type="password" class="form-control" placeholder="Confirme sua senha" aria-label="">                      
                    </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="text-center">
                      <button type="submit" class="btn btn-danger">Deletar</button>
                    </div>
                  </div>                
                </div>
              </form>                                            
            </div>
          </div>
        </div>
      </div>
      <!-- End Content table -->

      <!-- Footer -->
      <?php
        include_once "../../assets/components/footer.php";
      ?>
      <!-- End Footer -->
      
    </div>
  </div>

  <!-- Styles -->
  <?php
    include_once "../../assets/components/scripts.php";
  ?>
  <!-- End Styles -->
  
</body>

</html>

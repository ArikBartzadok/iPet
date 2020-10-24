<!--
=========================================================
* List log
=========================================================
-
-
-->
<?php 
include_once('../../controller/config.php');
include_once('../../controller/connect.php');
include_once('../../controller/session.php');

if($_SESSION['rank'] != 1) {
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
  <title>iPet | Logs</title>

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
                  <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>                  
                  <li class="breadcrumb-item"><a href="../home.php">Home</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Logs</li>
                </ol>
              </nav>
            </div>
            <div class="col-lg-6 col-5 text-right">
                            
            </div>
          </div>          
          <div class="row">
            <div class="col">
            <h1 class="display-2 text-white">Lista de logs</h1>
            <p class="text-white mt-0 mb-5">Esta é sua página de registro de atividades. Aqui você pode consultar todas as ações realizadas por sua conta.</p>
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
                  <h3 class="mb-0">Logs</h3>
                </div>
              </div>
            </div>
            <div class="card-body">      
              <!-- Content table-->
              <div class="table-responsive">
                <div>                                    
                <?php
                  //Fazendo uma busca por todos os logs deste usuário
                  $id = $_SESSION['user_id'];

                  $sql = "SELECT * FROM log WHERE user_id = '$id' ORDER BY id_log DESC";
                  $res = mysqli_query($con, $sql);
            
            		  //Transforma o $resultado em um array
                  $array = mysqli_fetch_assoc($res); 

                  $profile_image =  $_SESSION['profile_image'];  

                ?>
                  <table class="table align-items-center">
                    <thead class="thead-light">
                      <tr>
                        <th scope="col" class="sort" data-sort="name">Nome</th>
                        <th scope="col" class="sort" data-sort="budget">Ação</th>
                        <th scope="col" class="sort" data-sort="status">Descrição</th>                        
                        <th scope="col" class="sort" data-sort="completion">Data</th>
                        <th scope="col">ID</th>
                        <!-- <th scope="col"></th> -->
                      </tr>
                    </thead>
                    <tbody class="list">  
                    <?php
                    //Início do loop
                    do{
                    ?>              
                    <tr>
                      <th scope="row">
                        <div class="media align-items-center">
                          <div class="avatar-group">
                            <a href="#" class="avatar avatar-sm rounded-circle" data-toggle="tooltip" data-original-title="<?= $name; ?>">
                              <img alt="Image placeholder" src="<?= PUBLICO . 'img/users/' . $profile_image; ?>">
                            </a>                      
                          </div>    
                          <div class="media-body">
                            <span class="name mb-0 text-sm"><?= $array['user_name']; ?></span>
                          </div>
                        </div>
                      </th>
                      <td class="budget">
                      <?= $array['action']; ?>
                      </td>
                      <td>
                      <?= $array['description']; ?>
                      </td>
                      <td>                        
                      <?= $array['created_at']; ?>
                      </td>
                      <td>
                        <span class="badge badge-dot mr-4">
                          <i class="bg-warning"></i>
                          <span class="status"><?= $array['id_log']; ?></span>
                        </span>
                      </td>
                      <!-- <td class="text-right">
                        <div class="dropdown">
                          <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-ellipsis-v"></i>
                          </a>
                          <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                            <a class="dropdown-item" href="#">Action</a>
                            <a class="dropdown-item" href="#">Another action</a>
                            <a class="dropdown-item" href="#">Something else here</a>
                          </div>
                        </div>
                      </td> -->
                    </tr>  
                    <?php
                    //fim do loop
                    } while($array = mysqli_fetch_assoc($res));
                    ?>              
                    </tbody>
                  </table>
                </div>    
              </div>
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

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
                  //Número de resultados a serem exibidos por vez
                  $num_page_itens = 10;

                  //pegando a página atual                  
                  $page = (isset($_GET['page']))? $_GET['page'] : 1;

                  //Fazendo uma busca pela quantidade de logs deste usuário
                  $id = $_SESSION['user_id'];
                  $sql_num_log = "SELECT * FROM log WHERE user_id = '$id'";
                  $res_num_log = mysqli_query($con, $sql_num_log);

                  //Parâmetro inicial do filtro SQL LIMIT
                  $init = ($num_page_itens*$page)-$num_page_itens;
                  
                  //Executando query para seleção de todos os logs deste usuário
                  $sql_log = "SELECT * FROM log WHERE user_id = '$id' ORDER BY id_log DESC LIMIT $init, $num_page_itens";
                  $res_log = mysqli_query($con, $sql_log);
            
            		  //Transforma o $resultado em um array
                  $array_log = mysqli_fetch_assoc($res_log); 
                  
                  //Quantidade de linhas afetadas                                               
                  $quanty_logs = mysqli_num_rows($res_num_log);   

                  //Definindo a quantidade de páginas e arredondando para o inteiro mais próximo, com a função ceils
                  $num_pages = ceil($quanty_logs/$num_page_itens);

                  //Total de páginas -> $num_pages;                  
                  //Total de registros -> $quanty_logs;

                  //Definindo a imagem de perfil deste usuário
                  $profile_image =  $_SESSION['profile_image'];                                     
                ?>
                  <table class="table align-items-center">
                    <thead class="thead-light">
                      <tr>
                        <th scope="col" class="sort" data-sort="name">Nome</th>
                        <th scope="col" class="sort" data-sort="budget">Ação</th>
                        <th scope="col" class="sort" data-sort="status">Descrição</th>                        
                        <th scope="col" class="sort" data-sort="completion">Data | Hora</th>
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
                            <a href="#" class="avatar avatar-sm rounded-circle" data-toggle="tooltip" data-original-title="<?= $array_log['user_name']; ?>">
                              <img alt="Image placeholder" src="<?= PUBLICO . 'img/users/' . $profile_image; ?>">
                            </a>                      
                          </div>    
                          <div class="media-body">
                            <span class="name mb-0 text-sm"><?= $array_log['user_name']; ?></span>
                          </div>
                        </div>
                      </th>
                      <td class="budget">
                      <?= $array_log['action']; ?>
                      </td>
                      <td>
                      <?= $array_log['description']; ?>
                      </td>
                      <td>                        
                      <?= $array_log['created_at']; ?>
                      </td>
                      <td>
                        <span class="badge badge-dot mr-4">
                          <i class="bg-info"></i>
                          <span class="status"><?= $array_log['id_log']; ?></span>
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
                    } while($array_log = mysqli_fetch_assoc($res_log));                    
                    ?>              
                    </tbody>
                  </table>
                </div>    
              </div>
              <nav aria-label="...">
                    <ul class="pagination">
                      <li class="page-item">
                        <a class="page-link" href="list_log.php?page=<?php if($page==1){ echo 1;}else{echo $page-1;};?>" tabindex="-1">
                          <i class="fa fa-angle-left"></i>
                          <span class="sr-only">Anterior</span>
                        </a>
                      </li>
                      <?php 
                        for($i=1;$i<$num_pages+1;$i++){
                        
                          $current = "";

                          if($page == $i){
                            $current = "active";
                          }
                      ?>
                      <li class="page-item <?= $current; ?>"><a class="page-link" href="list_log.php?page=<?= $i; ?>"><?= $i; ?></a></li>
                      <?php }?>
                      <li class="page-item">
                        <a class="page-link" href="list_log.php?page=<?php if($page<$num_pages){ echo $page+1;}else{echo $page;};?>">
                          <i class="fa fa-angle-right"></i>
                          <span class="sr-only">Próximo</span>
                        </a>
                      </li>
                    </ul>
              </nav>
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

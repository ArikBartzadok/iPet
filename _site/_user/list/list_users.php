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
  <title>iPet | Users</title>

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
                  <li class="breadcrumb-item"><a href="<?= BASE . '_site/_user/home.php'; ?>"><i class="fas fa-home"></i></a></li>                  
                  <li class="breadcrumb-item"><a href="<?= BASE . '_site/_user/home.php'; ?>">Home</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Usuários</li>
                </ol>
              </nav>
            </div>
            <div class="col-lg-6 col-5 text-right">
                            
            </div>
          </div>          
          <div class="row">
            <div class="col">
            <h1 class="display-2 text-white">Usuários cadastrados</h1>
            <p class="text-white mt-0 mb-5">Aqui você pode visualizar todos os usuários cadastrados.</p>
            </div>
          </div>
        </div>
      </div>
    </div>      
    <!-- End Header -->
    
    <!-- Page content -->
    <div class="container-fluid mt--6">
                <?php
                  //Número de resultados a serem exibidos por vez
                  $num_page_itens = 9;

                  //pegando a página atual                  
                  $page = (isset($_GET['page']))? $_GET['page'] : 1;

                  //Fazendo uma busca pela quantidade de usuários ativos (status = 1)
                  //$id = $_SESSION['user_id'];
                  $sql_num_user = "SELECT * FROM user WHERE ranking = 1 AND status = 1";
                  $res_num_user = mysqli_query($con, $sql_num_user);

                  //Parâmetro inicial do filtro SQL LIMIT
                  $init = ($num_page_itens*$page)-$num_page_itens;
                  
                  //Executando query para seleção de todos os usuários ativos, por ordem alfabética
                  $sql_user = "SELECT * FROM user WHERE ranking = 1 AND status = 1 ORDER BY name ASC LIMIT $init, $num_page_itens";
                  $res_user = mysqli_query($con, $sql_user);
            
            		  //Transforma o $resultado em um array
                  $array_user = mysqli_fetch_assoc($res_user); 
                  
                  //Quantidade de linhas afetadas                                               
                  $quanty_users = mysqli_num_rows($res_num_user);   

                  //Definindo a quantidade de páginas e arredondando para o inteiro mais próximo, com a função "ceils"
                  $num_pages = ceil($quanty_users/$num_page_itens);

                  //Total de páginas -> $num_pages;                  
                  //Total de registros -> $quanty_users;

                ?>      
      <!-- Content rows and cols -->
      <div class="row">
      <?php
        //Verifica se existem registros:
        if($quanty_users):
        //Início do loop
        do{                      
      ?> 
        <div class="col-xl-4 order-xl-2">
          <div class="card card-profile">
            <img src="<?= PUBLICO . 'img/theme/' . $array_user['banner']; ?>" alt="Imagem de capa" class="card-img-top">
            <div class="row justify-content-center">
              <div class="col-lg-3 order-lg-2">
                <div class="card-profile-image">
                  <a href="#">
                    <img src="<?= PUBLICO . 'img/users/' . $array_user['image']; ?>" class="rounded-circle">
                  </a>
                </div>
              </div>
            </div>
            <div class="card-header text-center border-0 pt-8 pt-md-4 pb-0 pb-md-4">
              <div class="d-flex justify-content-between">
                <button type="button" data-toggle="modal" class="btn btn-sm btn-info  mr-4" data-target="#modalContatar<?= $array_user['id_user']; ?>">Contatar</button>
                <button type="button" data-toggle="modal" class="btn btn-sm btn-default float-right" data-target="#modalEmail<?= $array_user['id_user']; ?>">Email</button>
              </div>
            </div>
            <div class="card-body pt-0">              
              <div class="text-center">
                <h5 class="h3">
                <?= $array_user['name']; ?>
                </h5>
                <h6 class="h5">
                <?= $array_user['instagram']; ?>
                </h6>
                <div class="h5 font-weight-300">
                  <i class="ni location_pin mr-2"></i><?= $array_user['city'] . ", " . $array_user['uf']; ?>
                </div>
                <span class="heading">                  
                  <?php
                    if($array_user['ranking'] == 1){
                      echo "Voluntário";
                    } elseif ($array_user['ranking'] == 2) {
                      echo "ONG";
                    } elseif ($array_user['ranking'] == 3) {
                      echo "Administrador";
                    } else {
                      echo "Oops, ocorreu um erro...";
                    }
                  ?>
                </span>
              </div>
              <div class="row">
                <div class="col">
                  <div class="card-profile-stats d-flex justify-content-center">
                    <div>
                      <h5>Biografia</h5>
                      <span class="description"><?= $array_user['bio'];?></span>
                    </div>                    
                  </div>
                </div>
              </div>
            </div>
          </div>          
        </div>

        <!-- Start modals -->
        <!-- Modal Contatar -->
        <div class="modal fade" id="modalContatar<?= $array_user['id_user']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Enviar mensagem</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <div class="btn-wrapper text-center">
                  <a href="https://api.whatsapp.com/send?phone=55<?= $array_user['telephone']; ?>&amp;text=iPet%20-%20Ol%C3%A1,%20eu%20gostaria%20de%20contatar%20vocês" class="btn btn-neutral btn-icon" target="_blank">
                    <span class="btn-inner--icon"><img src="<?= PUBLICO . 'img/icons/common/whats.png'; ?>"></span>
                    <span class="btn-inner--text">Whatsapp</span>
                  </a>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>        
              </div>
            </div>
          </div>
        </div>
        <!-- End Modal Contatar -->

        <!-- Modal Email -->
        <div class="modal fade" id="modalEmail<?= $array_user['id_user']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Enviar e-mail</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <div class="btn-wrapper text-center">
                  <a href="mailto:<?= $array_user['email'];?>" class="btn btn-neutral btn-icon">
                      <span class="btn-inner--icon"><img src="<?= PUBLICO . 'img/icons/common/gmail.png'; ?>"></span>
                    <span class="btn-inner--text">Gmail</span>
                  </a>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>        
              </div>
            </div>
          </div>
        </div>
        <!-- End Modal Email -->
        <!-- End modals-->
      <?php
        //fim do loop
        } while($array_user = mysqli_fetch_assoc($res_user));                    
      ?>
        
      </div>
      <div class="row">
      <nav aria-label="...">
                    <ul class="pagination">
                      <li class="page-item">
                        <a class="page-link" href="list_users.php?page=<?php if($page==1){ echo 1;}else{echo $page-1;};?>" tabindex="-1">
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
                      <li class="page-item <?= $current; ?>"><a class="page-link" href="list_users.php?page=<?= $i; ?>"><?= $i; ?></a></li>
                      <?php }?>
                      <li class="page-item">
                        <a class="page-link" href="list_users.php?page=<?php if($page<$num_pages){ echo $page+1;}else{echo $page;};?>">
                          <i class="fa fa-angle-right"></i>
                          <span class="sr-only">Próximo</span>
                        </a>
                      </li>
                    </ul>
              </nav>
      </div>
      <?php
      else:
      ?>      

      <div class="row">      
        <div class="col-xl-12 order-xl-1">
          <div class="card">
            <div class="card-body">              
        
              <div class="alert alert-danger" role="alert">
                <span class="alert-icon"><i class="ni ni-notification-70"></i></span>
                <span class="alert-text"><strong>Oops...</strong> ainda não existem usuários cadastrados...</span>
              </div>
              
            </div>
          </div>
        </div>
      </div>

      </div>

      <?php endif; ?>
      <!-- Content rows and cols -->

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

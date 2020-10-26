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
  <title>iPet | Pets</title>

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
                  <li class="breadcrumb-item active" aria-current="page">Pet's</li>
                </ol>
              </nav>
            </div>
            <div class="col-lg-6 col-5 text-right">
                            
            </div>
          </div>          
          <div class="row">
            <div class="col">
            <h1 class="display-2 text-white">Ajude um Pet!</h1>
            <p class="text-white mt-0 mb-5">Aqui você pode visualizar todos os Pets que estão precisando de ajuda, vamos lá?</p>
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

                  //Fazendo uma busca pela quantidade de postagens ativas
                  $id = $_SESSION['user_id'];
                  $sql_num_post = "SELECT * FROM post WHERE id_author = '$id'";
                  $res_num_post = mysqli_query($con, $sql_num_post);

                  //Parâmetro inicial do filtro SQL LIMIT
                  $init = ($num_page_itens*$page)-$num_page_itens;
                  
                  //Executando query para seleção de todos os posts do usuário, por ordem de publicação
                  $sql_post = "SELECT * FROM post WHERE id_author = '$id' ORDER BY type DESC LIMIT $init, $num_page_itens";
                  $res_post = mysqli_query($con, $sql_post);
            
            		  //Transforma o $resultado em um array
                  $array_post = mysqli_fetch_assoc($res_post); 
                  
                  //Quantidade de linhas afetadas                                               
                  $quanty_posts = mysqli_num_rows($res_num_post);   

                  //Definindo a quantidade de páginas e arredondando para o inteiro mais próximo, com a função "ceils"
                  $num_pages = ceil($quanty_posts/$num_page_itens);

                  //Total de páginas -> $num_pages;                  
                  //Total de registros -> $quanty_posts;

                ?>      
      <!-- Content rows and cols -->
      <div class="row">
      <?php
        //Início do loop
        do{                      
      ?> 
        <div class="col-xl-4 order-xl-2">
          <div class="card card-profile">
            <img src="<?= PUBLICO . 'img/posts/' . $array_post['image']; ?>" alt="Imagem de perfil" class="card-img-top">
            <div class="card-header text-center border-0 pt-8 pt-md-4 pb-0 pb-md-4">
              <div class="d-flex justify-content-between">
                <button type="button" data-toggle="modal" class="btn btn-sm btn-info  mr-4" data-target="#modalContatar<?= $array_post['id_post']; ?>">Contatar</button>
                <button type="button" data-toggle="modal" class="btn btn-sm btn-<?php
                  if($array_post['type'] == 3){
                    echo "danger";
                  } elseif ($array_post['type'] == 2) {
                    echo "warning";
                  } else{
                    echo "primary";
                  }
                ?>  mr-4" data-target="<?php 
                if($array_post['type'] == 3){
                  echo "#modal-notification-danger" . $array_post['id_post'];
                } elseif ($array_post['type'] == 2) {
                  echo "#modal-notification-warning" . $array_post['id_post'];
                } else{
                  echo "#modal-notification-primary" . $array_post['id_post'];
                }
              ?>
                ">
                <?php
                  if($array_post['type'] == 3){
                    echo "Urgente";
                  } elseif ($array_post['type'] == 2) {
                    echo "Aviso";
                  } else{
                    echo "Normal";
                  }
                ?>
                </button>
                <button type="button" data-toggle="modal" class="btn btn-sm btn-default float-right" data-target="#modalEmail<?= $array_post['id_post']; ?>">Email</button>
              </div>
            </div>
            <div class="card-body pt-0">              
              <div class="text-center">
                <h5 class="h3">
                  <?= $array_post['title']; ?>
                </h5>                
                <div class="h5 font-weight-300">
                <?php
                $date = date_create($array_post['created_at']);
                //echo date_format($date, 'Y-m-d H:i:s');
                ?>                                
                  <i class="ni location_pin mr-2"></i><?= date_format($date, 'd/m') . " às " . date_format($date, 'H:i') ?>
                </div>
              </div>
              <div class="row">
                <div class="col">
                  <div class="card-profile-stats d-flex">                  
                  <?php
                  //Limitanto a exibição do texto por tamanho
                  $string = strip_tags($array_post['text']);
                  if (strlen($string) > 100) {
                  
                      // truncate string
                      $stringCut = substr($string, 0, 100);
                      $endPoint = strrpos($stringCut, ' ');
                  
                      //se a string não contiver nenhum espaço, ela será cortada sem base de palavra.
                      $string = $endPoint? substr($stringCut, 0, $endPoint) : substr($stringCut, 0);
                      $string .= '...';
                  }
                  echo $string;
                  ?>
                  </div>
                </div>
              </div>              
              <div class="row">
                <div class="col">
                  <div class="card-profile-stats d-flex justify-content-center">
                  <div class="h5 mt-4">
                    <i class="ni business_briefcase-24 mr-2"></i>
                  <?php
                    if($_SESSION['rank'] == 1){
                      echo "Voluntário";
                    } elseif ($_SESSION['rank'] == 2) {
                      echo "ONG";
                    } elseif ($_SESSION['rank'] == 3) {
                      echo "Administrador";
                    } else {
                      echo "Oops, ocorreu um erro...";
                    }
                  ?> , <?= $array_post['author']; ?>
                  </div>                  
                  </div>
                </div>
              </div>
              <div>
              <div class="row justify-content-center">
                </div class="col">
                  <div class="text-center">
                  <div class="h5 font-weight-300">
                    <i class="ni location_pin mr-2"></i><?= $array_post['city_author'] . ", " . $array_post['uf']; ?>
                  </div>
                  </div>
                </div>
              <div class="row justify-content-center">
                <div class="col col-lg-3 order-lg-2">
                  <button class="btn btn-icon btn-secondary" type="button">
	                  <span class="btn-inner--icon">
                      <i class="ni ni-favourite-28" style="color: red;"></i>
                    </span>
                  </button>                
                </div>                
              </div>
            </div>
          </div>          
        </div>

        <!-- Start modals -->
        <!-- Modal Contatar -->
        <div class="modal fade" id="modalContatar<?= $array_post['id_post']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                  <a href="https://api.whatsapp.com/send?phone=55<?= $array_post['telephone']; ?>&amp;text=iPet%20-%20Ol%C3%A1,%20eu%20gostaria%20de%20contatar%20vocês,%20Pet%20-%20<?= $array_post['id_post']?>" target="_blank" class="btn btn-neutral btn-icon">
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
        <div class="modal fade" id="modalEmail<?= $array_post['id_post']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                  <a href="mailto:<?= $array_post['email']; ?>" class="btn btn-neutral btn-icon">
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

        <!-- Start notification Danger -->             
        <div class="modal fade" id="modal-notification-danger<?= $array_post['id_post']; ?>" tabindex="-1" role="dialog" aria-labelledby="modal-notification" aria-hidden="true">
          <div class="modal-dialog modal-danger modal-dialog-centered modal-" role="document">
            <div class="modal-content bg-gradient-danger">        	
              <div class="modal-header">
                <h6 class="modal-title" id="modal-title-notification">Este Pet precisa de sua ajuda!</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span>
                </button>
              </div>
            
              <div class="modal-body">
            	
                <div class="py-3 text-center">
                  <i class="ni ni-pin-3 fa-3x"></i>
                  <h4 class="heading mt-4">Ele está em <?= $array_post['city_author'] . ", " . $array_post['uf'];?>!</h4>
                  <p><?= $array_post['text'];?></p>
                </div>
                
              </div>
            
              <div class="modal-footer">
                <a class="btn btn-neutral btn-icon" href="https://api.whatsapp.com/send?phone=55<?= $array_post['telephone']; ?>&amp;text=Urgente%20iPet%20-%20Ol%C3%A1,%20eu%20gostaria%20de%20contatar%20vocês,%20Pet%20-%20<?= $array_post['id_post']?>" target="_blank">
                  <span class="btn-inner--icon"><img src="<?= PUBLICO; ?>img/icons/common/whats.png"></span>
                  <span class="btn-inner--text">Ajudar</span>
                </a>                
                <button type="button" class="btn btn-link text-white ml-auto" data-dismiss="modal">Fechar</button>
              </div>            
            </div>
          </div>         
        </div>

        <!-- End notification -->

        <!-- Start notification Warn -->             
        <div class="modal fade" id="modal-notification-warning<?= $array_post['id_post']; ?>" tabindex="-1" role="dialog" aria-labelledby="modal-notification" aria-hidden="true">
          <div class="modal-dialog modal-warning modal-dialog-centered modal-" role="document">
            <div class="modal-content bg-gradient-warning">        	
              <div class="modal-header">
              <h6 class="modal-title" id="modal-title-notification">Você pode ajudar este Pet?</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span>
                </button>
              </div>
            
              <div class="modal-body">
            	
                <div class="py-3 text-center">
                  <i class="ni ni-notification-70 fa-3x"></i>
                  <h4 class="heading mt-4">Ele está em <?= $array_post['city_author'] . ", " . $array_post['uf'];?>!</h4>
                  <p><?= $array_post['text'];?></p>
                </div>
                
              </div>
            
              <div class="modal-footer">
                <a class="btn btn-neutral btn-icon" href="https://api.whatsapp.com/send?phone=55<?= $array_post['telephone']; ?>&amp;text=iPet%20-%20Ol%C3%A1,%20eu%20gostaria%20de%20contatar%20vocês,%20Pet%20-%20<?= $array_post['id_post']?>" target="_blank">
                  <span class="btn-inner--icon"><img src="<?= PUBLICO; ?>img/icons/common/whats.png"></span>
                  <span class="btn-inner--text">Ajudar</span>
                </a>                
                <button type="button" class="btn btn-link text-white ml-auto" data-dismiss="modal">Fechar</button>
              </div>            
            </div>
          </div>         
        </div>

        <!-- End notification -->

        <!-- Start notification Primary -->             
        <div class="modal fade" id="modal-notification-primary<?= $array_post['id_post']; ?>" tabindex="-1" role="dialog" aria-labelledby="modal-notification" aria-hidden="true">
          <div class="modal-dialog modal-primary modal-dialog-centered modal-" role="document">
            <div class="modal-content bg-gradient-primary">        	
              <div class="modal-header">
              <h6 class="modal-title" id="modal-title-notification">Você pode ajudar este Pet?</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span>
                </button>
              </div>
            
              <div class="modal-body">
            	
                <div class="py-3 text-center">
                  <i class="ni ni-tie-bow fa-3x"></i>
                  <h4 class="heading mt-4">Ele está em <?= $array_post['city_author'] . ", " . $array_post['uf'];?>!</h4>
                  <p><?= $array_post['text'];?></p>
                </div>
                
              </div>
            
              <div class="modal-footer">
                <a class="btn btn-neutral btn-icon" href="https://api.whatsapp.com/send?phone=55<?= $array_post['telephone']; ?>&amp;text=iPet%20-%20Ol%C3%A1,%20eu%20gostaria%20de%20contatar%20vocês,%20Pet%20-%20<?= $array_post['id_post']?>" target="_blank">
                  <span class="btn-inner--icon"><img src="<?= PUBLICO; ?>img/icons/common/whats.png"></span>
                  <span class="btn-inner--text">Ajudar</span>
                </a>                
                <button type="button" class="btn btn-link text-white ml-auto" data-dismiss="modal">Fechar</button>
              </div>            
            </div>
          </div>         
        </div>

        <!-- End notification -->

        <!-- Start Edit-->          
        <div class="modal fade" id="modal-edit<? $array_post['id_post']; ?>" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
          <div class="modal-dialog modal- modal-dialog-centered modal-sm" role="document">
            <div class="modal-content">        	
              <div class="modal-body p-0">
                <div class="card bg-secondary border-0 mb-0">
                  <div class="card-header bg-transparent pb-5">
                    <div class="text-muted text-center mt-2 mb-3"><small>Gerenciar</small></div>        
                    <div class="btn-wrapper text-center">
                      <a href="<?= BASE . '_site/_user/delete/delete_post.php?id=' . $array_post['id_post'];?>">                             
                        <button class="btn btn-icon btn-danger" type="button">	                        
                          <span class="btn-inner--text">Deletar</span>
                        </button>   
                      </a>
                    </div>                                    
                  </div>
                  <div class="card-body px-lg-5 py-lg-5">
                    <div class="text-center text-muted mb-4">
                      <small><span class="text-danger font-weight-700">* </span>Esta ação não poderá ser desfeita...</small>
                    </div>        
                  </div>
                </div>                
              </div>            
            </div>
          </div>
        </div>
        <!-- End Edit-->
        <!-- End modals-->
      <?php
        //fim do loop
        } while($array_post = mysqli_fetch_assoc($res_post));                    
      ?>
        
      </div>
      <div class="row">
      <nav aria-label="...">
                    <ul class="pagination">
                      <li class="page-item">
                        <a class="page-link" href="list_pets.php?page=<?php if($page==1){ echo 1;}else{echo $page-1;};?>" tabindex="-1">
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
                      <li class="page-item <?= $current; ?>"><a class="page-link" href="list_pets.php?page=<?= $i; ?>"><?= $i; ?></a></li>
                      <?php }?>
                      <li class="page-item">
                        <a class="page-link" href="list_pets.php?page=<?php if($page<$num_pages){ echo $page+1;}else{echo $page;};?>">
                          <i class="fa fa-angle-right"></i>
                          <span class="sr-only">Próximo</span>
                        </a>
                      </li>
                    </ul>
              </nav>
      </div>
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

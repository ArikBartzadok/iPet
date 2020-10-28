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
  <title>iPet | Busca</title>

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
    <?php
    //Setando a variável de busca
    //1 -> posts/pets
    //2 -> ongs
    //3 -> users
    $_SESSION['filter'] = (isset($_GET['filter']))? $_GET['filter'] : 1;
    $filter = $_SESSION['filter'];
    
    ?>    
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
                  <li class="breadcrumb-item active" aria-current="page">Busca</li>
                </ol>
              </nav>
            </div>
            <div class="d-flex justify-content-between text-right">
              <div class="col-lg-2 text-right">
                <i class="fas fa-filter" style="color: #fff"></i>
              </div>
              <div class="col-lg-2 text-right">
                    <a href="share.php?filter=1" class="btn btn-sm btn-neutral">Pets</a>              
                  </div>

                  <div class="col-lg-2 text-right">
                    <a href="share.php?filter=2" class="btn btn-sm btn-neutral">ONGs</a>              
                  </div>

                  <div class="col-lg-2 text-right">
                    <a href="share.php?filter=3" class="btn btn-sm btn-neutral">Users</a>              
                  </div>  
            </div>
          </div>                 
          <div class="row">          
            <div class="col">
              <h1 class="display-2 text-white">Resultados encontrados</h1>
              <p class="text-white mt-0 mb-5">Aqui estão listados todos os resultados referentes a sua pesquisa.</p>
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
                  <h3 class="mb-0">Filtrando por <?php
                    if($filter == 1){
                      echo "Pets";
                    }elseif ($filter==2) {   
                      echo "ONGs";
                    }else{
                      echo "Users";
                    }
                  ?></h3>
                </div>
              </div>
            </div>
            <div class="card-body">                    
                <?php
                  //Número de resultados a serem exibidos por vez
                  $num_page_itens = 10;

                  //pegando a página atual                  
                  $page = (isset($_GET['page']))? $_GET['page'] : 1;

                  $id = $_SESSION['user_id'];

                  //valor do campo digitado na barra de pesquisa
                  //$value = filter_input(INPUT_POST, "share");
                  $_SESSION['share'] = filter_input(INPUT_POST, "share");

                  //Fazendo as buscas de acordo com o filter
                  if($filter == 1){

                    $value =  $_SESSION['share'];

                    //Fazendo uma busca pela quantidade de posts deste usuário                                     
                    $sql_num_pets = "SELECT * FROM post WHERE text LIKE '%$value%'";
                    $res_num_pets = mysqli_query($con, $sql_num_pets);

                    //Parâmetro inicial do filtro SQL LIMIT
                    $init = ($num_page_itens*$page)-$num_page_itens;
                  
                    //Executando query para seleção de todos os pets
                    $sql_pet = "SELECT * FROM post WHERE text LIKE '%$value%' ORDER BY type DESC LIMIT $init, $num_page_itens";
                    $res_pet = mysqli_query($con, $sql_pet);
            
            		    //Transforma o $resultado em um array
                    $array_pet = mysqli_fetch_assoc($res_pet); 
                  
                    //Quantidade de linhas afetadas                                               
                    $quanty_pets = mysqli_num_rows($res_num_pets);   

                    //Definindo a quantidade de páginas e arredondando para o inteiro mais próximo, com a função ceils
                    $num_pages = ceil($quanty_pets/$num_page_itens);

                    //Total de páginas -> $num_pages;                  
                    //Total de registros -> $quanty_pets;

                    //Definindo a imagem de perfil deste usuário
                    //$profile_image =  $_SESSION['profile_image'];
                  }elseif ($filter==2) {   
                    $value =  $_SESSION['share'];
                    //Fazendo uma busca pela quantidade de ongs
                    $sql_num_ongs = "SELECT * FROM user WHERE name LIKE '%$value%' AND ranking = 2 AND status = 1";
                    $res_num_ongs = mysqli_query($con, $sql_num_ongs);

                    //Parâmetro inicial do filtro SQL LIMIT
                    $init = ($num_page_itens*$page)-$num_page_itens;
                  
                    //Executando query para seleção de todos os ongs
                    $sql_ong = "SELECT * FROM user WHERE name LIKE '%$value%' AND ranking = 2 AND status = 1 ORDER BY id_user ASC LIMIT $init, $num_page_itens";
                    $res_ong = mysqli_query($con, $sql_ong);
            
            		    //Transforma o $resultado em um array
                    $array_ong = mysqli_fetch_assoc($res_ong); 
                  
                    //Quantidade de linhas afetadas                                               
                    $quanty_ongs = mysqli_num_rows($res_num_ongs);   

                    //Definindo a quantidade de páginas e arredondando para o inteiro mais próximo, com a função ceils
                    $num_pages = ceil($quanty_ongs/$num_page_itens);

                    //Total de páginas -> $num_pages;                  
                    //Total de registros -> $quanty_ongs;                                                      
                  }else{
                    $value =  $_SESSION['share'];
                    //Fazendo uma busca pela quantidade de users
                    $sql_num_users = "SELECT * FROM user WHERE name LIKE '%$value%' AND ranking = 1 AND status = 1";
                    $res_num_users = mysqli_query($con, $sql_num_users);

                    //Parâmetro inicial do filtro SQL LIMIT
                    $init = ($num_page_itens*$page)-$num_page_itens;
                  
                    //Executando query para seleção de todos os users
                    $sql_user = "SELECT * FROM user WHERE name LIKE '%$value%'  AND ranking = 1 AND status = 1 ORDER BY id_user DESC LIMIT $init, $num_page_itens";
                    $res_user = mysqli_query($con, $sql_user);
            
            		    //Transforma o $resultado em um array
                    $array_user = mysqli_fetch_assoc($res_user); 
                  
                    //Quantidade de linhas afetadas                                               
                    $quanty_users = mysqli_num_rows($res_num_users);   

                    //Definindo a quantidade de páginas e arredondando para o inteiro mais próximo, com a função ceils
                    $num_pages = ceil($quanty_users/$num_page_itens);

                    //Total de páginas -> $num_pages;                  
                    //Total de registros -> $quanty_users;
                  }             
                ?>
                <?php
                if($filter == 1):
                ?>
              <!-- Content table-->
              <div class="table-responsive">
                <div>                                    
                  <table class="table align-items-center">
                    <thead class="thead-light">
                      <tr>
                        <th scope="col" class="sort" data-sort="name">Título</th>
                        <th scope="col" class="sort" data-sort="budget">Ajudar</th>
                        <th scope="col" class="sort" data-sort="status">Descrição</th>                        
                        <th scope="col" class="sort" data-sort="completion">Author</th>
                        <th scope="col">Data</th>
                        <!-- <th scope="col"></th> -->
                      </tr>
                    </thead>
                    <tbody class="list">  
                    <?php                    
                    //Verifica se existem registros:
                    if($quanty_pets):
                    //Início do loop
                    do{                      
                    ?>              
                    <tr>
                      <th scope="row">
                        <div class="media align-items-center">
                          <div class="avatar-group">
                            <a href="#" class="avatar avatar-sm" data-toggle="tooltip" data-original-title="<?= $array_pet['title']; ?>">
                              <img alt="Image placeholder" src="<?= PUBLICO . 'img/posts/' . $array_pet['image']; ?>">
                            </a>                      
                          </div>    
                          <div class="media-body">
                            <span class="name mb-0 text-sm"><?= $array_pet['title']; ?></span>
                          </div>
                        </div>
                      </th>
                      <td class="budget">
                      <button type="button" data-toggle="modal" class="btn btn-sm btn-<?php
                  if($array_pet['type'] == 3){
                    echo "danger";
                  } elseif ($array_pet['type'] == 2) {
                    echo "warning";
                  } else{
                    echo "primary";
                  }
                ?>  mr-4" data-target="<?php 
                if($array_pet['type'] == 3){
                  echo "#modal-notification-danger" . $array_pet['id_post'];
                } elseif ($array_pet['type'] == 2) {
                  echo "#modal-notification-warning" . $array_pet['id_post'];
                } else{
                  echo "#modal-notification-primary" . $array_pet['id_post'];
                }
              ?>
                ">
                <?php
                  if($array_pet['type'] == 3){
                    echo "Urgente";
                  } elseif ($array_pet['type'] == 2) {
                    echo "Aviso";
                  } else{
                    echo "Normal";
                  }
                ?>
                </button>
                      </td>
                      <td>                      
                      <?php                                    
                  //Limitanto a exibição do texto por tamanho
                  $string = strip_tags($array_pet['text']);
                  if (strlen($string) >25) {
                  
                      // truncate string
                      $stringCut = substr($string, 0, 25);
                      $endPoint = strrpos($stringCut, ' ');
                  
                      //se a string não contiver nenhum espaço, ela será cortada sem base de palavra.
                      $string = $endPoint? substr($stringCut, 0, $endPoint) : substr($stringCut, 0);
                      $string .= '...';
                  }
                  echo $string;
                  ?>
                      </td>
                      <td>                        
                      <?= $array_pet['author']; ?>
                      </td>
                      <td>
                        <span class="badge badge-dot mr-4">
                          <i class="bg-info"></i>
                          <?php $date = date_create($array_pet['created_at']); ?>
                          <span class="status"><?= date_format($date, 'd/m') . " às " . date_format($date, 'H:i'); ?></span>
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
                    <!-- Start notification Danger -->             
        <div class="modal fade" id="modal-notification-danger<?= $array_pet['id_post']; ?>" tabindex="-1" role="dialog" aria-labelledby="modal-notification" aria-hidden="true">
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
                  <h4 class="heading mt-4">Ele está em <?= $array_pet['city_author'] . ", " . $array_pet['uf'];?>!</h4>
                  <p><?= $array_pet['text'];?></p>
                </div>
                
              </div>
            
              <div class="modal-footer">
                <a class="btn btn-neutral btn-icon" href="https://api.whatsapp.com/send?phone=55<?= $array_pet['telephone']; ?>&amp;text=Urgente%20iPet%20-%20Ol%C3%A1,%20eu%20gostaria%20de%20contatar%20vocês,%20Pet%20-%20<?= $array_pet['id_post']?>" target="_blank">
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
        <div class="modal fade" id="modal-notification-warning<?= $array_pet['id_post']; ?>" tabindex="-1" role="dialog" aria-labelledby="modal-notification" aria-hidden="true">
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
                  <h4 class="heading mt-4">Ele está em <?= $array_pet['city_author'] . ", " . $array_pet['uf'];?>!</h4>
                  <p><?= $array_pet['text'];?></p>
                </div>
                
              </div>
            
              <div class="modal-footer">
                <a class="btn btn-neutral btn-icon" href="https://api.whatsapp.com/send?phone=55<?= $array_pet['telephone']; ?>&amp;text=iPet%20-%20Ol%C3%A1,%20eu%20gostaria%20de%20contatar%20vocês,%20Pet%20-%20<?= $array_pet['id_post']?>" target="_blank">
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
        <div class="modal fade" id="modal-notification-primary<?= $array_pet['id_post']; ?>" tabindex="-1" role="dialog" aria-labelledby="modal-notification" aria-hidden="true">
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
                  <h4 class="heading mt-4">Ele está em <?= $array_pet['city_author'] . ", " . $array_pet['uf'];?>!</h4>
                  <p><?= $array_pet['text'];?></p>
                </div>
                
              </div>
            
              <div class="modal-footer">
                <a class="btn btn-neutral btn-icon" href="https://api.whatsapp.com/send?phone=55<?= $array_pet['telephone']; ?>&amp;text=iPet%20-%20Ol%C3%A1,%20eu%20gostaria%20de%20contatar%20vocês,%20Pet%20-%20<?= $array_pet['id_post']?>" target="_blank">
                  <span class="btn-inner--icon"><img src="<?= PUBLICO; ?>img/icons/common/whats.png"></span>
                  <span class="btn-inner--text">Ajudar</span>
                </a>                
                <button type="button" class="btn btn-link text-white ml-auto" data-dismiss="modal">Fechar</button>
              </div>            
            </div>
          </div>         
        </div>

        <!-- End notification -->
                    <?php

                    
                    //fim do loop
                    } while($array_pet = mysqli_fetch_assoc($res_pet));                    
                    ?>              
                    </tbody>
                  </table>
                </div>    
              </div>
              <nav aria-label="...">
                    <ul class="pagination">
                      <li class="page-item">
                        <a class="page-link" href="share.php?filter=1&page=<?php if($page==1){ echo 1;}else{echo $page-1;};?>" tabindex="-1">
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
                      <li class="page-item <?= $current; ?>"><a class="page-link" href="share.php?filter=1&page=<?= $i; ?>"><?= $i; ?></a></li>
                      <?php }?>
                      <li class="page-item">
                        <a class="page-link" href="share.php?filter=1&page=<?php if($page<$num_pages){ echo $page+1;}else{echo $page;};?>">
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
                <span class="alert-text"><strong>Oops...</strong> não foram encontrados registros...</span>
              </div>
              
            </div>
          </div>
        </div>
      </div>

      </div>


      <?php endif; ?>
      <?php endif; ?>

      <?php
                if($filter == 2):
                ?>
              <!-- Content table-->
              <div class="table-responsive">
                <div>                                    
                  <table class="table align-items-center">
                    <thead class="thead-light">
                      <tr>
                        <th scope="col" class="sort" data-sort="name">Nome</th>
                        <th scope="col" class="sort" data-sort="budget">Classe</th>
                        <th scope="col" class="sort" data-sort="status">Contatar</th>                        
                        <th scope="col" class="sort" data-sort="completion">Bio</th>
                        <th scope="col">Cidade - UF</th>
                        <!-- <th scope="col"></th> -->
                      </tr>
                    </thead>
                    <tbody class="list">  
                    <?php                    
                    //Verifica se existem registros:
                    if($quanty_ongs):
                    //Início do loop
                    do{                      
                    ?>              
                    <tr>
                      <th scope="row">
                        <div class="media align-items-center">
                          <div class="avatar-group">
                            <a href="#" class="avatar avatar-sm rounded-circle" data-toggle="tooltip" data-original-title="<?= $array_ong['name']; ?>">
                              <img alt="Image placeholder" src="<?= PUBLICO . 'img/users/' . $array_ong['image']; ?>">
                            </a>                      
                          </div>    
                          <div class="media-body">
                            <span class="name mb-0 text-sm"><?= $array_ong['name']; ?></span>
                          </div>
                        </div>
                      </th>
                      <td class="budget">
                      ONG
                      </td>
                      <td>
                        <a class="btn btn-neutral btn-icon" href="https://api.whatsapp.com/send?phone=55<?= $array_ong['telephone']; ?>&amp;text=iPet%20-%20Ol%C3%A1,%20eu%20gostaria%20de%20contatar%20vocês" class="btn btn-neutral btn-icon" target="_blank">
                          <span class="btn-inner--icon"><img src="<?= PUBLICO . 'img/icons/common/whats.png'; ?>"></span>
                        </a>                    
                        <a href="mailto:<?= $array_ong['email'];?>" class="btn btn-neutral btn-icon">
                          <span class="btn-inner--icon"><img src="<?= PUBLICO . 'img/icons/common/gmail.png'; ?>"></span>
                        </a>                    
                      </td>
                      <td>                                              
                      <?php                                    
                  //Limitanto a exibição do texto por tamanho
                  $string = strip_tags($array_ong['bio']);
                  if (strlen($string) > 25) {
                  
                      // truncate string
                      $stringCut = substr($string, 0, 25);
                      $endPoint = strrpos($stringCut, ' ');
                  
                      //se a string não contiver nenhum espaço, ela será cortada sem base de palavra.
                      $string = $endPoint? substr($stringCut, 0, $endPoint) : substr($stringCut, 0);
                      $string .= '...';
                  }
                  echo $string;
                  ?>
                      </td>
                      <td>
                        <span class="badge badge-dot mr-4">                        
                          <i class="bg-info"></i>
                          <span class="status"><?= $array_ong['city'] . ", " . $array_ong['uf'];?></span>
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
                    } while($array_ong = mysqli_fetch_assoc($res_ong));                    
                    ?>              
                    </tbody>
                  </table>
                </div>    
              </div>
              <nav aria-label="...">
                    <ul class="pagination">
                      <li class="page-item">
                        <a class="page-link" href="share.php?filter=2&page=<?php if($page==1){ echo 1;}else{echo $page-1;};?>" tabindex="-1">
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
                      <li class="page-item <?= $current; ?>"><a class="page-link" href="share.php?filter=2&page=<?= $i; ?>"><?= $i; ?></a></li>
                      <?php }?>
                      <li class="page-item">
                        <a class="page-link" href="share.php?filter=2&page=<?php if($page<$num_pages){ echo $page+1;}else{echo $page;};?>">
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
                <span class="alert-text"><strong>Oops...</strong> não foram encontrados registros...</span>
              </div>
              
            </div>
          </div>
        </div>
      </div>

      </div>

      <?php endif; ?>
      <?php endif; ?>

      <?php
                if($filter == 3):
                ?>
              <!-- Content table-->
              <div class="table-responsive">
                <div>                                    
                  <table class="table align-items-center">
                    <thead class="thead-light">
                      <tr>
                        <th scope="col" class="sort" data-sort="name">Nome</th>
                        <th scope="col" class="sort" data-sort="budget">Classe</th>
                        <th scope="col" class="sort" data-sort="status">Contatar</th>                        
                        <th scope="col" class="sort" data-sort="completion">Bio</th>
                        <th scope="col">Cidade - UF</th>
                        <!-- <th scope="col"></th> -->
                      </tr>
                    </thead>
                    <tbody class="list">  
                    <?php                    
                    //Verifica se existem registros:
                    if($quanty_users):
                    //Início do loop
                    do{                      
                    ?>              
                    <tr>
                      <th scope="row">
                        <div class="media align-items-center">
                          <div class="avatar-group">
                            <a href="#" class="avatar avatar-sm rounded-circle" data-toggle="tooltip" data-original-title="<?= $array_user['name']; ?>">
                              <img alt="Image placeholder" src="<?= PUBLICO . 'img/users/' . $array_user['image']; ?>">
                            </a>                      
                          </div>    
                          <div class="media-body">
                            <span class="name mb-0 text-sm"><?= $array_user['name']; ?></span>
                          </div>
                        </div>
                      </th>
                      <td class="budget">
                      Usuário
                      </td>
                      <td>
                        <a class="btn btn-neutral btn-icon" href="https://api.whatsapp.com/send?phone=55<?= $array_user['telephone']; ?>&amp;text=iPet%20-%20Ol%C3%A1,%20eu%20gostaria%20de%20contatar%20vocês" class="btn btn-neutral btn-icon" target="_blank">
                          <span class="btn-inner--icon"><img src="<?= PUBLICO . 'img/icons/common/whats.png'; ?>"></span>
                        </a>                    
                        <a href="mailto:<?= $array_user['email'];?>" class="btn btn-neutral btn-icon">
                          <span class="btn-inner--icon"><img src="<?= PUBLICO . 'img/icons/common/gmail.png'; ?>"></span>
                        </a>                    
                      </td>
                      <td>                                              
                      <?php                                    
                  //Limitanto a exibição do texto por tamanho
                  $string = strip_tags($array_user['bio']);
                  if (strlen($string) > 25) {
                  
                      // truncate string
                      $stringCut = substr($string, 0, 25);
                      $endPoint = strrpos($stringCut, ' ');
                  
                      //se a string não contiver nenhum espaço, ela será cortada sem base de palavra.
                      $string = $endPoint? substr($stringCut, 0, $endPoint) : substr($stringCut, 0);
                      $string .= '...';
                  }
                  echo $string;
                  ?>
                      </td>
                      <td>
                        <span class="badge badge-dot mr-4">                        
                          <i class="bg-info"></i>
                          <span class="status"><?= $array_user['city'] . ", " . $array_user['uf'];?></span>
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
                    } while($array_user = mysqli_fetch_assoc($res_user));                    
                    ?>              
                    </tbody>
                  </table>
                </div>    
              </div>
              <nav aria-label="...">
                    <ul class="pagination">
                      <li class="page-item">
                        <a class="page-link" href="share.php?filter=3&page=<?php if($page==1){ echo 1;}else{echo $page-1;};?>" tabindex="-1">
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
                      <li class="page-item <?= $current; ?>"><a class="page-link" href="share.php?filter=3&page=<?= $i; ?>"><?= $i; ?></a></li>
                      <?php }?>
                      <li class="page-item">
                        <a class="page-link" href="share.php?filter=3&page=<?php if($page<$num_pages){ echo $page+1;}else{echo $page;};?>">
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
                <span class="alert-text"><strong>Oops...</strong> não foram encontrados registros...</span>
              </div>
              
            </div>
          </div>
        </div>
      </div>

      </div>

      <?php endif; ?>
      <?php endif; ?>

      <?php
        if($filter > 3 || $filter < 1):
      ?>
              <!-- Content Error Query -->

      <div class="row">      
        <div class="col-xl-12 order-xl-1">
          <div class="card">
            <div class="card-body">              
        
              <div class="alert alert-danger" role="alert">
                <span class="alert-icon"><i class="ni ni-notification-70"></i></span>
                <span class="alert-text"><strong>Oops...</strong> os filtros não foram aplicados na consulta ao banco de dados...</span>
              </div>
              
            </div>
          </div>
        </div>
      </div>

      </div>
              

      <?php endif; ?>      
      

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

<?php 
include_once('../../controller/config.php');
include_once('../../controller/connect.php');
include_once('../../controller/session.php');

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
  <title>iPet | ONGs</title>

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
                  <li class="breadcrumb-item active" aria-current="page">Gerenciar ONGs</li>
                </ol>
              </nav>
            </div>
            <div class="d-flex justify-content-between text-right">
              <div class="col-lg-2 text-right">
                <!-- <i class="fas fa-filter" style="color: #fff"></i> -->
              </div> 
            </div>
          </div>                 
          <div class="row">          
            <div class="col">
              <h1 class="display-2 text-white">Gerenciar ONGs</h1>              
              <p class="text-white mt-0 mb-5">Aqui estão listados todos os resultados referentes às ONGs cadastradas no sistema iPet.</p>
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
                  <h3 class="mb-0">Filtrando por ONGs</h3>
                </div>
                <div class="col-4 text-right">
                  <!--<button class="btn btn-icon btn-primary" type="button" data-toggle="modal" data-target="#modal-filter">
	                  <span class="btn-inner--icon"><i class="fas fa-filter"></i></span>
                  </button>-->
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

                  //Fazendo uma busca pela quantidade de posts deste usuário                                     
                  $sql_num_users = "SELECT * FROM user WHERE ranking = 2";
                  $res_num_users = mysqli_query($con, $sql_num_users);

                  //Parâmetro inicial do filtro SQL LIMIT
                  $init = ($num_page_itens*$page)-$num_page_itens;
                
                  //Executando query para seleção de todos os users
                  $sql_user = "SELECT * FROM user WHERE ranking = 2 ORDER BY name ASC LIMIT $init, $num_page_itens";
                  $res_user = mysqli_query($con, $sql_user);
          
          		    //Transforma o $resultado em um array
                  $array_user = mysqli_fetch_assoc($res_user); 
                
                  //Quantidade de linhas afetadas                                               
                  $quanty_users = mysqli_num_rows($res_num_users);   

                  //Definindo a quantidade de páginas e arredondando para o inteiro mais próximo, com a função ceils
                  $num_pages = ceil($quanty_users/$num_page_itens);
                  //Total de páginas -> $num_pages;                 
                  //Total de registros -> $quanty_users;
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
                        <th scope="col" class="sort" data-sort="completion">CPF/CNPJ</th>
                        <th scope="col">E-mail</th>
                        <th scope="col">Cidade - UF</th>
                        <th scope="col"></th>
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
                            <span class="name mb-0 text-sm <?php
                            if($array_user['status'] == 0){
                              echo "text-danger";
                            }                            
                            ?>"><?= $array_user['name']; ?></span>
                          </div>
                        </div>
                      </th>
                      <td class="budget">
                      ONG
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
                      <?= $array_user['cpf'];?>
                      </td>
                      <td>
                        <span class="badge badge-dot mr-4">                        
                          <i class="<?php
                            if($array_user['status'] == 0){
                              echo "bg-danger";
                            }else{
                              echo "bg-success";
                            }                      
                            ?>"></i>
                          <span class="status"><?= $array_user['email']; ?></span>
                        </span>
                      </td>
                      <td>
                        <span class="badge badge-dot mr-4">                        
                          <i class="<?php
                            if($array_user['status'] == 0){
                              echo "bg-danger";
                            }else{
                              echo "bg-success";
                            }                      
                            ?>"></i>
                          <span class="status"><?= $array_user['city'] . ", " . $array_user['uf'];?></span>
                        </span>
                      </td>
                      <td class="text-right">
                        <div class="dropdown">
                          <a class="btn btn-sm btn-icon-only" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-ellipsis-v"></i>
                          </a>
                          <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                          <?php
                          $filter_user = $array_user['id_user'];

                          if($array_user['status'] == 0){
                            echo "<a class='dropdown-item' href='" . BASE . "_site/_adm/delete/enable_ong.php?id=" . $filter_user . "'>Ativar</a>";
                          }else{
                            echo "<a class='dropdown-item' href='" . BASE . "_site/_adm/delete/disable_ong.php?id=" . $filter_user ."'>Desativar</a>";                            
                          }                                                                                                        
                          
                          ?>                            
                          </div>
                        </div>
                      </td>
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
                        <a class="page-link" href="edit_ongs.php?page=<?php if($page==1){ echo 1;}else{echo $page-1;};?>" tabindex="-1">
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
                      <li class="page-item <?= $current; ?>"><a class="page-link" href="edit_ongs.php?page=<?= $i; ?>"><?= $i; ?></a></li>
                      <?php }?>
                      <li class="page-item">
                        <a class="page-link" href="edit_ongs.php?page=<?php if($page<$num_pages){ echo $page+1;}else{echo $page;};?>">
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
      
          </div>
        </div>
      </div>
      <!-- End Content table -->

      <!-- Satrt Modal filter -->                 
        <div class="modal fade" id="modal-filter" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
          <div class="modal-dialog modal- modal-dialog-centered modal-sm" role="document">
            <div class="modal-content">        	
              <div class="modal-body p-0">
                <div class="card bg-secondary border-0 mb-0">                 
                  <div class="card-body px-lg-5 py-lg-5">   
                    <div class="text-muted text-center mt-2 mb-3">Filtrar</div>    
                    <div class="text-center text-muted mb-4">
                      <small><span class="text-danger font-weight-700">* </span>Aplique os filtros abaixo</small>
                    </div>                    
                    <form method="POST" action="edit_users.php" role="form">
                      <div class="form-group mb-3">
                        <div class="input-group input-group-merge input-group-alternative">
                          <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-search"></i></span>
                          </div>
                          <input name="text" class="form-control" placeholder="Pesquisar" type="text">
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="row my-4">
                          <div class="col-6">
                            <div class="text-muted font-italic"><small>Buscar:</small></div>
                            <div class="input-group-prepend">
                              <base-input label="Example multiple select">
                                <select name="ranking" class="form-control" required>
                                  <option value="1" selected>Users</option>
                                  <option value="2">ONGs</option>       
                                  <option value="3">ADMs</option>       
                                  <option value="4">Todos</option>                                      
                                </select>
                              </base-input>
                            </div>
                          </div>

                          <div class="col-6">
                            <div class="text-muted font-italic"><small>Campo: </small></div>
                            <div class="input-group-prepend">
                              <base-input label="Example multiple select">
                                <select name="column" class="form-control" required>
                                  <option value="id_user">ID</option>
                                  <option value="name" selected>Nome</option>       
                                  <option value="email">E-mail</option>    
                                  <option value="cpf">CPF</option>    
                                  <option value="bio">Bio</option>    
                                  <option value="status">Status</option>  
                                </select>
                              </base-input>
                            </div>
                          </div>

                        </div>

                        <div class="row my-4">

                        </div>
                      </div>            
                      <div class="text-center">
                        <button type="button" class="btn btn-link ml-auto" data-dismiss="modal">Fechar</button>
                        <button type="submit" class="btn btn-primary my-4">Aplicar</button>
                      </div>
                      </form>      
                </div>
              </div>                
            </div>            
          </div>
        </div>
      </div>        
      <!-- End Modal filter-->

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

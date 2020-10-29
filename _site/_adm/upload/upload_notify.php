<?php 
include_once('../../controller/config.php');
include_once('../../controller/connect.php');
include_once('../../controller/session.php');

if($_SESSION['rank'] != 3) {
	header('location:' . BASE);
}

//Fazendo uma busca por todos os dados do usuário
$id = $_SESSION['user_id'];
$sql = "SELECT * FROM user WHERE id_user = '$id'";
$res = mysqli_query($con, $sql);
$array = mysqli_fetch_assoc($res); 
/*
id_post
name_user
image_user
telephone_user
type
title
text
created_at
origin
*/
do{  
  $name = $array['name'];
  $email = $array['email'];
  $cpf = $array['cpf'];
  $telephone = $array['telephone'];
  $instagram = $array['instagram'];
  $city = $array['city'];
  $uf = $array['uf'];
  $image = $array['image'];
} while($array = mysqli_fetch_assoc($res));

?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="desc">
  <meta name="author" content="iPet">
  <title>iPet | Notify</title>

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
                  <li class="breadcrumb-item"><a href="<?= BASE . '_site/_adm/home.php'; ?>"><i class="fas fa-home"></i></a></li>                  
                  <li class="breadcrumb-item"><a href="<?= BASE . '_site/_adm/home.php'; ?>">Home</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Criar notificação</li>
                </ol>
              </nav>
            </div>
            <div class="col-lg-6 col-5 text-right">
                            
            </div>
          </div>          
          <div class="row">
            <div class="col">
            <h1 class="display-2 text-white">Notificação</h1>
            <p class="text-white mt-0 mb-5">Realize a postagem de uma notificação, informe os usuários do iPet!</p>
            </div>
          </div>
        </div>
      </div>
    </div>      
    <!-- End Header -->
    
    <!-- Page content -->
    <div class="container-fluid mt--6">
      
      <!-- Content rows and cols -->
      <div class="row">
        <div class="col-xl-4 order-xl-2">
          <div class="card card-profile">            
            <div class="card-header text-center border-0 pt-8 pt-md-4 pb-0 pb-md-4">
              
            </div>
            <div class="card-body pt-0">              
              <div class="text-center">
                <h5 class="h3">
                  <?= $_SESSION['name']; ?>
                </h5>
                <div class="h5 font-weight-300">
                  <i class="ni location_pin mr-2"></i><?= $city . ", " . $uf; ?>
                </div>
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
                  ?>
                </div>
              </div>
              <div class="row">
                <div class="col">
                  <div class="card-profile-stats d-flex justify-content-center">
                    <div>
                      <span class="heading"><?= $count_adm_not; ?></span>
                      <span class="description">Notificações realizadas</span>
                    </div>                    
                  </div>
                </div>
              </div>
            </div>
          </div>          
        </div>
        <div class="col-xl-8 order-xl-1">
          <div class="card">
            <div class="card-header">
              <div class="row align-items-center">
                <div class="col-8">
                  <h3 class="mb-0">Escrever notificação</h3>
                </div>
              </div>
            </div>
            <div class="card-body">
              <form role="form" method="POST" action="<?= BASE . '_site/_adm/upload/valid_upload_notify.php';?>">
                <!-- Description -->
                <h6 class="heading-small text-muted mb-4">Notificação</h6>                
                <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-lg-3">
                      <div class="form-group">
                        <label for="exampleFormControlSelect1">Tipo</label>
                        <select name="type" class="form-control" id="exampleFormControlSelect1">
                          <option value="4">Sucesso</option>
                          <option value="3" selected>Urgente</option>                               
                          <option value="2">Aviso</option>                               
                          <option value="1">Normal</option>                               
                        </select>
                      </div>
                    </div>
                    <div class="col-lg-9">
                      <div class="form-group">
                        <label class="form-control-label" for="input-city">Títlo</label>
                        <input name="title" type="text" id="input-title" class="form-control" placeholder="Título da postagem" value="" required>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="form-control-label">Texto</label>
                    <textarea name="text" rows="6" class="form-control" placeholder="Breve texto de sua postagem..." required></textarea>
                  </div>
                </div>
                <hr class="my-4" />
                <h6 class="heading-small text-muted mb-4">Dados de usuário</h6>
                <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-username">Nome</label>
                        <input name="name" type="text" id="input-username" class="form-control" placeholder="Nome" value="<?= $name; ?>" required>
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-email">Email</label>
                        <input name="email" type="email" id="input-email" class="form-control" placeholder="Email" value="<?= $email; ?>" required>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-3">
                      <div class="form-group">
                        <label class="form-control-label" for="input-phone">Telefone</label>
                        <input name="tel" type="text" id="input-phone" class="form-control" placeholder="Telefone" value="<?= $telephone; ?>" data-mask="(00) 0000-0000" data-mask-selectonfocus="true" required>
                      </div>
                    </div>
                    <div class="col-lg-2">
                      <div class="form-group">
                        <label for="exampleFormControlSelect1">Imagem</label>
                        <select name="perfil" class="form-control" id="exampleFormControlSelect1" readonly="readonly">
                          <option value="<?= $image; ?>" selected>Profile image</option>                               
                        </select>
                      </div>
                    </div>
                    <div class="col-lg-3">
                      <div class="form-group">
                        <label class="form-control-label" for="input-document">CPF/CNPJ</label>
                        <input name="document" type="text" id="input-document" class="form-control" placeholder="CPF ou CNPJ" value="<?= $cpf; ?>" required>
                      </div>
                    </div>
                    <div class="col-lg-2">
                      <div class="form-group">
                        <label class="form-control-label" for="input-ranking">Classificação</label>
                        <input name="ranking" type="text" id="input-ranking" class="form-control" placeholder="Classificação" value="<?= $_SESSION['rank'];?>" readonly="readonly">
                      </div>
                    </div>
                    <div class="col-lg-2">
                      <div class="form-group">
                        <label class="form-control-label" for="input-id">ID</label>
                        <input name="user_id" type="text" id="input-id" class="form-control" placeholder="ID" value="<?= $_SESSION['user_id'];?>" readonly="readonly">
                      </div>
                    </div>
                  </div>
                </div>
                <hr class="my-4" />                
                <div class="text-center">
                  <button type="submit" class="btn btn-info my-4">Publicar</button>
                </div>
              </form>
            </div>
          </div>
        </div>
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

<?php 
include_once('../../controller/config.php');
include_once('../../controller/connect.php');
include_once('../../controller/session.php');

if($_SESSION['rank'] != 2) {
	header('location:' . BASE);
}

//Fazendo uma busca por todos os dados do usuário
$id = $_SESSION['user_id'];
$sql = "SELECT * FROM user WHERE id_user = '$id'";
$res = mysqli_query($con, $sql);
$array = mysqli_fetch_assoc($res); 

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

//Fazendo uma busca pela quantidade de posts do usuário
$sql_count_post = "SELECT * FROM post WHERE id_author = '$id'";
$res_count_post = mysqli_query($con, $sql_count_post);
$count_post = mysqli_num_rows($res_count_post); 
?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="desc">
  <meta name="author" content="iPet">
  <title>iPet | Post</title>

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
                  <li class="breadcrumb-item active" aria-current="page">Post's</li>
                </ol>
              </nav>
            </div>
            <div class="col-lg-6 col-5 text-right">
                            
            </div>
          </div>          
          <div class="row">
            <div class="col">
            <h1 class="display-2 text-white">Postagem</h1>
            <p class="text-white mt-0 mb-5">Realize uma postagem, ajude um pet!</p>
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
              <div class="d-flex justify-content-between">    
                <a href="../list/list_posts.php">            
                  <button class="btn btn-icon btn-primary" type="button">
	                  <span class="btn-inner--icon"><i class="ni ni-settings-gear-65"></i></span>
                  </button>
                </a>
              </div>
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
                      <span class="heading"><?= $count_post; ?></span>
                      <span class="description">Postagens realizadas</span>
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
                  <h3 class="mb-0">Escrever postagem</h3>
                </div>
              </div>
            </div>
            <div class="card-body">
              <form role="form" method="POST" action="<?= BASE . '_site/_ong/upload/valid_upload_post.php';?>">
                <!-- Description -->
                <h6 class="heading-small text-muted mb-4">Postagem</h6>                
                <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label for="exampleFormControlSelect1">Tipo</label>
                        <select name="type" class="form-control" id="exampleFormControlSelect1">
                          <option value="3" selected>Urgente</option>                               
                          <option value="2">Aviso</option>                               
                          <option value="1">Normal</option>                               
                        </select>
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-photo">Foto da postagem</label>
                        <div class="custom-file">
                          <input name="pic" type="file" class="custom-file-input" id="customFileLang" lang="pt-br">
                          <label class="custom-file-label" for="customFileLang"></label>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-12">
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
                    <div class="col-lg-4">
                      <div class="form-group">
                        <label class="form-control-label" for="input-document">CPF/CNPJ</label>
                        <input name="document" type="text" id="input-document" class="form-control" placeholder="CPF ou CNPJ" value="<?= $cpf; ?>" required>
                      </div>
                    </div>
                    <div class="col-lg-4">
                      <div class="form-group">
                        <label for="exampleFormControlSelect1">Imagem de perfil</label>
                        <select name="perfil" class="form-control" id="exampleFormControlSelect1" readonly="readonly">
                          <option value="<?= $image; ?>" selected>Profile image</option>                               
                        </select>
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
                <!-- Address -->
                <h6 class="heading-small text-muted mb-4">Informações de contato</h6>
                <div class="pl-lg-4">
                  <div class="row">
                    
                  </div>
                  <div class="row">                    
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-phone">Telefone</label>
                        <input name="tel" type="text" id="input-phone" class="form-control" placeholder="Telefone" value="<?= $telephone; ?>" data-mask="(00) 0000-0000" data-mask-selectonfocus="true" required>
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-instagram">Instagram</label>
                        <input name="insta" type="text" id="input-instagram" class="form-control" placeholder="@usuario" value="<?= $instagram; ?>">
                      </div>
                    </div>                    
                  </div>
                  <div class="row">                    
                    <div class="col-lg-8">
                      <div class="form-group">
                        <label class="form-control-label" for="input-city">Cidade</label>
                        <input name="city" type="text" id="input-city" class="form-control" placeholder="Cidade" value="<?= $city; ?>" required>
                      </div>
                    </div>
                    <div class="col-lg-4">
                      <div class="form-group">
                        <label class="form-control-label" for="input-uf">Estado</label>                        
                        <select name="uf" class="form-control" id="exampleFormControlSelect1">
                          <option value="<?= $uf; ?>" selected><?= $uf;?></option>                               
                          <option value="AC">AC</option>
                          <option value="AL">AL</option>
                          <option value="AP">AP</option>
                          <option value="AM">AM</option>
                          <option value="BA">BA</option>
                          <option value="CE">CE</option>
                          <option value="DF">DF</option>
                          <option value="ES">ES</option>
                          <option value="GO">GO</option>
                          <option value="MA">MA</option>
                          <option value="MT">MT</option>
                          <option value="MS">MS</option>
                          <option value="MG">MG</option>
                          <option value="PA">PA</option>
                          <option value="PB">PB</option>
                          <option value="PR">PR</option>
                          <option value="PE">PE</option>
                          <option value="PI">PI</option>
                          <option value="RJ">RJ</option>
                          <option value="RN">RN</option>
                          <option value="RS">RS</option>
                          <option value="RO">RO</option>
                          <option value="RR">RR</option>
                          <option value="SC">SC</option>
                          <option value="SP">SP</option>
                          <option value="SE">SE</option>
                          <option value="TO">TO</option>
                        </select>
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

<!--
=========================================================
* USER Profile
=========================================================

id_user
ranking
name
email
password
cpf
telephone
instagram
street
neighborhood
city
uf
bio
image
banner
use_terms
status (0 = inativo | 1 = ativo)

A fazer:
-
-
-
-->
<?php 
include_once('../controller/config.php');
include_once('../controller/connect.php');
include_once('../controller/session.php');

if($_SESSION['rank'] != 1) {
	header('location:' . BASE);
}

//Fazendo uma busca para ter certeza de que este e-mail está livre para o uso
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
  $street = $array['street'];
  $neighborhood = $array['neighborhood'];
  $city = $array['city'];
  $uf = $array['uf'];
  $bio = $array['bio'];
  $image = $array['image'];
  $banner = $array['banner'];
} while($array = mysqli_fetch_assoc($res));

?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="desc">
  <meta name="author" content="iPet">
  <title>iPet | Perfil</title>

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
    <div class="header bg-gradient-info pb-6">
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center py-4">
            <div class="col-lg-6 col-7">
              <h6 class="h2 text-white d-inline-block mb-0">iPet</h6>
              <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                  <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>                  
                  <li class="breadcrumb-item"><a href="home.php">Home</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Perfil</li>
                </ol>
              </nav>
            </div>
            <div class="col-lg-6 col-5 text-right">
                            
            </div>
          </div>          
          <div class="row">
            <div class="col">
            <h1 class="display-2 text-white">Olá <?= $_SESSION['name']; ?>!</h1>
            <p class="text-white mt-0 mb-5">Esta é sua página de perfil. Aqui você pode gerenciar todos os seus dados pessoais e públicos.</p>
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
            <img src="<?= PUBLICO . 'img/theme/' . $banner; ?>" alt="Imagem de perfil" class="card-img-top">
            <div class="row justify-content-center">
              <div class="col-lg-3 order-lg-2">
                <div class="card-profile-image">
                  <a href="#">
                    <img src="<?= PUBLICO . 'img/users/' . $image; ?>" class="rounded-circle">
                  </a>
                </div>
              </div>
            </div>
            <div class="card-header text-center border-0 pt-8 pt-md-4 pb-0 pb-md-4">
              <div class="d-flex justify-content-between">
                <button type="button" data-toggle="modal" class="btn btn-sm btn-info  mr-4" data-target="#modalContatar">Contatar</button>
                <button type="button" data-toggle="modal" class="btn btn-sm btn-default float-right" data-target="#modalEmail">Email</button>
              </div>
            </div>
            <div class="card-body pt-0">              
              <div class="text-center">
                <h5 class="h3">
                  <?= $_SESSION['name']; ?>
                </h5>
                <div class="h5 font-weight-300">
                  <i class="ni location_pin mr-2"></i><?= $city; ?>
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
                      <span class="heading">22</span>
                      <span class="description">Postagens</span>
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
                  <h3 class="mb-0">Editar perfil </h3>
                </div>
              </div>
            </div>
            <div class="card-body">
              <form role="form" method="POST" action="<?= BASE . '_site/_user/edit/edit_profile.php';?>">
                <h6 class="heading-small text-muted mb-4">Dados de usuário</h6>
                <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-username">Nome</label>
                        <input name="name" type="text" id="input-username" class="form-control" placeholder="Nome" value="<?= $name; ?>">
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-email">Email</label>
                        <input name="email" type="email" id="input-email" class="form-control" placeholder="Email" value="<?= $email; ?>">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-document">CPF/CNPJ</label>
                        <input name="document" type="text" id="input-document" class="form-control" placeholder="CPF ou CNPJ" value="<?= $cpf; ?>">
                      </div>
                    </div>
                    <div class="col-lg-3">
                      <div class="form-group">
                        <label class="form-control-label" for="input-ranking">Classificação</label>
                        <input name="rank" type="text" id="input-ranking" class="form-control" placeholder="Classificação" value="
                        <?php
                        if($_SESSION['rank'] == 1){
                          echo "Voluntário";
                        } elseif ($_SESSION['rank'] == 2) {
                          echo "ONG";
                        } elseif ($_SESSION['rank'] == 3) {
                          echo "ADM";
                        } else {
                          echo "Oops, ocorreu um erro...";
                        }
                        ?>
                        " disabled="disabled">
                      </div>
                    </div>
                    <div class="col-lg-3">
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
                        <input name="tel" type="text" id="input-phone" class="form-control" placeholder="Telefone" value="<?= $telephone; ?>" data-mask="(00) 0000-0000" data-mask-selectonfocus="true">
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
                    <div class="col-lg-12">
                      <div class="form-group">
                        <label class="form-control-label" for="input-street">Rua</label>
                        <input name="street" type="text" id="input-street" class="form-control" placeholder="Rua, 00" value="<?= $street; ?>">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-4">
                      <div class="form-group">
                        <label class="form-control-label" for="input-neighborhood">Bairro</label>
                        <input name="neig" type="text" id="input-neighborhood" class="form-control" placeholder="Bairro" value="<?= $neighborhood; ?>">
                      </div>
                    </div>
                    <div class="col-lg-4">
                      <div class="form-group">
                        <label class="form-control-label" for="input-city">Cidade</label>
                        <input name="city" type="text" id="input-city" class="form-control" placeholder="Cidade" value="<?= $city; ?>">
                      </div>
                    </div>
                    <div class="col-lg-4">
                      <div class="form-group">
                        <label class="form-control-label" for="input-uf">Estado</label>
                        <input name="uf" type="text" id="input-uf" class="form-control" placeholder="Estado" value="<?= $uf; ?>">
                      </div>
                    </div>                    
                  </div>
                </div>
                <hr class="my-4" />
                <!-- Description -->
                <h6 class="heading-small text-muted mb-4">Sobre mim</h6>                
                <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label for="exampleFormControlSelect1">Imagem de capa</label>
                        <select name="banner" class="form-control" id="exampleFormControlSelect1">
                          <option value="banner1.jpeg">Banner 1</option>
                          <option value="banner2.jpg">Banner 2</option>      
                          <option value="banner3.jpeg">Banner 3</option>      
                        </select>
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-photo">Foto de perfil</label>
                        <div class="custom-file">
                          <input name="pic" type="file" class="custom-file-input" id="customFileLang" lang="pt-br">
                          <label class="custom-file-label" for="customFileLang"></label>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="form-control-label">Biografia</label>
                    <textarea name="bio" rows="4" class="form-control" placeholder="Breve biografia ..."><?= $bio; ?></textarea>
                  </div>
                </div>
                <hr class="my-4" />
                <div class="text-center">
                  <button type="submit" class="btn btn-info my-4">Atualizar</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- Content rows and cols -->

      <!-- Modal Contatar -->
      <div class="modal fade" id="modalContatar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                <a href="https://api.whatsapp.com/send?phone=55<?= $telephone; ?>&amp;text=iPet%20-%20Ol%C3%A1,%20eu%20gostaria%20de%20contatar%20vocês" class="btn btn-neutral btn-icon">
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
      <div class="modal fade" id="modalEmail" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                <a href="mailto:<?= $_SESSION['email']?>" class="btn btn-neutral btn-icon">
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

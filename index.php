<!--
=========================================================
* Argon Dashboard - v1.2.0
=========================================================
* Product Page: https://www.creative-tim.com/product/argon-dashboard
* Doc. Page: https://demos.creative-tim.com/argon-dashboard/docs/getting-started/overview.html?_ga=2.27162932.841682585.1602192593-1881120461.1601918201


* Copyright  Creative Tim (http://www.creative-tim.com)
* Coded by www.creative-tim.com



=========================================================
* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
-->
<?php 
include_once('_site/controller/config.php');
include_once('_site/controller/connect.php');
session_name(md5('seg'.$_SERVER['REMOTE_ADDR'].$_SERVER['HTTP_USER_AGENT']));
session_start();
?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="desc">
  <meta name="author" content="iPet">
  <title>iPet</title>

  <!-- Styles -->
  <?php
    include_once "_site/assets/components/styles.php";
  ?>
  <!-- End Styles -->
</head>

<body  class="bg-secondary">
  <!-- Navbar -->
  <nav id="navbar-main" class="navbar navbar-horizontal navbar-transparent navbar-main navbar-expand-lg navbar-light">
    <div class="container">
      <a class="navbar-brand" href="#">
        <img src="<?= PUBLICO . 'img/brand/ipet-white.png';?>">
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-collapse" aria-controls="navbar-collapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="navbar-collapse navbar-custom-collapse collapse" id="navbar-collapse">
        <div class="navbar-collapse-header">
          <div class="row">
            <div class="col-6 collapse-brand">
              <a href="#">
                <img src="<?= PUBLICO . 'img/brand/ipet-blue.png';?>">
              </a>
            </div>
            <div class="col-6 collapse-close">
              <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbar-collapse" aria-controls="navbar-collapse" aria-expanded="false" aria-label="Toggle navigation">
                <span></span>
                <span></span>
              </button>
            </div>
          </div>
        </div>
        <ul class="navbar-nav mr-auto">
          <li class="nav-item">
            <a href="#" class="nav-link">
              <span class="nav-link-inner--text">Saiba +</span>
            </a>
          </li>
          <li class="nav-item">
            <a href="_site/auth/login.php" class="nav-link">
              <span class="nav-link-inner--text">Login</span>
            </a>
          </li>
          <li class="nav-item">
            <a href="_site/auth/signup.php" class="nav-link">
              <span class="nav-link-inner--text">Registrar</span>
            </a>
          </li>
        </ul>
        <hr class="d-lg-none" />
        <ul class="navbar-nav align-items-lg-center ml-lg-auto">
          <li class="nav-item">
            <a class="nav-link nav-link-icon" href="https://www.facebook.com/" target="_blank" data-toggle="tooltip" data-original-title="Like us on Facebook">
              <i class="fab fa-facebook-square"></i>
              <span class="nav-link-inner--text d-lg-none">Facebook</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link nav-link-icon" href="https://www.instagram.com/" target="_blank" data-toggle="tooltip" data-original-title="Follow us on Instagram">
              <i class="fab fa-instagram"></i>
              <span class="nav-link-inner--text d-lg-none">Instagram</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link nav-link-icon" href="https://twitter.com/" target="_blank" data-toggle="tooltip" data-original-title="Follow us on Twitter">
              <i class="fab fa-twitter-square"></i>
              <span class="nav-link-inner--text d-lg-none">Twitter</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link nav-link-icon" href="https://github.com/ArikBartzadok/iPet" target="_blank" data-toggle="tooltip" data-original-title="Star us on Github">
              <i class="fab fa-github"></i>
              <span class="nav-link-inner--text d-lg-none">Github</span>
            </a>
          </li>
          <li class="nav-item d-none d-lg-block ml-lg-4">
            <a href="http://localhost/tcc_ipet/_site/_adm/home.php" target="" class="btn btn-neutral btn-icon">
              <span class="btn-inner--icon">
                <i class="fas fa-shopping-cart mr-2"></i>
              </span>
              <span class="nav-link-inner--text">Doar</span>
            </a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Main content -->
  <div class="main-content bg-secondary">
    
    <!-- Header -->
    <div class="header bg-gradient-info py-7 py-lg-8 pt-lg-9">
      <div class="container">
        <div class="header-body text-center mb-7">        
          <div class="row justify-content-center">
            <div class="col-xl-5 col-lg-6 col-md-8 px-5">
            <img src="_site/assets/img/brand/ipet-white.png" style="height: 100px; width: auto;">
              <h1 class="text-white">Bem vindo!</h1>    
              <h3 class="text-lead text-white">Você está pronto para deixar sua marca no mundo?</h3>
            </div>
          </div>
        </div>        
      </div>
      <div class="py-8 separator separator-bottom separator zindex-100">  
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#ffffff" fill-opacity="1" d="M0,256L48,229.3C96,203,192,149,288,154.7C384,160,480,224,576,218.7C672,213,768,139,864,128C960,117,1056,171,1152,197.3C1248,224,1344,224,1392,224L1440,224L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path></svg>
      </div>      
    </div>
    <!-- End Header -->
    
    <!-- Page content -->
    <section class="my-5">
      <div class="container">
        <div class="row">
          <div class="col-md-8 mx-auto">
          <h2>O que é o iPet?</h2>
            <p>A projeto <code>iPet</code> constitui-se em uma plataforma para adoção de animais em situação de rua ou abandono e apoio a ONG’s (Organizações Não Governamentais). Integrado, respectivamente, pelos alunos: Danilo Santana Conceição, Diogo Ferreira Dos Santos, Henrique Cipriano Anselmo, João Henrique Cadoni Negri, João Vitor da Silveira Eugênio e Pedro Ferreira Alves.</p>
            <div class="row justify-content-center">
              <div class="">
                            <div class="avatar-group">
                            <a href="#" class="avatar avatar-lg rounded-circle" data-toggle="tooltip" data-original-title="Danilo Santana Conceição">
                              <img alt="Espaço reservado para imagem" src="<?= PUBLICO . 'img/theme/danilo.png'; ?>">
                            </a>
                            <a href="#" class="avatar avatar-lg rounded-circle" data-toggle="tooltip" data-original-title="Diogo Ferreira Dos Santos">
                              <img alt="Espaço reservado para imagem" src="<?= PUBLICO . 'img/theme/diogo.png'; ?>">
                            </a>
                            <a href="#" class="avatar avatar-lg rounded-circle" data-toggle="tooltip" data-original-title="Henrique Cipriano Anselmo">
                              <img alt="Espaço reservado para imagem" src="<?= PUBLICO . 'img/theme/henrique.png'; ?>">
                            </a>
                            <a href="#" class="avatar avatar-lg rounded-circle" data-toggle="tooltip" data-original-title="João Henrique Cadoni Negri">
                              <img alt="Espaço reservado para imagem" src="<?= PUBLICO . 'img/theme/cadoni.png'; ?>">
                            </a>
                            <a href="#" class="avatar avatar-lg rounded-circle" data-toggle="tooltip" data-original-title="João Vitor da Silveira Eugênio">
                              <img alt="Espaço reservado para imagem" src="<?= PUBLICO . 'img/theme/eugenio.png'; ?>">
                            </a>
                            <a href="#" class="avatar avatar-lg rounded-circle" data-toggle="tooltip" data-original-title="Pedro Ferreira Alves">
                              <img alt="Espaço reservado para imagem" src="<?= PUBLICO . 'img/theme/pedro.png'; ?>">
                            </a>
                          </div>
                </div>
              </div>

            <p>O projeto se baseia na elaboração um sistema web cujo principal objetivo seja prestar algum tipo de suporte a questões de saúde pública, dentre
as quais torna-se possível citar a questão de animais em situação de rua; em complemento à tal,
adicionar funcionalidades que deem auxilio ao processo de adoção e ações
voluntárias a tais organizações.</p>

            <p>O sistema em questão, deverá possuir em sua forma inicial a
possibilidade de cadastro de ONG’s, usuários – voluntários – e administradores,
além da capacidade de cadastrar animais que necessitam de um tutor. </p>
            <p class="mb-0">
            Deixe sua marca no mundo, seja um apoiador do <code>iPet</code>!
            </p>
          </div>
        </div>
      </div>
    </section>
    <!-- End Page content -->        
  </div>
  <!-- End Main content -->

  <!-- Footer -->
  <footer class="py-5 bg-secondary" id="footer-main">     
    <div class="container">
      <div class="row align-items-center justify-content-xl-between">
        <div class="col-xl-6">
          <div class="copyright text-center  text-lg-left  text-muted">
              &copy; 2020 <a href="https://www.creative-tim.com" class="font-weight-bold ml-1" target="_blank">iPet</a>
          </div>
        </div>
        <div class="col-xl-6">
          <ul class="nav nav-footer justify-content-center justify-content-xl-end">
            <li class="nav-item">
              <a href="https://etecmogiguacu.com.br" class="nav-link" target="_blank">Etec</a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link" target="_blank">Saiba +</a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link" target="_blank">Contato</a>
            </li>
            <li class="nav-item">
              <a href="https://opensource.org/licenses/MIT" class="nav-link" target="_blank">MIT License</a>
            </li>
          </ul>
        </div>
      </div>
    </div>   
  </footer>
  <!-- End Footer -->

  <!-- Styles -->
  <?php
    include_once "_site/assets/components/scripts.php";
  ?>
  <!-- End Styles -->
  
</body>

</html>

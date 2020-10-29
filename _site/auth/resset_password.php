<?php
include_once('../controller/config.php');
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="desc">
  <meta name="author" content="iPet">
  <title>iPet | Signup</title>

  <!-- Styles -->
  <?php
    include_once "../assets/components/styles.php";
  ?>
  <!-- End Styles -->
</head>

<body  class="bg-secondary">
  <!-- Nav Bar -->
  <?php
    include_once "components/nav_auth.php";
  ?>
  <!-- End Nav Bar -->

  <!-- Main content -->
  <div class="main-content bg-secondary">
    
    <!-- Header -->
    <div class="header bg-gradient-info py-7 py-lg-8 pt-lg-9">
      <div class="container">
        <div class="header-body text-center mb-7">
          <div class="row justify-content-center">
            <div class="col-xl-5 col-lg-6 col-md-8 px-5">
              <h1 class="text-white">Ressetar senha</h1>
              <h3 class="text-lead text-white">Guarde suas credenciais com cuidado...</h3>
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
    <div class="container mt--8 pb-5">
      <div class="row justify-content-center">
        <div class="col-lg-5 col-md-7">
          <div class="card bg-secondary border-0 mb-0">
            <div class="card-header bg-transparent pb-5">
              <div class="text-center">
                <h1>Ressetar senha</h1>
              </div>
              <!--<div class="text-muted text-center mt-2 mb-3"><small>Entrar com</small></div>
              <div class="btn-wrapper text-center">
                <a href="#" class="btn btn-neutral btn-icon">
                  <span class="btn-inner--icon"><img src="../assets/img/icons/common/github.svg"></span>
                  <span class="btn-inner--text">Github</span>
                </a>
                <a href="#" class="btn btn-neutral btn-icon">
                  <span class="btn-inner--icon"><img src="../assets/img/icons/common/google.svg"></span>
                  <span class="btn-inner--text">Google</span>
                </a>
              </div>-->
            </div>
            <div class="card-body px-lg-5 py-lg-5">
              <div class="text-center text-muted mb-4">
                <small>Informe seus dados</small>
              </div>
              <form role="form" method="POST" action="<?= BASE . '_site/controller/resset_password.php';?>">                
                <div class="form-group">
                  <div class="input-group input-group-merge input-group-alternative mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                    </div>
                    <input name="email" class="form-control" placeholder="Email" type="email" required>
                  </div>
                </div>                
                <div class="text-muted font-italic"><small>Crie uma senha fortificada: <span class="text-success font-weight-700">com letras e números.</span></small></div>
                <div class="form-group">
                  <div class="input-group input-group-merge input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                    </div>
                    <input name="password1" class="form-control" placeholder="***" type="password" required>
                  </div>
                </div>
                <div class="text-muted font-italic"><small>Confirme sua senha:</small></div>
                <div class="form-group">
                  <div class="input-group input-group-merge input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                    </div>
                    <input name="password2" class="form-control" placeholder="***" type="password" required>
                  </div>
                </div>
                <div class="row my-4">
                  <div class="col-6">
                    <div class="text-muted font-italic"><small>Sou:</small></div>
                    <div class="input-group-prepend">
                      <base-input label="Example multiple select">
                        <select name="ranking" class="form-control" required>
                          <option value="1" selected>Voluntário</option>
                          <option value="2">ONG</option>       
                        </select>
                      </base-input>
                    </div>
                  </div>

                  <div class="col-6">
                    <div class="text-muted font-italic"><small>Informe seu CPF ou CNPJ:</small></div>
                    <div class="input-group-prepend">                      

                      <div class="input-group input-group-merge input-group-alternative">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="ni ni-badge"></i></span>
                        </div>
                        <input name="document" class="form-control" placeholder="CPF ou CNPJ" type="text" required>
                      </div>
                    </div>             
                  </div>   
                </div>                 
                              
                <div class="row my-4">
                  <div class="col-12">
                                                         
                  </div>
                </div>

                <div class="row my-4">
                  <div class="col-12">                                          
                        <span class="text-muted"><span class="text-danger font-weight-700">* </span>Certique-se de preencher todos os campos.</span>                                          
                  </div>
                </div>

                <div class="text-center">
                  <button type="submit" class="btn btn-info mt-4">Ressetar</button>
                </div>
              </form>
            </div>
          </div>          
        </div>
      </div>
    </div>
  </div>

  <!-- Footer -->
  <?php
    include_once "components/footer_auth.php";
  ?>
  <!-- End Footer -->

  <!-- Styles -->
  <?php
    include_once "../assets/components/scripts.php";
  ?>
  <!-- End Styles -->
  
</body>

</html>

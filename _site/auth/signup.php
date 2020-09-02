<!--
=========================================================
* Argon Dashboard - v1.2.0
=========================================================
* Product Page: https://www.creative-tim.com/product/argon-dashboard


* Copyright  Creative Tim (http://www.creative-tim.com)
* Coded by www.creative-tim.com



=========================================================
* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
-->
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
              <h1 class="text-white">Crie uma conta!</h1>
              <h3 class="text-lead text-white">Você está pronto para fazer a diferença no mundo?.</h3>
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
              <div class="text-muted text-center mt-2 mb-3"><small>Entrar com</small></div>
              <div class="btn-wrapper text-center">
                <a href="#" class="btn btn-neutral btn-icon">
                  <span class="btn-inner--icon"><img src="../assets/img/icons/common/github.svg"></span>
                  <span class="btn-inner--text">Github</span>
                </a>
                <a href="#" class="btn btn-neutral btn-icon">
                  <span class="btn-inner--icon"><img src="../assets/img/icons/common/google.svg"></span>
                  <span class="btn-inner--text">Google</span>
                </a>
              </div>
            </div>
            <div class="card-body px-lg-5 py-lg-5">
              <div class="text-center text-muted mb-4">
                <small>Informe seus dados</small>
              </div>
              <form role="form">
                <div class="form-group">
                  <div class="input-group input-group-merge input-group-alternative mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-single-02"></i></span>
                    </div>
                    <input class="form-control" placeholder="Nome" type="text">
                  </div>
                </div>                
                <div class="form-group">
                  <div class="input-group input-group-merge input-group-alternative mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                    </div>
                    <input class="form-control" placeholder="Email" type="email">
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-group input-group-merge input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                    </div>
                    <input class="form-control" placeholder="***" type="password">
                  </div>
                </div>
                <div class="text-muted font-italic"><small>Crie uma senha fortificada: <span class="text-success font-weight-700">com letras e números.</span></small></div>
                <div class="row my-4">
                  <div class="col-12">
                    <div class="text-muted font-italic"><small>Entrar como:</small></div>
                    <base-input label="Example multiple select">
                      <select class="form-control">
                        <option>Voluntário</option>
                        <option>ONG</option>       
                      </select>
                    </base-input>
                  </div>
                </div>
                <div class="row my-4">
                  <div class="col-12">
                    <div class="custom-control custom-control-alternative custom-checkbox">
                      <input class="custom-control-input" id="customCheckRegister" type="checkbox">
                      <label class="custom-control-label" for="customCheckRegister">
                        <span class="text-muted"><span class="text-danger font-weight-700">* </span>Li e concordo com os termos de <a href="#!">Política e Privacidade</a></span>
                      </label>
                    </div>
                  </div>
                </div>

                <div class="text-center">
                  <button type="button" class="btn btn-info mt-4">Criar conta</button>
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
